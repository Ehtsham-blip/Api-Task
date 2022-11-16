<?php 
header('Content-Type:application/json');

$data=json_decode(file_get_contents("php://input"),true);
$data_id=isset($_GET['id']) ? $_GET['id'] :die();

include '../connection.php';
$query="SELECT  * FROM fields WHERE id={$data_id}";
$result=mysqli_query($conn,$query);

if (mysqli_num_rows($result)>0) {
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    $response['status']='false';
    $response['message']="Oops! No Records Found";
    echo json_encode($response);
}
?>