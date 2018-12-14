<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/login.css" type="text/css">
</head>
<body>
        <form action="signupFunc.php" method="POST">
        <div class="container">
            <label for="first"><b>first Name</b></label>
            <input type="text" placeholder="Enter Username" name="first" required>

            <label for="last"><b>last Name</b></label>
                <input type="text" placeholder="Enter last name" name="last" required>


            <label for="uid"><b>user  Name</b></label>
                <input type="text" placeholder="Enter user name" name="uid" required>

            <label for="email"><b>email</b></label>
                <input type="text" placeholder="email" name="email" required>

            <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" required>
            
            <label>
                <input type="checkbox" checked="checked" name="admin" value="true"> Admin Recht vergeben
                <input type="checkbox" checked="checked" name="admin" value="false"> Admin Recht nicht vergeben
            </label>

            <input type="submit" name="submit" value="sign up">
           
            <a href="logIn.php"> log in</a>
        </div>
     </form>


</body>
</html>