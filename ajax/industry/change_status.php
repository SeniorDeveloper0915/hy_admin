<?php
    session_start();
    include '../../config/config.php';

// SESSION CHECK SET OR NOT
if (!isset($_SESSION['username'])) {
    header('location:../../index.php');
}

    $output = [];

    $industryId = get('id');

$parameters = '';

    $query      = 'UPDATE  `industry` SET Status = !Status where id = ?';
    $parameters = array($industryId);

    
    $statement = $db->prepare($query);
    $statement->execute($parameters);

    $output = responseSuccess('Industry Status changed successfully');

echo json_encode($output);
?>