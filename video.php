<style>
#myVideo {
  position: absolute;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}

/* Add some content at the bottom of the video/page */
.content {
  text-align: center;
  position: relative;
  bottom: 0;
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
  font-size: 250%;
  font-family: monospace;
}
.logo{
	position: relative;
    right: 60;
	top: -50;
	margin: 0 100 0 100;
}
.bar{
	display: inline;
position: relative;
top: -150;
margin: 0 80 0 0;
color: white;
text-decoration: none;
font-weight: 1000;
bottom: 0;
}
.bar:hover{
color: 393053;
}
.regbtn{
display: inline;
position: relative;
top: -150;
margin: 0 10 0 0;
text-decoration: none;
font-weight: 1000;
bottom: 0;
width: 200px;
background-color: 443C68;
padding: 10px;
color: white;
border: none;
}
.bookbtn{
width: 250px;
background-color: transparent;
padding: 10px;
color: white;
border-color: white;
font-size: 20px;
}
.bookbtn:hover{
color: 443C68;
border-color: 443C68;
}
a:active
{
color: black;
}
</style>
<video autoplay muted loop id="myVideo">
  <source src="2019_Coachella_Music_Festival_Promo_-_Artplusfashion.mp4" type="video/mp4">
</video><div>

</div>
<!-- Optional: some overlay text to describe the video -->
<div class="content">
<img  class="logo" src="images1.png" alt="Sundown Fest">
<a href="video.php"class="bar">HOME</a>
<a href="booking_stall2.php" class="bar">SELL</a>
<a href="upcoming.php" class="bar">EVENTS</a>
<a href="faq.php" class="bar">FAQ</a>
<a href="generate-ticket.php" class="bar">TICKET</a>
<a href="logout.php"><button type="submit" class="regbtn">LOGOUT</button></a>
  <h3>EXPERIENCE</h3>
  <H1>Movement. Music. Love.</H1>
  <a href="upcoming.php"><button class="bookbtn">Ticket available now.</button></a>
</div>
