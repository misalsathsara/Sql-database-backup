<?php
require_once 'db_connect.php';

try {
    // Try to get the database version
    $version = $bdd->getAttribute(PDO::ATTR_SERVER_VERSION);
    echo "Successfully connected to MySQL version: " . $version;
} catch(Exception $e) {
    echo "Connection error: " . $e->getMessage();
}
?>
