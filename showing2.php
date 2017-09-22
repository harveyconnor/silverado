<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Silverado Cinema - Now Showing</title>
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

        <h1 class="title"><br> <em>The best it gets</em></h1>

        <div id="header-stars">
            <img src="photos/silverado_stars.png" alt="Silverado stars">
        </div>
    </div>

</header>

<nav>
    <div class="content">
        <a href="index.php">Home</a>
        <a class="active" href="showing.php">Now Showing</a>
    </div>
</nav>

<main>

    <section id="movies">
        <div class="feature">
            <div class="card-image">
                <div class="image-group">
                    <a href="#caption">
                        <img onmouseover="imageHover('Dunkirk','dunkirk');"
                             src="photos/dunkirk.jpg">
                    </a>
                </div>
                <div class="image-group">
                    <a href="#caption">
                        <img onmouseover="imageHover('The Salesman','the_salesman');"
                             src="photos/salesman.jpg">
                    </a>
                </div>
                <div class="image-group">
                    <a href="#caption">
                        <img onmouseover="imageHover('Beauty and The Beast','beauty_and_the_beast');"
                             src="photos/beautyandbeast.jpg">
                    </a>
                </div>
                <div class="image-group">
                    <a href="#caption">
                        <img onmouseover="imageHover('Everybody Loves Somebody','everybody_loves_somebody');"
                             src="photos/everybody.jpg">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="formCard">
        <div class="content">
            <div class="content-main">
                <div class="card" style="display: none;" id="caption">
                    <div class="card-content">
                        <h2 id="caption-title"></h2>
                        <p id="caption-rating"></p>
                        <p id="caption-desc"></p>
                        <ul id="caption-sessions">
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <h2>Book A Movie Session</h2>
                        <form action="https://titan.csit.rmit.edu.au/~e54061/wp/silverado-test.php?ref=showing" method="POST">
                            <fieldset>
                                <legend>Booking Form</legend>
                                <div class="form-group">
                                    <label for="movie">Movie</label>
                                    <select id="movie">
                                        <option>Please select a movie</option>
                                        <option>Dunkirk</option>
                                        <option>The Salesman</option>
                                        <option>Beauty and The Beast</option>
                                        <option>Everybody Loves Somebody</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="session">Session</label>
                                    <select id="session">
                                        <option>Please select a session time</option>
                                        <option>Mon/Tues - 1pm</option>
                                        <option>Mon/Tues - 6pm</option>
                                        <option>Mon/Tues - 9pm</option>
                                        <option>Wed/Fri - 1pm</option>
                                        <option>Wed/Fri - 6pm</option>
                                        <option>Wed/Fri - 9pm</option>
                                        <option>Sat/Sun - 12pm</option>
                                        <option>Sat/Sun - 3pm</option>
                                        <option>Sat/Sun - 6pm</option>
                                        <option>Sat/Sun - 9pm</option>
                                    </select>
                                </div>

                                <!--
                                Do an image map for assignment 3.
                                Image map of seat selection and then based on selection pre-fill allocation data.
                                -->

                                <fieldset>
                                    <legend>Seats</legend>
                                    <fieldset>
                                        <legend>Standard</legend>
                                        <div class="form-group">
                                            <label for="adult">Full ($12.50 Mon-Tue & Mon-Fri 1pm only / $18.50 Wed/Fri After 1pm & Sat-Sun)</label>
                                            <input type="number" id="full">
                                        </div>
                                        <div class="form-group">
                                            <label for="concession">Concession ($10.50 Mon-Tue & Mon-Fri 1pm only / $15.50 Wed/Fri After 1pm & Sat-Sun)</label>
                                            <input type="number" id="concession">
                                        </div>
                                        <div class="form-group">
                                            <label for="child">Child ($8.50 Mon-Tue & Mon-Fri 1pm only / $12.50 Wed/Fri After 1pm & Sat-Sun)</label>
                                            <input type="number" id="child">
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>First Class</legend>
                                        <div class="form-group">
                                            <label for="adult">Adult ($25 Mon-Tue & Mon-Fri 1pm only / $30 Wed/Fri After 1pm & Sat-Sun)</label>
                                            <input type="number" id="adult">
                                        </div>
                                        <div class="form-group">
                                            <label for="child">Child ($20 Mon-Tue & Mon-Fri 1pm only / $25 Wed/Fri After 1pm & Sat-Sun)</label>
                                            <input type="number" id="child">
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Bean bag</legend>
                                        <div class="form-group">
                                            <label for="adult">Adult ($22 Mon-Tue & Mon-Fri 1pm only / $33 Wed/Fri After 1pm & Sat-Sun)</label>
                                            <input type="number" id="adult">
                                        </div>
                                        <div class="form-group">
                                            <label for="family">Family ($20 Mon-Tue & Mon-Fri 1pm only / $30 Wed/Fri After 1pm & Sat-Sun)</label>
                                            <input type="number" id="family">
                                        </div>
                                        <div class="form-group">
                                            <label for="child">Child ($20 Mon-Tue & Mon-Fri 1pm only / $30 Wed/Fri After 1pm & Sat-Sun)</label>
                                            <input type="number" id="child">
                                        </div>
                                    </fieldset>
                                </fieldset>

                            </fieldset>

                            <div class="form-group">
                                <button class="button button-primary button-large">Make booking!</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
    </section>

</main>

<footer>
    <div class="content">
        <ul class="footer-text">
            <li>&copy; <?php echo date("Y"); ?> Silverado Cinema. (Harvey Connor s346111, Samuel Shannon s3645918)</li>
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
<script src="js/showing.js" type="text/javascript"></script>
</body>

</html>