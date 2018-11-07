// JavaScript File

var randomNumber = Math.floor(Math.random() * 99) + 1;
var guesses = document.querySelector('#guesses');
var lastResult = document.querySelector('#lastResult');
var lowOrHi = document.querySelector('#lowOrHi');

var guessSubmit = document.querySelector('.guessSubmit');
var guessField = document.querySelector('.guessField');

var guessCount = 1;
var resetButton = document.querySelector('#reset');

var wins = document.querySelector('#wins');
var losses = document.querySelector('#losses');

resetButton.style.display = 'none';
guessField.focus();

console.log(randomNumber);
document.getElementById("numberToGuess").innerHTML = randomNumber;

function checkGuess(){
    var userGuess = Number(guessField.value);
    if(guessCount === 1){
        guesses.innerHTML = 'Previous guesses: ';
    }
    
    guesses.innerHTML += userGuess + ' ';
    
    if(userGuess === randomNumber){
        lastResult.innerHTML = 'Congrats! You got it right!';
        lastResult.style.backgroundColor = 'green';
        lowOrHi.innerHTML = '';
        wins.innerHTML++;
        setGameOver();
    }else if(guessCount === 7){
        lastResult.innerHTML = 'Sorry. You lost!';
        losses.innerHTML++;
        setGameOver();
    }else if(userGuess > 99){
        lastResult.innerHTML = 'Cannot be larger than 99!';
        lastResult.style.background = 'red';
        guessCount--;
    }else{
        lastResult.innerHTML = 'Wrong!';
        lastResult.style.background = 'red';
        if(userGuess < randomNumber){
            lowOrHi.innerHTML = 'Too Low!';
        }else if(userGuess > randomNumber){
            lowOrHi.innerHTML = 'Too High!';
        }
    }
    
    guessCount++;
    guessField.value = '';
    guessField.focus();
    
}

guessSubmit.addEventListener('click', checkGuess());

function setGameOver(){
    guessField.disabled = true;
    guessSubmit.disabled = true;
    resetButton.style.display = 'inline';
    resetButton.addEventListener('click', resetGame());
}

function resetGame(){
    guessCount = 1;
    var resetParas = document.querySelectorAll('.resultParas p');
    for(var i = 0; i < resetParas.length; i++){
        resetParas[i].textContent = '';
    }
    
    resetButton.style.display = 'none';
    guessField.disabled = false;
    guessSubmit.disabled = false;
    guessField.value = '';
    guessField.focus();
    
    lastResult.style.backgroundColor = 'white';
    
    randomNumber = Math.floor(Math.random() * 99) + 1;
    
}