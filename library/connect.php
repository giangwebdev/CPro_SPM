<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/6/2018
 * Time: 9:19 AM
 */

$conn = mysqli_connect('localhost', 'root', '', 'test');
$lang = mysqli_query($conn, "SET NAMES 'utf8'");
