<?php
session_start();
include("connection.php");
include ("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
        //read from db

        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);
        if ($result){
            if($result && mysqli_num_rows($result) >0){
                //return user data
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password){
                    //Correct data used for login
                    //Assign Session to user_id and go to index.php page
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }


    }else{
        echo "Please enter some valid information!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

</head>
<body>
<form method ="post">
    <div>Login</div>
    <input type="text" name="user_name"><br>
    <input type="password" name="password"><br>

    <input type="submit" value="Login">
    <a href="signup.php">Click to Sign Up</a>

</form>

</body>

</html>
