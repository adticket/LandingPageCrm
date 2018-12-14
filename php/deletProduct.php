<?php 
include_once 'connectDB.php';
$err = null;
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" href="../css/login.css" type="text/css">
</head>
<body>
    <form action="" method="POST">
        <div class="container-headerhtml"> 

            <label for="delete"><b>inter a title </b></label>
            <span style="color:red;"><?php if($err){echo $err;} ?></span>
            <input id="delete" type="text" placeholder="insert the title, which you want to delete" name="delete">
            <input type="submit" name="submit" value="delete" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>

<?php
if(isset($_POST['delete'])){
 $title = $_POST['delete'];

 if(empty($title)){
    $err = 'the field is empty';
    ECHO 'THE FELD IS EMPTY';
 }else{
    $sql = "DELETE from products WHERE product_title ='$title'";
    $results = mysqli_query($connect, $sql);
    echo $title.' ist erfolgreich gelöscht';
 }
}