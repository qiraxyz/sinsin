<?php

session_start();

include('koneksi.php');

$username     = $_POST['username'];
$password      = $_POST['password'];

//query
$query  = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
$result     = mysqli_query($connect, $query);
$num_row     = mysqli_num_rows($result);
$row         = mysqli_fetch_array($result);

if($num_row >=1) {
    
    echo "success";

    $_SESSION['id']             = $row['id'];
    $_SESSION['fullname']   = $row['fullname'];
    $_SESSION['username']       = $row['username'];

} else {    
    echo "error";

}

?>