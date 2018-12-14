<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/login.css" type="text/css">
</head>
<body>

        <form action="loginFunc.php" method="POST">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username / email" name="uid" required>

                <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" required>

                <input type="submit" name="submit" value="Log in" />
               
            </div>

        </form>

</body>
</html>