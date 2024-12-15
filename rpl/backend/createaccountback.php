<?php

include 'config.php';
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
};

$select = " SELECT * FROM account WHERE username = '$username' && password = '$password' ";

$result = mysqli_query($conn, $select);
if(mysqli_num_rows($result) >0){
    $error[] = 'pengguna sudah ada!';
}else{
    $insert = "INSERT INTO account (name, username, password, usertype) VALUES('$name','$username','$password','user')";
    mysqli_query($conn, $insert);
    header('location:../index.html');
 };

?>