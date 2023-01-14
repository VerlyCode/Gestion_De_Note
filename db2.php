<?php
$dsn = 'mysql:dbname=grading_db;host=localhost:3308';
$user = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
<?php
/* 	$conn = new PDO('mysql:host=localhost;dbname=myexec_crps','myexec_linkup','executivemysql789'); */
?>