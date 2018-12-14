<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/login.css" type="text/css">
</head>
<body>
<?php
// session_start();
$first = $_SESSION['u_first'];
 $last = $_SESSION['u_last'];
 $admin = $_SESSION['admin'];
        
 if('true' == $admin){
    echo "Du bist Admin";
 }

 $avaterURL = 'profile.png';
        echo "
            <h1>$first  $last <h1>
            <img src='.././images/$avaterURL' alt='avater is not availble' width='70' height='70' class='profile-avater'/>
        ";
    //  echo "
    //         <form action='' method='POST' enctype='multipart/form-data'>
    //             <input type='file' name='file'>
    //             <input type='submit' value='upload' name='submit' class='img-submit'>
    //         </form>
    //         ";
if(isset($_FILES['file'])){
     move_uploaded_file($_FILES['file']['tmp_name'], '.././images/'.$_FILES['file']['name']);
     $avaterURL = $_FILES['file']['name'];
}
?>

</body>
</html>


