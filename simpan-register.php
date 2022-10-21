<?php

include('koneksi.php');
session_start();

$fullname = $_POST['fullname'];
$username     = $_POST['username'];
$password     = $_POST['password'];

//query insert data ke dalam database
$query = "INSERT INTO akun (fullname, username, password) VALUES ('$fullname', '$username', '$password')";   



if($connect->query($query)) {
    
    echo "success";

} else {
    
    echo "error";

}