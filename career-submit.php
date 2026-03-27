<?php
declare(strict_types=1);

require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    exit;
}

$redirect = 'career.php';

try {
    if (!dbTableExists('job_applications')) {
        throw new RuntimeException('job_applications table not found.');
    }

    $fullName = trim((string) ($_POST['full_name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $phone = trim((string) ($_POST['phone'] ?? ''));
    $position = trim((string) ($_POST['position'] ?? 'General Application'));
    $experience = (int) ($_POST['experience'] ?? 0);
    $portfolio = trim((string) ($_POST['portfolio'] ?? ''));
    $coverLetter = trim((string) ($_POST['cover_letter'] ?? ''));

    if ($fullName === '' || $email === '' || $phone === '') {
        throw new InvalidArgumentException('Name, email and phone are required.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidArgumentException('Invalid email format.');
    }

    if ($position === '') {
        $position = 'General Application';
    }

    if ($experience < 0) {
        $experience = 0;
    }

    if ($coverLetter === '') {
        $coverLetter = 'N/A';
    }

    if (!isset($_FILES['resume']) || !is_array($_FILES['resume'])) {
        throw new RuntimeException('Resume file is required.');
    }

    $resume = $_FILES['resume'];
    if (($resume['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Resume upload failed.');
    }

    $originalName = (string) ($resume['name'] ?? 'resume.pdf');
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    if ($ext !== 'pdf') {
        throw new RuntimeException('Only PDF resumes are allowed.');
    }

    $uploadDirAbs = __DIR__ . '/uploads/resumes';
    if (!is_dir($uploadDirAbs) && !mkdir($uploadDirAbs, 0755, true) && !is_dir($uploadDirAbs)) {
        throw new RuntimeException('Unable to create uploads directory.');
    }

    $safeName = preg_replace('/[^a-zA-Z0-9_\-]/', '_', pathinfo($originalName, PATHINFO_FILENAME));
    $filename = date('Ymd_His') . '_' . $safeName . '.pdf';
    $targetAbs = $uploadDirAbs . '/' . $filename;
    $targetRel = 'uploads/resumes/' . $filename;

    if (!move_uploaded_file((string) ($resume['tmp_name'] ?? ''), $targetAbs)) {
        throw new RuntimeException('Failed to save uploaded resume.');
    }

    $sql = 'INSERT INTO `job_applications` (`full_name`, `email`, `phone`, `position`, `experience`, `portfolio`, `cover_letter`, `resume_path`) VALUES (:full_name, :email, :phone, :position, :experience, :portfolio, :cover_letter, :resume_path)';
    $stmt = getDbConnection()->prepare($sql);
    $stmt->execute([
        ':full_name' => $fullName,
        ':email' => $email,
        ':phone' => $phone,
        ':position' => $position,
        ':experience' => $experience,
        ':portfolio' => $portfolio,
        ':cover_letter' => $coverLetter,
        ':resume_path' => $targetRel,
    ]);

    $_SESSION['career_form_status'] = 'success';
    $_SESSION['career_form_ref'] = 'JOB-' . (string) ((int) getDbConnection()->lastInsertId());
    header('Location: ' . $redirect);
    exit;
} catch (Throwable $t) {
    error_log('career-submit failed: ' . $t->getMessage());
    $_SESSION['career_form_status'] = 'error';
    unset($_SESSION['career_form_ref']);
    header('Location: ' . $redirect);
    exit;
}
