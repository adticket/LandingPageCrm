<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" href="../css/login.css" type="text/css">
</head>
<body>
<?php
 include_once 'connectDB.php';



if(isset($_POST['submit'])){

    $uid = mysqli_real_escape_string($connect, $_POST['uid']);
    $pwd = mysqli_real_escape_string($connect, $_POST['pwd']);

if(empty($uid) || empty($pwd)){
        echo "the fields are empty";
    }
    else{
            $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
            $result = mysqli_query($connect, $sql);
            $resultCheck = mysqli_num_rows($result);
                if($resultCheck < 1){
                    header("Location: login.php?login=empty");
                    exit();  
                    echo 'account is not matching';
                }else{
                    if($row = mysqli_fetch_assoc($result)){
                        $hachedPwdCheck = password_verify($pwd, $row['user_pwd']);
                        if($hachedPwdCheck == false){
                            header("Location: login.php?login=password");
                            exit(); 
                            echo 'password is not wronge';
                        }elseif($hachedPwdCheck == true){
                            $_SESSION['u_id'] = $row['user_id'];
                            $_SESSION['u_first'] = $row['user_first'];
                            $_SESSION['u_last'] = $row['user_last'];
                            $_SESSION['u_email'] = $row['user_email'];
                            $_SESSION['u_uid'] = $row['user_uid'];
                            $_SESSION['admin'] = $row['admin_right'];
                            $_SESSION['isloged'] = true;

                                echo "
                                    <a href='../'>
                                        <div class='logo'>
                                            <img src='.././images/logo.png' />
                                        </div>
                                    </a>
                                    <form action='logout.php' method='POST'>
                                        <button name='submit' class='log-out'> log out</button> 
                                    </form>";
                            include_once('profile.php');
  
                          if($_SESSION['admin'] == 'true'){
                            echo "
                                    <div>
                                        <a class='edit' href='headerHTML.php'>editieren header menu</a>
                                        <br>
                                        <a class='edit' href='headersHTML.php'>editieren headers für jede Sektion</a>
                                        <br>
                                        <a class='edit' href='sectionHTML.php'>edittieren section</a>
                                        <br>
                                        <a class='edit' href='featuresHTML.php'>editieren Features</a>
                                        <br>
                                        <a class='edit' href='servicesHTML.php'>editieren Services</a>
                                        <br>
                                        <a class='edit' href='partnersHTML.php'>editieren Partners</a>
                                        <br>
                                        <a class='edit' href='aboutUsHTML.php'>editieren Über uns</a>
                                        <br>
                                        <a class='edit' href='contactHTML.php'>editieren Kontakt</a>
                                        <br>
                                        <a class='edit' href='footerHTML.php'>editieren Footer</a>

                                        <a class='edit' href='postProducts.php'>Erstelle ein Post</a>

                                        <a class='edit' href='deletProduct.php'> Ein Post löschen</a>

                                        <a href='signup.php'><h1> Erstelle einen Benuzter </h1></a>
                                    </div>
                                ";
                                
                            } elseif($_SESSION['admin'] == 'false'){
                                $sql = "SELECT product_id, product_text, product_title from products";
                                    $products = mysqli_query($connect, $sql);
                                    echo "<h1> Hier findest du unsere Angebote... </h1>
                                            <div class='product'>";
                                    foreach($products as $result){
                                        echo "
                                                <div>
                                                    <h2> ".$result['product_title']."</h2>
                                                    <p> 
                                                        ".$result['product_text']."
                                                    </p>
                                                    <a href='#'>Mehr Infos</a>
                                                </div> 
                                        ";
                                    }
                               echo "</div>";
                                    
                            }else{
                                echo 'You have not loged in <a href="logIn.php"> <h1>please, log in here</h1></a>';
                            }

                           

                        }
                    }
                }
        }

    }
     else{
        header("Location: login.php?login=error");
        exit(); 
        echo 'It happens somethinge wronge'; 
}
?>

</body>
</html>