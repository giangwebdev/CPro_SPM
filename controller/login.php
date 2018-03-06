<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/6/2018
 * Time: 9:33 AM
 */

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}model{$ds}get_account.php");

$username = $_POST['username'];
$password = $_POST['password'];

foreach ($account_list as $acc){
    if($username == $acc['username'] && $password == $acc['password'] ){
        if($acc['isadmin']== 1){
            echo '<script type="text/javascript">
                       window.location = "../view/home_admin.php";
                  </script>';
        }else{
            echo '<script type="text/javascript">
                       window.location = "../view/home_user.php";
                  </script>';
        }
    }

}
