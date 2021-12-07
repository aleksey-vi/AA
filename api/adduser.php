<?php

$UserName = $_REQUEST["UserName"];
$PwdHash = $_REQUEST["PwdHash"];

$hashed_pwd = hash('sha256', $PwdHash);

// Create connection
$conn =   mysqli_connect("localhost", "root", "", "calc");


$sqlifexsat = "SELECT ID,UserName FROM users where UserName= '$UserName'";

$result =mysqli_query($conn, $sqlifexsat);


if (mysqli_num_rows($result) > 0) 
{
        $response_array['status'] = "fail";
        $response_array['error'] = "Username already exists";
        echo json_encode($response_array);
        mysqli_close($conn);
        return; 
}
// if ($conn->error) {
//     $response_array['status'] = mysqli_error($conn);
//     echo json_encode($response_array);
// }

$sql = "INSERT INTO users(UserName,PwdHash) VALUES('$UserName','$hashed_pwd')";

 mysqli_query($conn, $sql);
// if ($conn->error) {
//     $response_array['status'] = mysqli_error($conn);
//     echo json_encode($response_array);
// }
 
mysqli_close($conn);


$response_array['status'] = 'success';
echo json_encode($response_array);
echo ($UserName);
