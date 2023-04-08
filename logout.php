<?php

session_start();

if(isset($_SESSION['user:id'])){
    unset($_SESSION['user:id']);
}

?>
<!doctype html>
<html lang="en">
<body>
Successfully logged out. <br>
<a href = "login.php">Login</a>

</body>
</html>
