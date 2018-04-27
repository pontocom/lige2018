<?php
/**
 * Created by PhpStorm.
 * User: cserrao
 * Date: 20/04/2018
 * Time: 11:14
 */
session_start();

unset($_SESSION['logged_in']);

session_destroy();
header("Location:login.php");