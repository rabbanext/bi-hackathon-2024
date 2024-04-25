/*!
* Start Bootstrap - Bare v5.0.7 (https://startbootstrap.com/template/bare)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-bare/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
// <!-- // Script Countdown -->
var countDownDate = new Date("Feb 13 2023 00:00:00").getTime();

var x = setInterval(function () {
	var now = new Date().getTime();
	var distance = countDownDate - now;

	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((distance % (1000 * 60)) / 1000);

	document.getElementById("countdown").innerHTML =
		"<div class='countdown'>" +
		"<table id='countdown'>" +
		"<tr>" +
		"<td><h4 class'bold'>" + days + "</h4></td>" +
		"<td><h4 class'bold'>:</h4></td>" +
		"<td><h4 class'bold'>" + hours + "</h4></td>" +
		"<td><h4 class'bold'>:</h4></td>" +
		"<td><h4 class'bold'>" + minutes + "</h4></td>" +
		"<td><h4 class'bold'>:</h4></td>" +
		"<td><h4 class'bold'>" + seconds + "</h4></td>" +
		"</tr>" +
		"<tr>" +
		"<td>days</td>" +
		"<td></td>" +
		"<td>hours</td>" +
		"<td></td>" +
		"<td>minutes</td>" +
		"<td></td>" +
		"<td>seconds</td>" +
		"</tr>" +
		"</table>" +
		"</div>";

	if (distance < 0) {
		clearInterval(x);
		document.getElementById("countdown").innerHTML =
			"<div class='countdown'>" +
			"<table id='countdown'>" +
			"<tr>" +
			"<td><h4 class'bold'>0</h4></td>" +
			"<td><h4 class'bold'>:</h4></td>" +
			"<td><h4 class'bold'>0</h4></td>" +
			"<td><h4 class'bold'>:</h4></td>" +
			"<td><h4 class'bold'>0</h4></td>" +
			"<td><h4 class'bold'>:</h4></td>" +
			"<td><h4 class'bold'>0</h4></td>" +
			"</tr>" +
			"<tr>" +
			"<td>days</td>" +
			"<td></td>" +
			"<td>hours</td>" +
			"<td></td>" +
			"<td>minutes</td>" +
			"<td></td>" +
			"<td>seconds</td>" +
			"</tr>" +
			"</table>" +
			"</div>";
	}
}, 1000);
