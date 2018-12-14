   
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
    <form action="headers.php" method="POST">
        <div class="container-headershtml"> 

            <?php
                $sql = "SELECT id, header_name FROM headers";
                $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    echo 
                            '<input type="hidden" name="headers['.$result['id'].'][id]" value="'.$result['id'].'"'

                            .'<label for="header'.$result['id'].'"><b> edit '.$result['header_name'].'</b></label>'
                            .'<input id="header'.$result['id'].'" type="text" placeholder="'.$result['header_name'].'" name="headers['.$result['id'].'][header_name]" >'
                            ; 
                }
            ?> 
            
            <input type="submit" name="submit" value="save" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>