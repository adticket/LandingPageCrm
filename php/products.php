<?php
include('connectDB.php');

if(isset($_POST['submit'])){

    $product_title = mysqli_real_escape_string($connect, $_POST['product_title']);
    $product_text = mysqli_real_escape_string($connect, $_POST['product_text']);

    if(empty($product_title) || empty($product_text) ){
        echo json_encode('Die felder sind leer !');
    }
    else{
        try{
            $sql = "INSERT INTO products(product_title, product_text) VALUES('$product_title', '$product_text')";
            $result = mysqli_query($connect, $sql);
            echo 'Dein Post wurde erfolgreich gepostet';
        }catch (Exception $e) {
            echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
        }
    }


}
