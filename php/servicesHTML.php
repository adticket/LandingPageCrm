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
    <form action="services.php" method="POST">
        <div class="container-serviceshtml"> 
            <h1>editieren <h1>
            <?php
                 $sql = "SELECT id, header, tel, button, teaser_text, infos FROM services";
                 $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    echo 
                            '<input type="hidden" name="service['.$result['id'].'][id]" value="'.$result['id'].'"'

                            .'<label for="header'.$result['id'].'"><b> edit '.$result['header'].'</b></label>'
                            .'<input type="text" id="header'.$result['id'].'"  placeholder="'.$result['header'].'" name="service['.$result['id'].'][header]" >'

                            .'<label for="tel'.$result['id'].'"><b> edit '.$result['tel'].'</b></label>'
                            .'<input type="text" id="tel'.$result['id'].'"  placeholder="'.$result['tel'].'" name="service['.$result['id'].'][tel]">'

                            .'<label for="button'.$result['id'].'"><b> edit '. $result['button'].'</b></label>'
                            .'<input id="button'.$result['id'].'" type="text" placeholder="'. $result['button'].'" name="service['.$result['id'].'][button]" >'

                            .'<label for="teaser_text'.$result['id'].'"><b> edit '.$result['teaser_text'].'</b></label>'
                            .'<textarea id="teaser_text'.$result['id'].'"  placeholder="'. $result['teaser_text'].'" name="service['.$result['id'].'][teaser_text]" ></textarea>'

                            .'<label for="infos'.$result['id'].'"><b> edit '.$result['infos'].'</b></label>'
                            .'<input id="infos'.$result['id'].'" type="text" placeholder="'. $result['infos'].'" name="service['.$result['id'].'][infos]" >'
                            ; 
                }
            ?> 
            <br>
            <br>
          
            <hr>
            <br>
            <br>

            <b>Add New Services</b>
            <br>
            
            <input type="hidden" name="service[new][id]" value="new">
            <label for="newHeader"><b>header</b></label>
            <input id="new-header" type="text" placeholder="header text" name="newHeader">

            <label for="newTel"><b>tel</b></label>
            <input id="new-tel" type="text" placeholder="tel..." name="newTel" >

            <label for="new-button"><b> Text für Beratung button</b></label>
            <input id="new-button" type="text" placeholder="text..." name="newButton">

            <label for="new-text"><b> Text </b></label>
            <input id="new-text" type="text" placeholder="text..." name="newtext">

              <label for="new-infos"><b> mehr Infos </b></label>
            <input id="new-infos" type="text" placeholder="mehr Infos..." name="newinfos">
           
            <input type="submit" name="submit" value="save" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>