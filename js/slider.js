"use strict";

let i = 0;

function init(){
  document.slide.src = canvas[0];
}

function changeSlide(n) { 

  if (n ===  1) {
    i++;
    i = (i % canvas.length); 
  } 

  if (n === -1) {
    i--; 
    i = ((i + canvas.length) % canvas.length); 
  } 
  
  document.slide.src = canvas[Math.abs(i)];
}

window.load = init();

