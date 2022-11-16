<?php 
header('Content-Type:application/json');
header('Access-Control-Allow-Method:POST');


include '../connection.php';
$data=json_decode(file_get_contents("php://input"),true);
$data_id=$data['id'];
$data_name=$data['name'];
$data_quantity=$data['quantity'];
$data_price=$data['price'];
$data_category=$data['category'];

$query="UPDATE fields SET name='{$data_name}',quantity='{$data_quantity}',price='{$data_price}',category='{$data_category}' WHERE id={$data_id}";


if (mysqli_query($conn, $query)) {
    $response['status']='true';
    $response['message']="Data Updated Successfully";
    echo json_encode($response);

} else {
    $response['status']='false';
    $response['message']="Unsuccessfully! Data Not Updated";
    echo json_encode($response);
}



?>