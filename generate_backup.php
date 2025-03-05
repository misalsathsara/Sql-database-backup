<?php
// Include your database connection file
require_once 'db_connect.php';

// Set header for file download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="database_backup_' . date('Y-m-d_H-i-s') . '.sql"');

try {
    // Get all tables
    $tables = array();
    $result = $bdd->query("SHOW TABLES");
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        $tables[] = $row[0];
    }

    $return = '';

    // Process each table
    foreach ($tables as $table) {
        $result = $bdd->query("SELECT * FROM $table");
        $numColumns = $result->columnCount();

        // Add drop table statement
        $return .= "DROP TABLE IF EXISTS $table;\n";

        // Get create table statement
        $stmt = $bdd->query("SHOW CREATE TABLE $table");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $return .= "$row[1];\n\n";

        // Get table data
        $result = $bdd->query("SELECT * FROM $table");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $return .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $numColumns; $j++) {
                if (isset($row[$j])) {
                    $row[$j] = addslashes($row[$j]);
                    $return .= '"' . $row[$j] . '"';
                } else {
                    $return .= 'NULL';
                }
                if ($j < ($numColumns - 1)) {
                    $return .= ',';
                }
            }
            $return .= ");\n";
        }
        $return .= "\n\n";
    }

    // Output the backup
    echo $return;
    exit;

} catch (Exception $e) {
    // Redirect back with error status
    header('Location: backup.php?status=error');
    exit();
} 