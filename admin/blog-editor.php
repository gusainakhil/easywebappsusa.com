<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLiteLogin();

function slugifyLite(string $text): string
{
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/', '-', $text) ?? '';
    $text = trim($text, '-');

    return $text !== '' ? $text : 'blog-post';
}

function compressAndStoreImage(array $file): ?string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return null;
    }

    $tmp = (string) ($file['tmp_name'] ?? '');
    if ($tmp === '' || !is_uploaded_file($tmp)) {
        return null;
    }

    $info = @getimagesize($tmp);
    if ($info === false) {
        return null;
    }

    $uploadsDir = __DIR__ . '/uploads';
    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0755, true);
    }

    $name = 'blog_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4));
    $target = $uploadsDir . '/' . $name . '.jpg';

    $data = @file_get_contents($tmp);
    if ($data === false) {
        return null;
    }

    $img = @imagecreatefromstring($data);
    if ($img === false) {
        return null;
    }

    imagejpeg($img, $target, 72);
    imagedestroy($img);

    return 'uploads/' . basename($target);
}

function normalizeTagsLite(string $tags): string
{
    $parts = array_map('trim', explode(',', $tags));
    $parts = array_values(array_filter($parts, static function (string $t): bool {
        return $t !== '';
    }));

    $unique = [];
    foreach ($parts as $tag) {
        $key = strtolower($tag);
        if (!isset($unique[$key])) {
            $unique[$key] = $tag;
        }
    }

    return implode(', ', array_values($unique));
}

$pageTitle = 'Blog Editor';
$activeKey = 'blogs';
$error = '';
$editId = (int) ($_GET['edit'] ?? 0);
$defaultAuthor = 'EverythingEasy Technology';
$categoryOptions = [
    'Web Development',
    'Mobile App Development',
    'Cloud Solutions',
    'SEO Optimization',
    'Digital Marketing',
    'Internet of Things',
];
$tagOptions = [
    'Technology',
    'Web',
    'Mobile',
    'Cloud',
    'SEO',
    'Marketing',
    'Startup',
    'UI UX',
    'Ecommerce',
    'Business',
];

$editing = [
    'id' => 0,
    'title' => '',
    'excerpt' => '',
    'meta_description' => '',
    'meta_keywords' => '',
    'content' => '',
    'image_url' => '',
    'category' => 'Web Development',
    'author' => $defaultAuthor,
    'status' => 'draft',
    'tags' => '',
];

if ($editId > 0) {
    $stmt = dbLite()->prepare('SELECT * FROM `blogs` WHERE `id` = :id LIMIT 1');
    $stmt->execute([':id' => $editId]);
    $row = $stmt->fetch();
    if ($row) {
        $editing = array_merge($editing, $row);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id'] ?? 0);
    $title = trim((string) ($_POST['title'] ?? ''));
    $excerpt = trim((string) ($_POST['excerpt'] ?? ''));
    $metaDescription = trim((string) ($_POST['meta_description'] ?? ''));
    $metaKeywords = trim((string) ($_POST['meta_keywords'] ?? ''));
    $content = trim((string) ($_POST['content'] ?? ''));
    $category = trim((string) ($_POST['category'] ?? ''));
    $author = trim((string) ($_POST['author'] ?? ''));
    if ($author === '') {
        $author = $defaultAuthor;
    }
    $status = (string) ($_POST['status'] ?? 'draft');
    $tags = normalizeTagsLite((string) ($_POST['tags'] ?? ''));
    $oldImage = trim((string) ($_POST['old_image_url'] ?? ''));

    if ($title === '' || $content === '' || $category === '' || $author === '') {
        $error = 'Please fill required fields: title, content, category, author.';
    } else {
        $slug = slugifyLite($title);
        $slugCheckSql = 'SELECT COUNT(*) FROM `blogs` WHERE `slug` = :slug';
        $params = [':slug' => $slug];
        if ($id > 0) {
            $slugCheckSql .= ' AND `id` <> :id';
            $params[':id'] = $id;
        }

        $slugExistsStmt = dbLite()->prepare($slugCheckSql);
        $slugExistsStmt->execute($params);
        $slugExists = (int) $slugExistsStmt->fetchColumn() > 0;

        if ($slugExists) {
            $error = 'Slug already exists, please update new title.';
        } else {
            $uploadedImage = compressAndStoreImage($_FILES['image_file'] ?? []);
            $imageUrl = $uploadedImage ?? $oldImage;

            if ($imageUrl === '') {
                $error = 'Please upload blog image.';
            } else {
                if ($status !== 'published' && $status !== 'draft') {
                    $status = 'draft';
                }

                if ($id > 0) {
                    $sql = 'UPDATE `blogs` SET
                        `title` = :title,
                        `excerpt` = :excerpt,
                        `meta_description` = :meta_description,
                        `meta_keywords` = :meta_keywords,
                        `content` = :content,
                        `image_url` = :image_url,
                        `category` = :category,
                        `slug` = :slug,
                        `author` = :author,
                        `status` = :status,
                        `tags` = :tags
                        WHERE `id` = :id';

                    $stmt = dbLite()->prepare($sql);
                    $stmt->execute([
                        ':title' => $title,
                        ':excerpt' => $excerpt,
                        ':meta_description' => $metaDescription,
                        ':meta_keywords' => $metaKeywords,
                        ':content' => $content,
                        ':image_url' => $imageUrl,
                        ':category' => $category,
                        ':slug' => $slug,
                        ':author' => $author,
                        ':status' => $status,
                        ':tags' => $tags,
                        ':id' => $id,
                    ]);
                    header('Location: blogs.php?ok=' . urlencode('Blog updated successfully.'));
                    exit;
                }

                $sql = 'INSERT INTO `blogs`
                    (`title`, `excerpt`, `meta_description`, `meta_keywords`, `content`, `image_url`, `category`, `slug`, `author`, `status`, `tags`)
                    VALUES
                    (:title, :excerpt, :meta_description, :meta_keywords, :content, :image_url, :category, :slug, :author, :status, :tags)';

                $stmt = dbLite()->prepare($sql);
                $stmt->execute([
                    ':title' => $title,
                    ':excerpt' => $excerpt,
                    ':meta_description' => $metaDescription,
                    ':meta_keywords' => $metaKeywords,
                    ':content' => $content,
                    ':image_url' => $imageUrl,
                    ':category' => $category,
                    ':slug' => $slug,
                    ':author' => $author,
                    ':status' => $status,
                    ':tags' => $tags,
                ]);
                header('Location: blogs.php?ok=' . urlencode('Blog added successfully.'));
                exit;
            }
        }
    }

    $editing = [
        'id' => $id,
        'title' => $title,
        'excerpt' => $excerpt,
        'meta_description' => $metaDescription,
        'meta_keywords' => $metaKeywords,
        'content' => $content,
        'image_url' => $oldImage,
        'category' => $category,
        'author' => $author,
        'status' => $status,
        'tags' => $tags,
    ];
}

require __DIR__ . '/header.php';
?>
<?php if ($error !== ''): ?><div class="err"><?= e($error) ?></div><?php endif; ?>

<div class="panel form-panel" style="margin-bottom:10px;">
  <div class="panel-head">
    <h3><?= (int) $editing['id'] > 0 ? 'Update Blog' : 'Add Blog' ?></h3>
    <p>Submit from this editor page only.</p>
  </div>

  <form method="post" enctype="multipart/form-data" class="form-grid">
    <input type="hidden" name="id" value="<?= e((string) $editing['id']) ?>">
    <input type="hidden" name="old_image_url" value="<?= e((string) $editing['image_url']) ?>">

    <label>Title *</label>
    <input name="title" required value="<?= e((string) $editing['title']) ?>">

    <label>Excerpt</label>
    <textarea name="excerpt" rows="2"><?= e((string) $editing['excerpt']) ?></textarea>

    <label>Meta Description</label>
    <textarea name="meta_description" rows="2"><?= e((string) $editing['meta_description']) ?></textarea>

    <label>Meta Keywords</label>
    <input name="meta_keywords" value="<?= e((string) $editing['meta_keywords']) ?>">

    <label>Content *</label>
    <textarea name="content" rows="8" class="rich-editor" required><?= e((string) $editing['content']) ?></textarea>

    <label>Category *</label>
        <select name="category" required>
            <?php foreach ($categoryOptions as $option): ?>
                <option value="<?= e($option) ?>" <?= ((string) $editing['category'] === $option) ? 'selected' : '' ?>><?= e($option) ?></option>
            <?php endforeach; ?>
            <?php
                $currentCategory = (string) $editing['category'];
                $hasCurrentCategory = in_array($currentCategory, $categoryOptions, true);
            ?>
            <?php if ($currentCategory !== '' && !$hasCurrentCategory): ?>
                <option value="<?= e($currentCategory) ?>" selected><?= e($currentCategory) ?></option>
            <?php endif; ?>
        </select>

    <label>Author *</label>
    <input name="author" required value="<?= e((string) $editing['author']) ?>">

    <label>Status</label>
    <select name="status">
      <option value="draft" <?= ((string) $editing['status'] === 'draft') ? 'selected' : '' ?>>draft</option>
      <option value="published" <?= ((string) $editing['status'] === 'published') ? 'selected' : '' ?>>published</option>
    </select>

    <label>Tags</label>
        <?php
            $currentTags = normalizeTagsLite((string) ($editing['tags'] ?? ''));
            $currentTagList = $currentTags === '' ? [] : array_map('trim', explode(',', $currentTags));
            $allTagOptions = $tagOptions;
            foreach ($currentTagList as $tag) {
                    if ($tag !== '' && !in_array($tag, $allTagOptions, true)) {
                            $allTagOptions[] = $tag;
                    }
            }
        ?>
        <input type="hidden" id="tagsInput" name="tags" value="<?= e($currentTags) ?>">
        <div class="tag-picker" id="tagPicker">
            <?php foreach ($allTagOptions as $tag): ?>
                <button type="button" class="tag-chip" data-value="<?= e($tag) ?>"><?= e($tag) ?></button>
            <?php endforeach; ?>
        </div>
        <div class="muted-line">Select multiple tags for this blog.</div>

    <label>Blog Image (compressed upload)</label>
    <input type="file" name="image_file" accept="image/*">
    <?php if ((string) $editing['image_url'] !== ''): ?>
      <div class="muted-line">Current: <?= e((string) $editing['image_url']) ?></div>
    <?php endif; ?>

    <div class="form-actions">
      <button class="btn" type="submit"><?= (int) $editing['id'] > 0 ? 'Update Blog' : 'Add Blog' ?></button>
      <a class="btn light" href="blogs.php">Back to List</a>
    </div>
  </form>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
  if (window.CKEDITOR) {
    CKEDITOR.replace('content');
  }

    (function () {
        const picker = document.getElementById('tagPicker');
        const input = document.getElementById('tagsInput');
        if (!picker || !input) return;

        const chips = Array.from(picker.querySelectorAll('.tag-chip'));
        const selected = new Set(
            (input.value || '')
                .split(',')
                .map(v => v.trim())
                .filter(Boolean)
        );

        function render() {
            chips.forEach((chip) => {
                const value = (chip.getAttribute('data-value') || '').trim();
                chip.classList.toggle('active', selected.has(value));
            });
            input.value = Array.from(selected).join(', ');
        }

        chips.forEach((chip) => {
            chip.addEventListener('click', function () {
                const value = (chip.getAttribute('data-value') || '').trim();
                if (!value) return;
                if (selected.has(value)) {
                    selected.delete(value);
                } else {
                    selected.add(value);
                }
                render();
            });
        });

        render();
    })();
</script>
<?php require __DIR__ . '/footer.php'; ?>
