<?php
session_start();
    include("connection.php");
    include ("functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
            //save to db
            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }else{
            echo "Please enter some valid information!";
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
<title>Sign up</title>

</head>
<body>
<form method ="post">
    <div>Sign Up</div>
    <input type="text" name="user_name"><br>
    <input type="password" name="password"><br>

    <input type="submit" value="Submit">
    <a href="login.php">Sign Up</a>

</form>

</body>

</html>
