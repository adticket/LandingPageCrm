
const p1 = "./images/p1.png";
const p2 = "./images/p2.png";
const p3 = "./images/p3.png";
const p4 = "./images/p4.png";
const p5 = "./images/p5.png";
const p6 = "./images/p1.png";
//import images for more info about partners
const info1 = "./images/ausdruck-denken-dunkles-haar-1539679.jpg";
const info2 = "./images/augen-bart-brille-220453.jpg";
const info3 = "./images/person.png";
const info4 = "./images/person.png";
const info5 = "./images/person.png";
const info6 = "./images/person.png";

    var app = new Vue({
                el: '#app',
                data: {
                    selected: 1, // save the selected item on the menu
                    isActive: false,
                    move: '', // move the logos right and left depanding on the click
                    moveL: 'move-left', // save a css class on this var... to move left
                    moveR: 'moveRight', // save a css class on this variable to move right
                    color: '#141414', // save color propety
                    selectedImg: 1,
                    active1: 'advice', // controlling the change content if the user cklicks on the button
                    active2: true, // adding the div element into the button if it is active
                    submited: 'dis',
                    firstName: '',
                    lastName: '',
                    text: '',
                    mail:'',
                    toggleMenu: false,
                    imgs: [
                            {img: p1, i:1, key: 15},
                            {img: p2, i:2, key:16},
                            {img: p3 , i:3, key:17},
                            {img: p4, i:4, key:18},
                            {img: p5, i:5, key: 19},
                            {img: p5, i:6, key: 20},
                            {img: p6, i:7, key: 21}
                           ],
                    infos: [
                            {info: info1, i:1, key: 8},
                            {info: info2, i:2, key: 9},
                            {info: info3 , i:3, key: 10},
                            {info: info4, i:4, key: 11},
                            {info: info5, i:5, key: 12},
                            {info: info5, i:6, key: 13},
                            {info: info6, i:7, key: 14}
                        ],
                    partnersHead: 'Unsere Partner',
                    togglePlay: false

                },
                methods:{
                    moveLeft: function(){
                        this.move = true;
                        // move to true
                    },
                    moveRight: function(){
                        this.move = false
                        // set move to false
                    },
                    moveLeftMobile: function(){// mobile visible
                            this.selectedImg -= 1; //add selected img -
                        if(this.selectedImg <= 1){
                            this.selectedImg = 1; // set selected img to 0
                        }else{
                            return;
                        }
                    },
                    moveRightMobile: function(){
                        this.selectedImg += 1
                        if(this.selectedImg >= 8){
                            this.selectedImg = 7; // selected img to 6
                        }else{
                            return;
                        }
                    
                    },
                    toggle () {
                        var elem = document.querySelector("video"); 
                         // fullscreen reguest for the video
                            if (elem.requestFullscreen) {
                                elem.requestFullscreen();
                                elem.play();
                                this.togglePlay = true;
                            } else if (elem.mozRequestFullScreen) { /* Firefox */
                                elem.mozRequestFullScreen();
                                elem.play();
                            } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
                                elem.webkitRequestFullscreen();
                                elem.play();
                            } else if (elem.msRequestFullscreen) { /* IE/Edge */
                                elem.msRequestFullscreen();
                                elem.play();
                            }
                            if(elem.requestFullscreen == false){
                                this.togglePlay = false;
                                alert(elem.requestFullscreen);
                                }
                                if(!this.togglePlay){
                                    elem.pause();
                                }
                            
                    },
                    check: function(){
                        if (this.firstName.length >= 2 && this.lastName.length >= 2 && this.text.length >= 2 && this.mail.length >= 2 && this.mail.includes('@')){
                                this.submited = 'an';      
                            } else if (this.firstName.length == 0 && this.lastName.length == 0 && this.text.length == 0){ 
                            this.submited = 'dis';      
                             } else {
                                this.submited = 'dis'; 
                            }
                    },
                    selectingLang(){
                        var selectL = document.getElementById('selectLang').value;
                                if(selectL == 'de'){
                                console.log('selected lang is deutsch');
                            }
                            else if(selectL == 'en'){
                                console.log('selected lang is english');
                            }
                         },
                    advice: function() { // switching between active section and inactive
                            if(this.active1 === 'advice') {
                                this.active1 = 'support' // set active to support
                            } else if(this.active1 === 'support'){
                                this.active1 = 'advice' // active to advice
                            }

                            if(this.active2 === true){ // active2 
                                this.active2 = false // set active to false
                            }else if(this.active2 === false){
                                this.active2 = true // set active to true
                            }
                        }
                }
            })