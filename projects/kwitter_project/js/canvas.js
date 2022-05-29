// Logo animation
var canvas = document.getElementById('ctx');
var ctx = canvas.getContext('2d');
ctx.font = '30pt Arial Black';

const logo = 'Kwitter';
ctx.fillStyle = "#fff";
ctx.shadowOffsetX = 4;
ctx.shadowOffsetY = 4;
ctx.shadowColor = "black";

for (var j = 0; j < 1000; j++) {
	
	setTimeout(function() {
		for (var i = 0; i <= logo.length; i++) {
			let logopart = logo.substring(0, i);
			
			setTimeout(function() {
		 		ctx.clearRect(0,0,canvas.width,canvas.height);
		 		ctx.fillText(logopart, (canvas.width/2)-(ctx.measureText(logopart).width/2), 40);
			}, 750*i);
		}
	}, 6400*j);
}

// Sound for liking and disliking
function merp() {
	let mySound = new Audio('sounds/merp.wav');
	mySound.volume = 0.3
	mySound.play();
}