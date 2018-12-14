<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>landing page</title>

<link rel="stylesheet" href="./css/style.css" type="text/css" >
<link rel="stylesheet" href="./css/resposive.css" type="text/css" >

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
</head>
<body>
<?php 

include_once './php/section.php';
include_once './php/connectDB.php';
$_SESSION['isloged'] = false;
?>
<div id="app">
     <!--beginn header section-->
     <div class="header desktop" >
          <div class="home-logo">
            <!--home logo-->
               <img src="./images/logo.png" class="logo">
          </div>
          <!--menu on the header section-->
          <div class="navbar1">
              <ul>
                <li>
                  <!--filtering the menu items-->
                  <?php
                  $sql = "SELECT id, link_url, link_text from header";
                  $results = mysqli_query($connect, $sql);
                  foreach($results as $menu){
                      ?>
                        <a
                            v-bind:class="{active:<?php echo $menu['id'];?> == selected}"
                            @click="[selected = <?php echo $menu['id'];?>]" 
                            href="#<?php echo $menu['link_url']; ?>">
                                <?php echo $menu['link_text']; ?>
                        </a>
                    <?php
                        }
                    ?>
                  </li>      
              </ul>
              </div>
              <!--menu on right side on  the header-->
          <div class="navbar2">
                <ul>
                      <li><a class="tel"><img src="./images/phone.png" class="phone"/> 
                            
                    <?php
                        $sql = "SELECT tel from header";
                        $results = mysqli_query($connect, $sql);
                        foreach($results as $menu){
                            echo $menu['tel'];
                            }
                            ?>
                      </a>
                    </li>
                      <div id="lang-and-log-in">
                    
                          <li><a href="#" class="lang">
                              <form action="" method="GET">
                                <select id="selectLang" @change="selectingLang" name="lang"> 
                                    <option value="de" name="de">de</option>
                                   <option value="en" name="en">en</option>
                                </select>                         
                            </form>
                                </a></li>
                          <li><a href="php/logIn.php" class="log-in"><img src="./images/lock-alt.png" class="log-in-img"/> <span class="log-in-btn" >
                              <?php echo $_SESSION['isloged'] ? 'log out' : 'log in'; ?>
                            </span></a></li>
                      </div>
                </ul>
        </div>
        </div>
        <!--visible on small devices-->
        <div class="header show-mobile-header">
            <!--menu on the header section-->
                <div class="menu">
                  <div class="hamburger" @click="toggleMenu = true">
                      <div class="menu1"></div>
                      <div class="menu2"></div>
                      <div class="menu3"></div>
                  </div>
                  <!--looping through the menu items-->
                  <div class="list-menu" :class="{toggle: toggleMenu}">
                      <span class="close" @click="{toggle: toggleMenu}">
                      <span class="close" @click="toggleMenu = false">schließen</span>
                            
                                 <!--filtering the menu items-->
                    <?php
                    $sql = "SELECT id, link_url, link_text from header";
                    $results = mysqli_query($connect, $sql);
                    foreach($results as $menu){
                        ?>
                            <a
                                v-bind:class="{active:<?php echo $menu['id'];?> == selected}"
                                @click="[selected = <?php echo $menu['id'];?>, toggleMenu = false]" 
                                href="#<?php echo $menu['link_url']; ?>">
                                    <?php echo $menu['link_text']; ?>
                            </a>
                        <?php
                            }
                        ?>
                    
                  </div>
                 
                  </div>
                <div class="home-logo-mobile">
                  <!--home logo-->
                    <img src="./images/logo.png" class="logo">
                </div>
                    <!--menu on right side on  the header-->
                <div class="navbar2-mobile">
                      <ul>
                          <li><a href="php/logIn.php" class="log-in-mobile"><img src="./images/lock-alt.png" class="log-in-img-mobile"/> </a></li>
                      </ul>
              </div>
  
        </div>