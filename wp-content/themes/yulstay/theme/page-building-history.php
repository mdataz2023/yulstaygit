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
color: seagreen;
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
background: seagreen;
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
  
</div>

<?php get_footer(); ?>