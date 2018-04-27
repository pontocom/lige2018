<?php
/**
 * Created by PhpStorm.
 * User: cserrao
 * Date: 20/04/2018
 * Time: 10:41
 */
session_start();

$username = $_REQUEST['username'];
$pwd = $_REQUEST['pwd'];

$con = mysqli_connect("127.0.0.1","root", "teste123", "lige") or die("Error: Não consegui ligar à DB!!!");
$sql = "SELECT * FROM users WHERE username = '".$username."' AND password ='".sha1($pwd)."'";

if(mysqli_query($con, $sql)) {
    if(mysqli_affected_rows($con)==1) {
        $_SESSION['logged_in'] = true;
        $_SESSION['userid'] = $username;
        header("Location: secret.php");
    } else {
        header("Location: index.php?status=-1");
    }
} else {
    header("Location: index.php?status=-1");
}

mysqli_close($con);

/*
if(($username == "cjcs" && $pwd=="teste") || ($username == "prrt" && $pwd=="teste2")) {
    $_SESSION['logged_in'] = true;
    $_SESSION['userid'] = $username;
    header("Location: secret.php");
} else {
    header("Location: index.php?status=-1");
}
*/