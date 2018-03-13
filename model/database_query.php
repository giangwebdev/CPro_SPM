<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/6/2018
 * Time: 9:33 AM
 */
//
//$ds = DIRECTORY_SEPARATOR;
//$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("../library/connect.php");

$conn = mysqli_connect('localhost', 'root', '', 'spmfu');

function getAllAccount(){

    $sql = "select * from account";
    $query = mysqli_query($GLOBALS['conn'], $sql);
    $account_list= array();
    while($row = mysqli_fetch_assoc($query)){
        $account_list[] = $row;
    }
    return $account_list;
}

function get_supervisor(){
    $sql = "select * from supervisor";
    $query = mysqli_query($GLOBALS['conn'], $sql);

    $supervisor_list = array();
    while($row = mysqli_fetch_assoc($query)){
        $supervisor_list[] = $row;
    }
    return $supervisor_list;
}

function get_prev_team_pending_id(){
    $sql = "SELECT team_pending_id FROM student_account_pending ORDER BY acc_pending_id DESC LIMIT 1";
    $query = mysqli_query($GLOBALS['conn'], $sql);
    $team_pending_id = null;
    while($row = mysqli_fetch_assoc($query)){
        $team_pending_id = $row;
    }
    if($team_pending_id == null) {$team_pending_id=0;}
    foreach($team_pending_id as $team_pending){
        return $team_pending[0];
    }

}

function add_pending_acc($team_pending_id,$student_name,$student_id,$phone, $email,
                         $is_teamleader,$capstone_name_vi,$capstone_name_en,$supervisor_id,$note){

    $conn = new mysqli('localhost', 'root', '', 'spmfu');
    $sql= "INSERT INTO student_account_pending(acc_pending_id, team_pending_id, full_name, student_id, phone,email, 
            isteamleader, supervisor_id,  projectname_vi ,  projectname_en ,  note ,  isaccepted ,  accepted_by )
         VALUES (DEFAULT, '".$team_pending_id."', '".$student_name."', '".$student_id."', '".$phone."', '".$email."',
          '".$is_teamleader."', '".$supervisor_id."', '".$capstone_name_vi."', '".$capstone_name_en."', '".$note ."', '0', null )";

    $conn->query($sql);
    $conn->close();
}
    
