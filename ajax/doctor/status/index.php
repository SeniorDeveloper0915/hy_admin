<?php
    session_start();
    include '../../../config/index.php';

// SESSION CHECK SET OR NOT
if (!isset($_SESSION['admin'])) {
    header('location:../../../index.php');
}

    $output = [];

    $doctorId = get('id');

$parameters = '';

    $query      = 'UPDATE  `doctor` SET Status = !Status where id = ?';
    $parameters = array($doctorId);

    
    $statement = $db->prepare($query);
    $statement->execute($parameters);

    $output = responseSuccess('Doctor Status changed successfully');

echo json_encode($output);
?>