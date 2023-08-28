<?php
/*
	Template Name: Building History
*/
get_header(); 

?>

<div class="h-screen w-screen mr-12 grid grid-cols-1 md:grid-cols-2 p-14 gap-6">

<div class="wrapper">
    <a href="#">Hover Me!</a>
  </div>

  <style>
    *,
*:before,
*:after{
box-sizing: border-box;
}

.wrapper{
position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

a{
display: block;
width: 250px;
height: 50px;
line-height: 46px;
text-decoration: none;
text-align: center;
border-radius: 50px;
border: 3px solid seagreen;
color: #00AEC5;
font-size: 20px;
font-family: arial;
position: relative;
overflow: hidden;
background: transparent;
text-transform: uppercase;
transition: all .35s;
}

a:before,
a:after{
position: absolute;
content: "";
width: 100%;
height: 100%;
top: -100%;
left: 0;
background: #00AEC5;
z-index: -1;
transition: all .35s;
}

a:before{
opacity: .5;
}

a:after{
transition-delay: .2s;
}

a:hover{
color: #fff;
}

a:hover:before,
a:hover:after{
top: 0;
}
  </style>

<div hidden class="box-1">
    <div class="btn btn-one">
      <span>HOVER ME</span>
    </div>
  </div>
   
  <!-- Hover #2 -->

  
  <!-- Hover #3 -->
  <div class="box-3">
    <div class="btn btn-three">
      <span>HOVER ME</span>
    </div>
  </div>
  <style>

  div[class*=box] {
  height: 33.33%;
  width: 100%; 
  display: flex;
  justify-content: center;
  align-items: center;
}

.box-1 { background-color: #00AEC5; }
.box-2 { background-color: #00AEC5; }
.box-3 { background-color: #00AEC5; }

.btn {
  line-height: 50px;
  height: 50px;
  text-align: center;
  width: 250px;
  cursor: pointer;
}

/* 
========================
      BUTTON ONE
========================
*/
.btn-one {
  color: #FFF;
  transition: all 0.3s;
  position: relative;
}
.btn-one span {
  transition: all 0.3s;
}
.btn-one::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0;
  transition: all 0.3s;
  border-top-width: 1px;
  border-bottom-width: 1px;
  border-top-style: solid;
  border-bottom-style: solid;
  border-top-color: rgba(255,255,255,0.5);
  border-bottom-color: rgba(255,255,255,0.5);
  transform: scale(0.1, 1);
}
.btn-one:hover span {
  letter-spacing: 2px;
}
.btn-one:hover::before {
  opacity: 1; 
  transform: scale(1, 1); 
}
.btn-one::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  transition: all 0.3s;
  background-color: rgba(255,255,255,0.1);
}
.btn-one:hover::after {
  opacity: 0; 
  transform: scale(0.1, 1);
}


/* 
========================
      BUTTON THREE
========================
*/
.btn-three {
  color: #FFF;
  transition: all 0.5s;
  position: relative;
}
.btn-three::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  background-color: rgba(255,255,255,0.1);
  transition: all 0.3s;
}
.btn-three:hover::before {
  opacity: 0 ;
  transform: scale(0.5,0.5);
}
.btn-three::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0;
  transition: all 0.3s;
  border: 1px solid rgba(255,255,255,0.5);
  transform: scale(1.2,1.2);
}
.btn-three:hover::after {
  opacity: 1;
  transform: scale(1,1);
}
    </style>
  
</div>

<?php get_footer(); ?>