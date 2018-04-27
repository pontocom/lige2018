<?php
/**
 * Created by PhpStorm.
 * User: cserrao
 * Date: 20/04/2018
 * Time: 12:19
 */

$con = mysqli_connect("127.0.0.1","root", "teste123", "lige") or die("Error: Não consegui ligar à DB!!!");
$sql = "INSERT INTO users VALUES ('".$_REQUEST['username']."', '".sha1($_REQUEST['pwd'])."')";

if(mysqli_query($con, $sql)) {
    header("Location: index.php?status=1");
} else {
    header("Location: index.php?status=-2");
}