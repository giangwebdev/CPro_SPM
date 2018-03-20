<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/13/2018
 * Time: 1:08 PM
 */

include_once ('../model/database_query.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $pending_acc_list = get_pending_acc();
        $team_id=null;
        $total_team_member =0;
         $supervisor_name[] = array();
        foreach ($pending_acc_list as $pending_acc){
            $total_team_member =0;

            if($team_id != $pending_acc['team_pending_id']){
            ?>
    <div> Team : <?php echo $pending_acc['projectname_en'];
                $count_team_member= 1
                ;}?>
        <div>
            <ul>
                <li>Name:<?php echo $pending_acc['full_name'];
                if($pending_acc['isteamleader']=='1') echo "(Team leader)";
                ?></li>
                <li>Student ID:<?php echo $pending_acc['student_id'];   ?></li>
                <li>Phone number:<?php echo $pending_acc['phone'];    ?></li>
                <li>Email:<?php echo $pending_acc['email'];    ?></li>
            </ul>
        </div>

    </div>
    <?php
            $total_team_member = count_pending_team_member($pending_acc['team_pending_id']);
            if($count_team_member == $total_team_member ){
                $supervisor_name = get_supervisor_byid($pending_acc['supervisor_id']);
                    if(isset($supervisor_name)){
                        echo "Supervisor: " . $supervisor_name;
                    }else{
                        echo "No selection.";
                    }


                echo "<br>Note: ".$pending_acc['note']."<br><br>";
                   ?>
                <form action="../controller/approve_pending_acc.php" method="post">
                    <input type="hidden" name="account_data" value="<?php ?>">
                    <button name="submit" value="submit">Approve</button>
                </form>
                <?php

            }
            $count_team_member++;
            $team_id = $pending_acc['team_pending_id'];
        }
    ?>

</body>
</html>
<?php     ?>