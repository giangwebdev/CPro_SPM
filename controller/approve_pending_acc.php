<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/20/2018
 * Time: 1:16 PM
 */
include_once ('../model/database_query.php');
include_once ('../model/query_for_supervisor.php');
session_start();
if(!isset($_SESSION['acc_id']) || $_SESSION['role_id'] != "2" ){
    echo '<script type="text/javascript">
           window.location = "../index.php";
          </script>';

}
$acc_id = $_SESSION['acc_id'];
if(is_supervisor_leader_by_acc_id($acc_id) == false){
    echo '<script type="text/javascript">
           alert("You have no permission to access this function.");
           window.location = "../view/home_supervisor.php";
          </script>';
}
if(isset($_POST['submit'])) {

$student_id = $_POST['student_id'];
$student_name = $_POST['student_name'];
$student_team_pending_id= $_POST['student_team_pending_id'];
$student_phone = $_POST['student_phone'];
$student_mail = $_POST['student_mail'];
$student_isteamleader = $_POST['student_isteamleader'];
$student_project_en = $_POST['student_project_en'];
$student_project_vi = $_POST['student_project_vi'];
$chosen_supervisor = $_POST['supervisor'];



}else{
    $role_now="";
    if($acc_id == 1 ){
        $role_now = "student";
    }else if ($acc_id == 2){
        $role_now ="supervisor";
    }else if($acc_id == 3){
        $role_now = "staff";
    }
    echo '<script type="text/javascript">
           alert("You have no permission to access this function.");
           window.location = "../view/home_'.$role_now .'.php";
          </script>';
}
