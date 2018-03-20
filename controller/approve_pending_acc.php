<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/20/2018
 * Time: 1:16 PM
 */
include_once ('../model/database_query.php');

if(isset($_POST['submit'])) {

    $acc_list = array();
    $acc_list = unserialize($_POST['pending_acc_list']);

    foreach($acc_list as $acc){
        print_r($acc);
    }


}
