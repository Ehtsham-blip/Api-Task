<?php 
header('Content-Type:application/json');
header('Access-Control-Allow-Method:DELETE');

include '../connection.php';

$data=json_decode(file_get_contents("php://input"),true);
$data_id=$data['id'];

$query="DELETE FROM fields WHERE id={$data_id}";
if (mysqli_query($conn,$query)) {
    
    $response['status']='true';
    $response['message']="Data Deleted Successfully";
    echo json_encode($response);
} else {
    $response['status']='false';
    $response['message']="Unsuccessfully! Data Not Deleted";
    echo json_encode($response);
}



?>