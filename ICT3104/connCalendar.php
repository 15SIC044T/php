<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=ict3104projectdb", 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>