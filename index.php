<?php echo include('header.php');?>
         <!--beginn the fisrt section -->
<div ref="section" id="Home">
    <div class="section">
        <div class="img-section">
             <!-- <img src="./images/0001.jpeg" class="img-sec" alt=""/>
             <img src="./images/header_03.jpeg" alt="" class="img-mobile-sec" @click="toggle"> -->
             <picture>
                <source media="(min-width: 38em)" srcset="./images/0001.jpeg">
                <source  media="(max-width: 38em)" srcset="./images/header_03.jpeg" class="img-sec">
                <img src="./images/header_03.jpeg" alt="" class="img-mobile-sec" @click="toggle">
            </picture>
        </div>
        <div> 
            <?php $sql = "SELECT crmH1, crmsmall, oder, direct from section";
                    $results = mysqli_query($connect, $sql);
                    foreach($results as $result){
              ?>
            <h1 class="crm wip"><?php echo $result['crmH1']; ?>
                <br />
                    <small class="small"> <?php echo $result['crmsmall']; ?></small>
            </h1>
            
            </div>
            <div class="container wip">
                   
                <div class="video">
                    <!--video -->
                    <div class="toggle-img img-vid"> 
                        <img src="./images/0003.jpeg" @click="toggle">
                    </div>
                        
                        <div class="video-player img-vid" >
                            <video controls class="video" width="150" height="150">
                                <source src="./video/video.mp4" type="video/mp4">
                            </video>
                        </div>
                     
                </div>
                <div class="p">
                    <p class="or"> <?php echo $result['oder']; ?></p>
                </div>
                <div class="btn">
                    <button class="button"> <?php echo $result['direct']; ?> </button>
                </div>
            </div>
            <?php  }
            ?>
        <div class="btn  show-mobile">
        <?php $sql = "SELECT direct from section";
                    $results = mysqli_query($connect, $sql);
                    foreach($results as $result){
              ?>
                <a class="tel" href="#"><img src="./images/phone.png" class="phone"/> 
                <?php
                        $sql = "SELECT tel from header";
                        $results = mysqli_query($connect, $sql);
                        foreach($results as $menu){
                            echo $menu['tel'];
                            }
                            ?>
                </a>
                <button class="button">
                    <?php echo $result['direct']; ?>
                </button>
                <?php
                    }
                ?>
         </div>
    <!-- <div class="right-img">
        <img src="./images/0002.jpg" class="img-part"> 
    </div> -->
    </div>

</div>

<!--features --> 


    <div id="Features">
        <!--features section-->
        <div class="features" id="features" ref="features">
            <h1 class="features-head"> 
            <?php
                $sql = "SELECT id, header_name FROM headers";
                $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    $features = $result['id'] == 1 ? $result['header_name'] : '';
                    echo $features;
                }
                ?>
            </h1>
                  <!-- first feature-->
            <div class="feature">
                         <?php
                                $sql = "SELECT id, icon, headline, teaser_text, link_text, link_url FROM features";
                                $results = mysqli_query($connect, $sql);
                                foreach($results as $result) {
                                ?>
                                <div class="item" >
                                    <div class="icons-container">
                                            <img src="<?php echo "./images/".$result['icon'];?>" class="icon"/>
                                        </div>
                                    <h3>  <?php echo $result['headline']; ?></h3>
                                    <p>
                                        <?php echo $result['teaser_text'];?>
                                    </p>
                                    <a href="<?php echo $result['link_url'];?>" class="info"><?php echo $result['link_text']; ?></a>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                             
                                </div>
                                <?php
                                }
                                ?>
                
   
        </div>
    </div>
 </div>
                        
        <!-- services -->
    <!--beginn services section -->
    <div class="services" id="Services" ref="services">
        <!-- image left side-->
        <div class="team-img">
            <img src="./images/service-min.png" class="img"/>
        </div>
        <!-- right content-->
        <div class="service">
        <?php
            $sql = "SELECT id, header, tel, button, teaser_text, infos FROM services";
            $results = mysqli_query($connect, $sql);
            foreach($results as $result) {
            ?>

                <h2 class="services-h2"><?php echo $result['header']; ?> 
                        <a class="services-hide-mobile" href="tel:<?php echo $result['tel']; ?>">
                        <img src="./images/phone.png" class="service-phone"> <?php echo $result['tel']; ?></a>
                    </h2>
                <img src="./images/Ebene 6.png" class="img-mobile-services"/>
                <div class="content">
                        <button class="advice-btn" v-on:click="advice()" :class="{col: active2}"><?php echo $result['button'] !== 'Beratung' ? 'Beratung': $result['button'];?> </button> 
                         <button class="support-btn" v-on:click="advice()" :class="{col: !active2}"><?php echo $result['button'] == 'support' ? $result['button']: '';  ?></button> 
                        <button class="act" v-if="active2 == true"></button>
                        <button class="act1" v-else></button>
                       
                        <transition-group mode="out-in">
                                <div class="advice"  v-if="active1 == 'advice'" :key="20000">
                                        
                                        <p>
                                           <?php echo $result['teaser_text']; ?>
                                        </p>
                                        <p>
                                           <?php echo $result['teaser_text']; ?>
                                        </p>
                                        <a href="#" class="more"> 
                                          <?php echo $result['infos']; ?>
                                        </a>  
                                </div>
                            </transition-group>
                            <transition-group mode="out-in">
                                <div class="support" v-if="active1 == 'support'" @click="advice()" :key="30000">
                                    
                                        <p>
                                           <?php echo $result['teaser_text']; ?>
                                        </p>
                                        <p>
                                           <?php echo $result['teaser_text']; ?>
                                        </p>
                                        <a href="#" class="more">
                                            <?php echo $result['infos']; ?>
                                    </a>
                                </div>
                        </transition-group>
                            <div class="points">
                                <div class="point">
                                    <div> <img src="./images/angle2.png" class="point-1"/> <a href="#">Service point #1</a> </div>
                                    <div> <img src="./images/angle2.png" class="point-1"/> <a href="#">Service point #2</a> </div>
                                    <div> <img src="./images/angle2.png" class="point-1"/> <a href="#">Service point #3</a> </div>
                                    <div> <img src="./images/angle2.png"  class="point-1"/> <a href="#">Service point #4</a> </div>
                                </div>
                                <div class="point">
                                    <div> <img src="./images/angle2.png" class="point-1"/> <a href="#">Service point #5</a> </div>
                                    <div> <img src="./images/angle2.png" class="point-1"/> <a href="#">Service point #6</a> </div>
                                    <div> <img src="./images/angle2.png" class="point-1"/> <a href="#">Service point #7</a> </div>
                                    <div> <img src="./images/angle2.png" class="point-1"/> <a href="#">Service point #8</a> </div>
                                </div>
                            </div>
                        </div>

                <?php
                  }
                ?>
        </div>
    </div>
  


<!--beginn partners section-->
<div id="Partners" ref="partners">
       
    <div class="partner">
         <div class="partners-head">
             <h1>
             <?php
                    $sql = "SELECT id, header_name FROM headers";
                    $results = mysqli_query($connect, $sql);
                    foreach($results as $result) {
                        $features = $result['id'] == 3 ? $result['header_name'] : '';
                        echo $features;
                    }
                    ?> 
             </h1></div>
        <div class="slider1"> 
            <!--left silder-->
            <img src="./images/angle2.png" class="slider-img" @click="moveLeft()" :style="{color: color}"/>
        </div>
        
    <div class="infos-container">
        <div class="text">
        <?php 
                $sql = "SELECT id, teaser_text from partners";
                $results = mysqli_query($connect, $sql);  
                foreach($results as $result){
                        ?>
                    <transition-group name="fade">
                        <div v-show="<?php echo $result['id']; ?> ==selectedImg" :key="<?php echo $result['id']; ?>">       
                            <p>
                                <?php echo $result['teaser_text'];?>                             
                            </p>   
                        </div>
                    </transition-group>
                <?php
                    }
                  ?>
              </div>
              <div class="info">
                <transition-group name="slide-fade">
                    <div  
                            v-for="inf in infos" 
                            :key="inf.key"
                            v-show="inf.i == selectedImg">
                        <img v-bind:src="inf.info" />       
                </div>  
            </transition-group>         
        </div>
   
        </div>
                <div  class="over-flow" :class="[move ? moveL : moveR]" >
                    <div class="icons" v-for="image in imgs" :key="image.i">
                
                        <div>
                                <img
                                v-bind:src="image.img" 
                                @click="[selectedImg = image.i]"
                                class="inactive" :class="{activeImage: image.i == selectedImg}"/> 
                        </div>
                    </div>
                </div>

            <!--right slider-->
            <div class="slider2">
                <img src="./images/angle2.png" class="slider-img" @click="moveRight()" />
            </div>  
    </div>
       
    <div class="partners-mobile">
        <div class="partners-head">
             <h1> 
             <?php
                    $sql = "SELECT id, header_name FROM headers";
                    $results = mysqli_query($connect, $sql);
                    foreach($results as $result) {
                        $features = $result['id'] == 3 ? $result['header_name'] : '';
                        echo $features;
                    }
                    ?> 
             </h1>
         </div>
         <div class="slider-mobile1" :class="{opacity: selectedImg == 1}"> 
                    <!--left silder-->
            <img src="./images/angle2.png" class="slider-img" @click="moveLeftMobile()" :style="{color: color}"/>
        </div>
        <div class="partners-mobile-animate">
                <transition-group class="fade">
                    <!--right slider-->
                
                        <div  
                            class="mobile-infos"
                            v-for="inf in infos" 
                                :key="inf.key"
                                v-show="inf.i == selectedImg">
                            <img v-bind:src="inf.info" />       
                        </div> 
                        
                    
                        <div v-for="image in imgs" 
                            class="mobile-image"
                            :key="image.key" 
                            v-show="image.i == selectedImg">
                        <img
                            v-bind:src="image.img" 
                            @click="[selectedImg = image.i]"
                            /> 
                        </div>
                    <div :key="1000">
                            <?php 
                                $sql = "SELECT id, teaser_text from partners";
                                $results = mysqli_query($connect, $sql);  
                                foreach($results as $result){
                                    ?>
                                        <div class="mobile-text" 
                                            v-show="<?php echo $result['id']; ?> == selectedImg">
                                                        <i>
                                                            <?php echo $result['teaser_text'];?>
                                                        </i>
                                                    </p> 
                                            
                                            <img src="./images/star.png" class="rate">
                                            <img src="./images/star.png" class="rate">
                                            <img src="./images/star.png" class="rate">
                                            <img src="./images/star.png" class="rate">
                                            <img src="./images/star.png" class="rate">
                                    </div>
                                    <?php
                                    }
                                ?>
                        </div>
                </transition-group>
                
                 <div class="slider-mobile2" :class="{opacity: selectedImg == 7}">
                    <img src="./images/angle2.png" class="slider-img" @click="moveRightMobile()" />
                </div> 
            </div> 
    </div>
</div>


<!-- about us -->
<div id="ueber-uns" ref="ueber-uns"> 
    <div class="abouts">
        <div class="about-head"><h1> 
            <?php
                    $sql = "SELECT id, header_name FROM headers";
                    $results = mysqli_query($connect, $sql);
                    foreach($results as $result) {
                        $features = $result['id'] == 4 ? $result['header_name'] : '';
                        echo $features;
                    }
                    ?> 
        </h1></div>
            <div class="about">          
                
                 <?php 
                    $sql = "SELECT id, headline, teaser_text, link_text, link_url, icon from aboutUs";
                    $results = mysqli_query($connect, $sql);

                    foreach($results as $result){
                        ?>
                        <div class="items">
                            <img src="<?php echo "./images/".$result['icon'];?>" alt="image is not availible"/>
                            <h2><?php echo $result['headline']; ?></h2>
                            <p> <?php echo $result['teaser_text']; ?></p>
                            <a href="<?php echo $result['link_url']; ?>" class="more"><?php echo $result['link_text']; ?></a>
                       </div>
                   <?php
                 }
                 ?>
        </div>
        <div class="show-mobile">
             <div class="mobile-about">
                
                <img src="./images/Ebene10.png" alt="image is not availible"/>
                 <div class="text">
                    <h2> Kontaktverwaltung</h2>
                    <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                     magna aliquyam erat, sed diam voluptua. At vero eos et accusam et 
                    
                    </p>
                    <a href="#" class="more"> Mehr INfos</a>
                </div>
                
            </div>
        </div>          
    </div>
</div>

<!-- contact -->
<!--beginn contact section-->
<div class="contact" id="kontakt" ref="contact">
    <div class="contact-head"> <h1> 
                <?php
                    $sql = "SELECT id, header_name FROM headers";
                    $results = mysqli_query($connect, $sql);
                    foreach($results as $result) {
                        $features = $result['id'] == 5 ? $result['header_name'] : '';
                        echo $features;
                    }
                    ?>  </h1></div>
    <div class="contacts">
        <!--form element-->
        <form  method="post" action="./php/mailer.php" enctype="multipart/form-data">
        <?php
                $sql = "SELECT first_name, last_name, eMail, request, reservix FROM contact";
                $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    ?>
            <div class="inputs">          
                        <div>
                            <label><?php echo $result['first_name']; ?> *</label><br/>
                            <input v-model="firstName"  v-on:input="check" name="fname" require/>
                        </div>
                        <div>
                            <label><?php echo $result['last_name']; ?> *</label><br/>
                            <input v-model="lastName"  v-on:input="check"  name="sname" require/>
                        </div>
                        <div>
                            <label><?php echo $result['eMail']; ?> *</label><br/>
                            <input v-model="mail"  v-on:input="check" name="email" require/>
                         </div>
            </div>
            <div>
                 <label><?php echo $result['request']; ?> *</label><br/>
                <textarea v-model="text" id="textArea"   @focus="check()" placeholder="Hier kommt Ihr Anfrage..." v-on:input="check" name="message" require ></textarea>
            </div>
             <div >
                <button  type="submit" class="submit" name="submit" :class="{anabled: submited == 'an'}"> 
                    <img src="./images/paper-plane.png" class="paper-plane"  /> <span class="submit-text"> submit</span> 
                </button>
            </div>
            <?php
                }
            ?>
        </form>

        <div>
            <!--MAP-->
            <div id="map">
    
             </div>
        </div>
<!--INFOS About kontacting-->
       <div class="address">
       <?php
            $sql = "SELECT first_name, last_name, eMail, request, reservix FROM contact";
            $results = mysqli_query($connect, $sql);
            foreach($results as $result) {
                    ?>
                    <div id="address"> ReserviX GmbH</div>
                    <p>Kaiserstraße 56</p>
                    <p> 60329 Frankfurt am Main</p>
                    <p> Tel: <a href="tel:+5050505005050" class="tel-address">555573782642</a> </p>
                    <p class="id">Ust-ID US2837271</p>
                    <p class="ans"> AP: Abdu</p>
            <?php
                }
             ?>
        </div>
    </div>

    </div>
<?php include('footer.php'); ?>
