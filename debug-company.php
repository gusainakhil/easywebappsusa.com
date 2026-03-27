<?php
require __DIR__ . '/config.php';

echo '<h2>Company Info Debug</h2>';
echo '<pre>';

try {
    $db = getDbConnection();
    
    // Show all rows in company_detail
    echo "=== COMPANY DETAIL TABLE DATA ===\n";
    $stmt = $db->query('SELECT * FROM `company_detail`');
    $rows = $stmt->fetchAll();
    
    if (empty($rows)) {
        echo "⚠️  Table is EMPTY! No data found.\n";
    } else {
        echo "Found " . count($rows) . " record(s):\n\n";
        foreach ($rows as $idx => $row) {
            echo "Record #" . ($idx + 1) . ":\n";
            foreach ($row as $key => $value) {
                echo "  $key: " . ($value === null ? '[NULL]' : $value) . "\n";
            }
            echo "\n";
        }
    }
    
    // Show table structure
    echo "\n=== TABLE COLUMNS ===\n";
    $stmt = $db->query('SHOW COLUMNS FROM `company_detail`');
    $cols = $stmt->fetchAll();
    foreach ($cols as $col) {
        echo $col['Field'] . " (" . $col['Type'] . ")\n";
    }
    
    // Show getCompanyInfo() result
    echo "\n=== GETCOMPANYINFO() RESULT ===\n";
    $info = getCompanyInfo();
    foreach ($info as $key => $val) {
        echo "$key: " . ($val ?: '[EMPTY]') . "\n";
    }
    
} catch (Throwable $e) {
    echo "❌ ERROR: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}

echo '</pre>';
?>
