
var mountains, trees;
var mouse;

var leftArrowDown = false;
var rightArrowDown = false;

var gameTimer; 

const MOUSE_SPEED = 10;

function initializeGame(){
	mountains = document.getElementById('mountains');
	mountains.style.top = '0px';
	mountains.style.left = '0px';
	
	trees = document.getElementById('trees');
	trees.style.top = '0px';
	trees.style.left = '0px';
	
	mouse = document.getElementById('mouse');
	mouse.style.left = '340px';
	mouse.style.top = '250px';
		
	gameTimer = setInterval(gameLoop, 50)
}

function gameLoop(){
	var treesX = parseInt(trees.style.left);
	var mountainsX = parseInt(mountains.style.left);
	
	if(leftArrowDown && treesX < 0){
		trees.style.left = treesX + MOUSE_SPEED + 'px';
		mountains.style.left = mountainsX + MOUSE_SPEED/2 + 'px';
	}
	
	if(rightArrowDown && treesX > -2400){
		trees.style.left = treesX - MOUSE_SPEED + 'px';
		mountains.style.left = mountainsX - MOUSE_SPEED/2 + 'px';
	} 
}

document.addEventListener('keydown', function(event){
	if(event.keyCode == 37) leftArrowDown = true;
	if(event.keyCode == 39) rightArrowDown = true;
});

document.addEventListener('keyup', function(event){
	if(event.keyCode == 37) leftArrowDown = false;
	if(event.keyCode == 39) rightArrowDown = false;
});

