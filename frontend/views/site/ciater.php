<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<style>
.mySlides {display:none;}
</style>
<body>

<div class="w3-container">
  <center><h2>Ciater Spa & Resort</h2></center>
  <center><p>Slide or fade in an element from the top, bottom, left or right of the screen with the w3-animate-* classes.</p></center>
</div>
<center>
<div class="w3-content w3-section" style="max-width:700px">
  <img class="mySlides w3-animate-top" src="image/2.jpg" style="width:100%">
  <img class="mySlides w3-animate-bottom" src="image/3.jpg"" style="width:100%">
  <img class="mySlides w3-animate-top" src="image/4.jpg"" style="width:100%">
  <img class="mySlides w3-animate-bottom" src="image/5.jpg"" style="width:100%">
</center>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2500);    
}
</script>