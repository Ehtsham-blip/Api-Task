<?php 
header('Content-Type:application/json');
include '../connection.php';


$data=json_decode(file_get_contents("php://input"),true);
if (isset($_GET['id']) && $_GET['id']!="") {
$data_id=$_GET['id'];
$query="SELECT  * FROM fields WHERE id={$data_id}";
$result=mysqli_query($conn,$query);
if (mysqli_num_rows($result)>0) {
    $output=mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    $response['status']='false';
    $response['message']="Oops! No Records Found";
    echo json_encode($response);
}  
}

else {
    $query="SELECT  * FROM fields";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0) {
        $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);
    } else {
        $response['status']='false';
        $response['message']="Oops! No Records Found";
        echo json_encode($response);
    }
    
}


?>