<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/6/2018
 * Time: 9:33 AM
 */

session_start();
require_once("../model/database_query.php");

$username = $_POST['username'];
$password = $_POST['password'];

if($username == null || $password == null){
    echo '<script type="text/javascript">
                       window.location = "../index.php";
          </script>';
}

$access = false;
$account_list = getAllAccount();

foreach ($account_list as $acc){
    if($username == $acc['username'] && $password == $acc['password'] ){
        $access = true;
        if($acc['isactive']== 1){
            $_SESSION["user_id"]=$acc["acc_id"];
            $_SESSION["username"] = $acc["username"];
            $_SESSION["role_id"] = $acc["role_id"];

            if($acc['role_id']== 1){
                echo '<script type="text/javascript">
                       window.location = "../view/home_student.php";
                  </script>';

            }
            if($acc['role_id']== 2){
                echo '<script type="text/javascript">
                       window.location = "../view/home_supervisor.php";
                  </script>';
            }
            if($acc['role_id']== 3){
                echo '<script type="text/javascript">
                       window.location = "../view/home_staff.php";
                  </script>';
            }
        }else{
           echo '<script type="text/javascript">
                       alert("Your account has been suspended!");
                       window.location = "../index.php";
          </script>';
        }

    }
}

if($access == false){
        echo '<script type="text/javascript">
                       alert("Wrong username or password! \nPlease try again!");
                       window.location = "../index.php";
          </script>';
    }

