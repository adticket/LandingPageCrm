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
    <form action="partners.php" method="POST">
        <div class="container-partnershtml"> 
            <h1>editieren <h1>
            <?php
                 $sql = "SELECT id, teaser_text FROM partners";
                 $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    echo 
                            '<input type="hidden" name="partners['.$result['id'].'][id]" value="'.$result['id'].'"'

                            .'<label for="teaser_text'.$result['id'].'"><b> edit '.$result['teaser_text'].'</b></label>'
                            .'<textarea id="teaser_text'.$result['id'].'"  placeholder="'. $result['teaser_text'].'" name="partners['.$result['id'].'][teaser_text]" ></textarea>'
                            ; 
                }
            ?> 
            <br>
            <br>
          
            <hr>
            <br>
            <br>

            <b>Add New Partner</b>
            <br>
            
            <input type="hidden" name="partners[new][id]" value="new">

            <label for="newteasertext"><b>text</b></label>
            <textarea id="newteasertext" placeholder="text" name="newteasertext"></textarea>
           
            <input type="submit" name="submit" value="save" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>