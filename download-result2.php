<?php
session_start();
include('includes/config.php');

if(isset($_SESSION['rollid']) && isset($_SESSION['classid'])) {
    $rollid = $_SESSION['rollid'];
    $classid = $_SESSION['classid'];

    // Your query to fetch result data from the database based on $rollid and $classid
    $query = "SELECT SubjectName, marks FROM tblresult WHERE RollId = :rollid AND ClassId = :classid";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
    $stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generate result in a downloadable format, e.g., CSV
    $csvFileName = "result_".$rollid."_".$classid.".csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
    
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Subject', 'Marks'));

    foreach ($results as $row) {
        fputcsv($output, $row);
    }

    fclose($output);

    // Clear session variables after download
    unset($_SESSION['rollid']);
    unset($_SESSION['classid']);
} else {
    // Redirect to the home page if session variables are not set
    header("Location: index.php");
    exit();
}
?>
