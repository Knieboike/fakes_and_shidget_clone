<?php

function check_login($con)
{
    //Check if user value with user id exists
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) >0){
            //return user data
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login

    header("Location: login.php");
    die;
}
function random_num($length){
    $text = "";
    if ($length < 5)
    {
        $length = 5;
    }
    //Assign random number between 4 and $length to
    $len = rand(4, $length);
    for($i = 0; $i< $len; $i++){
        $text .= rand(0,9);

    }
    return $text;
}

