<?php
    session_start();
    include '../../../config/index.php';

// SESSION CHECK SET OR NOT
if (!isset($_SESSION['admin'])) {
    header('location:../../../index.php');
}

    $output = [];

    $dynamicId = get('id');

$parameters = '';

    $query      = 'UPDATE  `dynamic` SET Status = !Status where id = ?';
    $parameters = array($dynamicId);

    
    $statement = $db->prepare($query);
    $statement->execute($parameters);

    $output = responseSuccess('Company Dynamic Status changed successfully');

echo json_encode($output);
?>