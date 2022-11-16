<?php 
header('Content-Type:application/json');
header('Access-Control-Allow-Method:POST');


include '../connection.php';
$data=json_decode(file_get_contents("php://input"),true);
$data_name=$data['name'];
$data_quantity=$data['quantity'];
$data_price=$data['price'];
$data_category=$data['category'];

$query="INSERT INTO fields (name,quantity,price,category) VALUES ('{$data_name}','{$data_quantity}','{$data_price}','{$data_category}')";
if (mysqli_query($conn, $query)) {
    $response['status']='true';
    $response['message']="Data Inserted Successfully";
    echo json_encode($response);
} else {
    $response['status']='false';
    $response['message']="Unsuccessfully! Data Not Inserted";
    echo json_encode($response);
}



?>