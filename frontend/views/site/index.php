<?php

/* @var $this yii\web\View */

$this->title = 'Ciater Spa';
?>
<div class="site-index">

    <div class="jumbotron">

    <img src="image/logo1.jpg" width="500" height="200"/> 
    <marquee> <h3>Nothing Heals Like a Natural Hot Spring</h3> </marquee>
    <br>
    <hr>



<div class="w3-content w3-section">

  <center>
  <img class="mySlides w3-animate-top" src="image/2.jpg" style="width:70%">
  <img class="mySlides w3-animate-bottom" src="image/3.jpg" style="width:70%">
  <img class="mySlides w3-animate-top" src="image/4.jpg" style="width:70%">
  <img class="mySlides w3-animate-bottom" src="image/5.jpg" style="width:70%">
  <img class="mySlides w3-animate-bottom" src="image/6.jpg" style="width:70%">
  <img class="mySlides w3-animate-bottom" src="image/7.jpg" style="width:70%">
  <img class="mySlides w3-animate-bottom" src="image/8.jpg" style="width:70%">
  <img class="mySlides w3-animate-bottom" src="image/9.jpg" style="width:70%">
  <img class="mySlides w3-animate-bottom" src="image/10.jpg" style="width:70%">
  <img class="mySlides w3-animate-bottom" src="image/11.jpg" style="width:70%">
  <img class="mySlides w3-animate-bottom" src="image/12.jpg" style="width:70%">
  <a class="w3-btn-floating w3-hover-dark-grey w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
  <a class="w3-btn-floating w3-hover-dark-grey w3-display-right" onclick="plusDivs(1)">&#10095;</a>
</center>   
</div>
<hr>
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
    setTimeout(carousel, 2000);    
}
</script>
    </div>
    <style type="text/css">
   .justify { text-align: justify;}
   </style>

    <center><h3>SELAMAT DATANG</h3></center>
    <br>
    <h4>Salam hangat dari Ciater Spa Resort...!</h4>
   <p class="justify">Ciater Spa Resort terletak di lembah Gunung Tangkuban Perahu yang legendaris di ketinggian 1.050m diatas permukaan laut dengan keunggulan sumber air panas alam dan dikelilingi hijaunya perkebunan teh menjadikan Ciater Spa Resort sebagai tempat yang ideal untuk berlibur bersama keluarga dan kerabat maupun sebagai tempat untuk gathering, meeting maupun outing.<p>
   <p class="justify">Ciater Spa Resort mempunyai fasilitas unggulan wellness spa yang merupakan perpaduan teknologi modern dengan sumber air panas yang berkhasiat bagi kesehatan tubuh, ditangani oleh tenaga ahli medis dan physiotherapy, sehingga para tamu yang datang bisa berlibur sambil memulihkan kesehatan dan kebugaran.<p>
   <br>
</div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
            <div style="text-align: justify;">
                <center><h4>PENGINAPAN </h4></center>

<center><img src="image/aq.png" width="150" height="150"/></center>
<br>
<br>
<form>
<center>
<p><a class="btn btn-lg btn-success" href="http://localhost/proyek2/frontend/web/index.php?r=paket-tambahan%2Findex">INFO PENGINAPAN</a></p>
<br>
<br>
<div id="Akomodasi" class="akomodasi">

</div>
</center>
</form> 
                </div>
                
            </div>
            <div class="col-lg-4">
            <div style="text-align: justify;">

                <center><h4>HUBUNGI</h4></center>

<center><img src="image/aw.png" width="150" height="150"/></center>
<br>
<br>
<form>
<center>
<p><a class="btn btn-lg btn-success" href="http://localhost/proyek2/frontend/web/index.php?r=kontak%2Fcreate">Hubungi Ciater Spa</a></p>
<br>
<br>
<div id="Akomodasi" class="akomodasi">
</div>
</center>
</form> 
                </div>
            </div>
            <div class="col-lg-4">
            <div style="text-align: justify;">
                <center><h4>CARA PESAN </h4></center>

<center><img src="image/as.png" width="150" height="150"/></center>
<br>
<br>
<form>
<center>
<p><a class="btn btn-lg btn-success" href="http://localhost/proyek2/frontend/web/index.php?r=site%2Fpesan">CARA PESAN</a></p>
<br>
<br>
<div id="Akomodasi" class="akomodasi">
  </center>
</div>
</form> 
                
            </div>
        </div>

    </div>
</div>
