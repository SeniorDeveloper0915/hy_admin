<?php
    session_start();
    include '../../../config/index.php';

// SESSION CHECK SET OR NOT
if (!isset($_SESSION['admin'])) {
    header('location:../../../index.php');
}

    $output = [];

    $bannerId = get('id');

$parameters = '';

    $query      = 'UPDATE  `second_project` SET Status = !Status where id = ?';
    $parameters = array($bannerId);

    
    $statement = $db->prepare($query);
    $statement->execute($parameters);

    $output = responseSuccess('Project Status changed successfully');

echo json_encode($output);
?>