<?php
/*
	Template Name: Podcasts
*/
get_header(); 

?>

<div class="h-screen w-screen mr-12 grid grid-cols-1 md:grid-cols-2 p-14 gap-6">
  <div class="text-4xl">
    Coming soon...
  </div>

  <div class="center">
          <button class="btn">
            <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
              <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
              <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
            </svg>
            <span>HOVER ME</span>
          </button>
        </div>

      <style>
        @import url('https://fonts.googleapis.com/css?family=Lato:100&display=swap');


.container {
  width: 400px;
  height: 400px;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  justify-content: center;
  align-items: center;
}

.center {
  width: 180px;
  height: 60px;
  position: absolute;
}

.btn {
  width: 180px;
  height: 60px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #00AEC5;
  outline: none;
  transition: 1s ease-in-out;
}

svg {
  position: absolute;
  left: 0;
  top: 0;
  fill: none;
  stroke: #00AEC5;
  stroke-dasharray: 150 480;
  stroke-dashoffset: 150;
  transition: 1s ease-in-out;
}

.btn:hover {
  transition: 1s ease-in-out;
  background: #ffffff;
}

.btn:hover svg {
  stroke-dashoffset: -480;
}

.btn span {
  color: #00AEC5;
  font-size: 18px;
  font-weight: 100;
}
      </style>
  
</div>

<?php get_footer(); ?>