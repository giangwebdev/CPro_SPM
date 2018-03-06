<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/6/2018
 * Time: 9:33 AM
 */

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}library{$ds}connect.php");

$sql = "SELECT * FROM account";
$query = mysqli_query($conn, $sql);

$account_list= array();
while($row = mysqli_fetch_assoc($query)){
    $account_list[] = $row;
}

return $account_list;
