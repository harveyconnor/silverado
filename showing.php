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
                        <!--image sourced from:https://www.flickeringmyth.com/2017/06/new-poster-for-christopher-nolans-dunkirk/ -->
                        <img onmouseover="imageHover('Dunkirk','dunkirk');"
                             src="photos/dunkirk.jpg">
                    </a>
                </div>
                <div class="image-group">
                    <a href="#caption">
                        <!--image sourced from: http://www.impawards.com/intl/iran/2016/forushande_ver2.html-->
                        <img onmouseover="imageHover('The Salesman','the_salesman');"
                             src="photos/salesman.jpg">
                    </a>
                </div>
                <div class="image-group">
                    <a href="#caption">
                        <!--image sourced from: http://thefanboyseo.com/2017/03/14/beauty-and-the-beast-review/ -->
                        <img onmouseover="imageHover('Beauty and The Beast','beauty_and_the_beast');"
                             src="photos/beautyandbeast.jpg">
                    </a>
                </div>
                <div class="image-group">
                    <a href="#caption">
                        <!--image sourced from: http://www.impawards.com/2017/everybody_loves_somebody.html -->
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
                        <form action="https://titan.csit.rmit.edu.au/~e54061/wp/silverado-test.php?ref=showing"
                              method="POST">
                            <fieldset>
                                <legend>Booking Form</legend>
                                <div class="form-group">
                                    <label for="movie">Movie</label>
                                    <select id="movie" name="movie">
                                        <option>Please select a movie</option>
                                        <option value="AC">Dunkirk</option>
                                        <option value="AF">The Salesman</option>
                                        <option value="CH">Beauty and The Beast</option>
                                        <option value="RH">Everybody Loves Somebody</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="session">Session</label>
                                    <select id="session" name="session" onchange="toggleSeatSelection()">
                                        <option>Please select a session time</option>
                                        <option value="MON-13">Mon/Tues - 1pm</option>
                                        <option value="MON-18">Mon/Tues - 6pm</option>
                                        <option value="MON-21">Mon/Tues - 9pm</option>
                                        <option value="WED-13">Wed/Fri - 1pm</option>
                                        <option value="WED-18">Wed/Fri - 6pm</option>
                                        <option value="WED-21">Wed/Fri - 9pm</option>
                                        <option value="SAT-12">Sat/Sun - 12pm</option>
                                        <option value="SAT-15">Sat/Sun - 3pm</option>
                                        <option value="SAT-18">Sat/Sun - 6pm</option>
                                        <option value="SAT-21">Sat/Sun - 9pm</option>
                                    </select>
                                </div>

                                <!--
                                Do an image map for assignment 3.
                                Image map of seat selection and then based on selection pre-fill allocation data.
                                -->
                                <div id="seatSelection">
                                    <fieldset>
                                        <legend>Seats</legend>
                                        <fieldset class="pricing">
                                            <legend>First Class</legend>
                                            <div class="form-group">
                                                <label for="adult">Adult ($30.00/$25.00*)</label>
                                                <input type="number" id="adult" name="seats[FA]">
                                            </div>
                                            <div class="form-group">
                                                <label for="child">Child ($25.00/$20.00*)</label>
                                                <input type="number" id="child" name="seats[FC]">
                                            </div>
                                        </fieldset>
                                        <fieldset class="pricing">
                                            <legend>Standard</legend>
                                            <div class="form-group">
                                                <label for="adult">Full ($18.50/$12.50*)</label>
                                                <input type="number" id="full" name="seats[SA]">
                                            </div>
                                            <div class="form-group">
                                                <label for="concession">Concession ($15.50/$10.50*)</label>
                                                <input type="number" id="concession" name="seats[SP]">
                                            </div>
                                            <div class="form-group">
                                                <label for="child">Child ($12.50/$8.50*)</label>
                                                <input type="number" id="child" name="seats[SC]">
                                            </div>
                                        </fieldset>
                                        <fieldset class="pricing">
                                            <legend>Bean bag</legend>
                                            <div class="form-group">
                                                <label for="adult">Adult ($33.00/$22.00*)</label>
                                                <input type="number" id="adult" name="seats[BA]">
                                            </div>
                                            <div class="form-group">
                                                <label for="family">Family ($30.00/$20.00*)</label>
                                                <input type="number" id="family" name="seats[BF]">
                                            </div>
                                            <div class="form-group">
                                                <label for="child">Child ($30.00/$20.00*)</label>
                                                <input type="number" id="child" name="seats[BC]">
                                            </div>
                                        </fieldset>

                                    </fieldset>
                                    <div class="form-group">
                                        <p>
                                            * = Pricing has discounted rates on certain days. (Discounted price is displayed on
                                            the right). Applies to Monday-Tuesday All day & Monday-Friday on 1pm sessions ONLY.
                                        </p>
                                    </div>
                            </fieldset>

                    </div>
                    <div class="form-group">
                        <button class="button button-primary button-large button-block" id="booking-button">Make
                            booking!
                        </button>
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