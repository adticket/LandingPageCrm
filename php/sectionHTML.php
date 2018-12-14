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
    <form action="section.php" method="POST">
        <div class="container-headerhtml"> 

            <?php
                $sql = "SELECT crmH1, oder, direct, crmsmall FROM section";
                $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    echo 
                            '<input type="hidden" name="section[]" value="section[id]"'

                            .'<label><b> edit '.$result['crmH1'].'</b></label>'
                            .'<input  type="text" placeholder="'.$result['crmH1'].'" name="section[crmH1]">'

                            .'<label><b> edit '.$result['crmsmall'].'</b></label>'
                            .'<input  type="text" placeholder="'.$result['crmsmall'].'" name="section[crmsmall]">'

                            .'<label><b> edit '.$result['oder'].'</b></label>'
                            .'<input  type="text" placeholder="'.$result['oder'].'" name="section[oder]">'

                            .'<label><b> edit '.$result['direct'].'</b></label>'
                            .'<input  type="text" placeholder="'.$result['direct'].'" name="section[direct]"> <hr>'; 
                }
            ?> 
    
           
            <input type="submit" name="submit" value="save" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>