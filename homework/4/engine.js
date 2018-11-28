
var mountains, trees;
var mouse;

var leftArrowDown = false;
var rightArrowDown = false;

var gameTimer; 

const MOUSE_SPEED = 10;
const GRAVITY = 2;
var mouseFallSpeed = 0;
var inAir = true;


document.addEventListener('keydown', function(event){
	if(event.keyCode == 37){ leftArrowDown = true; }
	if(event.keyCode == 39){ rightArrowDown = true; }
	if(event.keyCode == 38 && ! inAir){ jump(); } 
});

document.addEventListener('keyup', function(event){
	if(event.keyCode == 37) leftArrowDown = false;
	if(event.keyCode == 39) rightArrowDown = false;
});

function jump(){
	document.getElementById('sndJump').play();
	inAir = true;
	mouse.src = 'images/mouse_jumping.gif?'
	mouseFallSpeed = -30;
	var mouseY = parseInt(mouse.style.top);
	if(mouseY >= 250){
		mouse.style.top = 249;
	}
}

function initializeGame(){
	mountains = document.getElementById('mountains');
	mountains.style.top = '0px';
	mountains.style.left = '0px';
	
	trees = document.getElementById('trees');
	trees.style.top = '0px';
	trees.style.left = '0px';
	
	mouse = document.getElementById('mouse');
	mouse.style.left = '340px';
	mouse.style.top = '0px';
		
	gameTimer = setInterval(gameLoop, 50)
	var sndMusic = document.getElementById('sndMusic');
	sndMusic.volume = 0.1;
	sndMusic.loop = true;
	sndMusic.play();
}

function gameLoop(){
	var mouseY = parseInt(mouse.style.top);
	if(mouseY < 250){
		mouseFallSpeed += GRAVITY;
		var newMouseY = mouseY + mouseFallSpeed;
		if(newMouseY > 250){ newMouseY = 250; }
		mouse.style.top = newMouseY + 'px';
		if(newMouseY == 250){
			inAir = false;
			document.getElementById('sndLand').play();
		}
	}
	
	var treesX = parseInt(trees.style.left);
	var mountainsX = parseInt(mountains.style.left);
	
	var mouse_src = mouse.src.split('/').pop();
	if(inAir){
		if(mouse.className == 'flip-H'){
			if(treesX < 0){
			trees.style.left = treesX + MOUSE_SPEED + 'px';
			mountains.style.left = mountainsX + MOUSE_SPEED/2 + 'px';
		}
		
		if(treesX > -2400){
			trees.style.left = treesX - MOUSE_SPEED + 'px';
			mountains.style.left = mountainsX - MOUSE_SPEED/2 + 'px';
		} 
		}
	}else{
		if (leftArrowDown || rightArrowDown){
			if(mouse_src != 'images/mouse_running.gif'){
				mouse.src = 'images/mouse_running.gif?'
			}
		}else{
			mouse.src = 'images/mouse_standing.gif?'
		}
		
		if(leftArrowDown && treesX < 0){
			mouse.className = 'flip-H';
			trees.style.left = treesX + MOUSE_SPEED + 'px';
			mountains.style.left = mountainsX + MOUSE_SPEED/2 + 'px';
		}
		
		if(rightArrowDown && treesX > -2400){
			mouse.className = '';
			trees.style.left = treesX - MOUSE_SPEED + 'px';
			mountains.style.left = mountainsX - MOUSE_SPEED/2 + 'px';
		} 
	}
}


