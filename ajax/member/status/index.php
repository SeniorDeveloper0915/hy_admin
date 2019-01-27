<?php
    session_start();
    include '../../../config/index.php';

// SESSION CHECK SET OR NOT
if (!isset($_SESSION['admin'])) {
    header('location:../../../index.php');
}

    $output = [];

    $memberId = get('id');

$parameters = '';

    $query      = 'UPDATE  `core_team` SET Status = !Status where id = ?';
    $parameters = array($memberId);

    
    $statement = $db->prepare($query);
    $statement->execute($parameters);

    $output = responseSuccess('Member Status changed successfully');

echo json_encode($output);
?>