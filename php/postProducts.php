<?php 
include_once 'connectDB.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" href="../css/login.css" type="text/css">
</head>
<body>
    <form action="products.php" method="POST">
        <div class="container-headerhtml"> 

                            <label for="productproduct_title"><b> schreib title fürs Post</b></label>
                            <input id="productproduct_title" type="text" placeholder="title für ein Post" name="product_title" >

                            <label for="productproduct_text"><b>schreib text für Post</b></label>
                            <textarea id="productproduct_text" type="text" placeholder="Schreib text fürs Post" name="product_text"></textarea> <hr>
           
            <input type="submit" name="submit" value="save" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>