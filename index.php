<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Silverado Cinema - Home</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://use.fontawesome.com/daa44d12d2.js"></script>


 <!-- this one is the one I used initially  <meta name="viewport" content="width=device-width" -->

</head>

<body>

<header>
    <div class="content">
    <div id="header-emblem">
        <img src="photos/silverado.png" alt="The silverado logo">
    </div>

        <h1 class="title"> <br> <em>The best it gets</em> </h1>

    <div id="header-stars">
    <img src="photos/silverado_stars.png" alt="Silverado stars">
    </div>
        </div>

</header>

<nav>
    <div class="content">
        <a class="active" href="index.php">Home</a>
        <a href="showing.php">Now Showing</a>
    </div>
</nav>

<main>

<section id="grandOpen">
    <div class="content">

        <h1> Silverado Cinima Grand Reopening </h1>

        <p>

            Renovations are over at Silverado! <br>
            To Help celebrate we are offering discounted tickets every day at 1PM and all day Monday and Tuesday.

        </p>

    </div>

</section>

    <section id="belt">
        <div class="content">

         <h2>We've upgraded!</h2>
            <p>Silvardo cinema is now the most <em>comfortable</em> and <em>advanced</em> cinema in the the greater
            Faketown area! Our facilities have been built from the ground up to deliver the most
                incredible cinema experience possible. Learn more below!
            </p>

        </div>
    </section>

    <section id="renoBox">
    <div class="content">
        <div class="box">
            <h2>Dolby Lighting and Sound</h2>
            <!-- image sourced from: https://www.dolby.com/us/en/technologies/cinema/dolby-atmos.html-->
            <img src="photos/dolby-atmos.png" alt="Dolby atmos">
            <p>Hear every detail with our ultimate Dolby sound system.
            Our Dolby lighting and sound is class leading, learn more <a href="https://www.dolby.com/us/en/platforms/dolby-cinema.html">here.</a> </p>
        </div>
        <div class="box">
            <h2>Get Comfortable</h2>
            <!--image sourced from: http://www.glenwoodnyc.com/manhattan-living/amc-luxury-movie-theater-nyc/-->
            <img src="photos/recliners.jpg" alt="damn comfy">
            <p> Sit back relax and enjoy all that Silverado has to offer in our new first class and normal seating.
                Or for the best value comfort bring the whole family along and try our beanbag section.</p>
        </div>
        <div class="box">
            <h2>See Movies Come Alive!</h2>
            <!--image source from: http://www.hongkiat.com/blog/future-of-3d-movies/-->
            <img src="photos/avatar.jpg" alt="avatar 4d">
            <p>Our newly installed 3D projection facilities are out of this world. Prepare to be amazed!</p>
        </div>
    </div>

    </section>

</main>

<footer>
    <div class="content">
        <ul class="footer-text">
            <li>&copy; <?php echo date("Y"); ?> Silverado Cinema. (Harvey Connors346111, Samuel Shannon s3645918)</li>
            <li>
                <a href="mailto:contact@silveradocinema.com.au">
                    <i class="fa fa-envelope"></i> contact@silveradocinema.com.au
                </a>
            </li>
        </ul>
        <div id="socialmedias">
            <img src="photos/facebook1.png" alt="facebook logo">
            <img src="photos/youtube.png" alt="youtube logo">
            <img src="photos/twitter.png" alt="twitter logo">
        </div>
    </div>

</footer>

</body>

</html>