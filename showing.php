<?php include_once ('partials/header.php'); ?>

<!DOCTYPE html>

<html>

<?php
$json = file_get_contents('ticket.json');
$json_data = json_decode($json, true);

if(isset($_POST['submit'])) {

    $movie = $_POST['movie'];
    $session = $_POST['session'];

    $seats = $_POST['seats'];

    $newSeats = [];
    foreach ($seats as $ticket => $quantity) {


        $newSeats[$ticket] = (int)$quantity;

    }

    $_SESSION['cart'][] = array(
        "movie"     => $movie,
        "session"   => $session,
        "seats"     => $newSeats
    );

//    print_r($_SESSION['cart']);

    header('Location: cart.php');

}
?>



<body>
<?php include_once ('partials/nav.php'); ?>

<main>
    <section id="movies">
        <div class="feature">
            <div class="card-image">
                <div class="image-group">
                    <a href="#caption">
                        <!--image sourced from:https://www.flickeringmyth.com/2017/06/new-poster-for-christopher-nolans-dunkirk/ -->
                        <img onmouseover="imageHover('Dunkirk','dunkirk')"
                             src="photos/dunkirk.jpg">
                    </a>
                </div>
                <div class="image-group">
                    <a href="#caption">
                        <!--image sourced from: http://www.impawards.com/intl/iran/2016/forushande_ver2.html-->
                        <img onmouseover="imageHover('The Salesman','the_salesman')"
                             src="photos/salesman.jpg">
                    </a>
                </div>
                <div class="image-group">
                    <a href="#caption">
                        <!--image sourced from: http://thefanboyseo.com/2017/03/14/beauty-and-the-beast-review/ -->
                        <img onmouseover="imageHover('Beauty and The Beast','beauty_and_the_beast')"
                             src="photos/beautyandbeast.jpg">
                    </a>
                </div>
                <div class="image-group">
                    <a href="#caption">
                        <!--image sourced from: http://www.impawards.com/2017/everybody_loves_somebody.html -->
                        <img onmouseover="imageHover('Everybody Loves Somebody','everybody_loves_somebody')"
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
                        <hr>
                        <p id="caption-rating"></p>
                        <p id="caption-desc"></p>
                        <ul id="caption-sessions">
                        </ul>
                    </div>
                </div>


                <div class="card">
                    <div class="card-content">
                        <h2>Book A Movie Session</h2>
                        <form action="" method="POST" id="ticket-form" oninput="printSubtotal()" onsubmit="return formCheck()">
                            <div class="form-group">
                                <label for="movie">Movie</label>
                                <select name="movie" id="movie" onchange="showSessions()">
                                    <option selected>Please select a movie</option>
                                    <?php
                                    foreach ($json_data["movies"] as $movie) {
                                        ?>
                                        <option value="<?php echo $movie['id']; ?>"><?php echo $movie['title']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <span class="alerts" id="movieSpan"></span>
                            </div>

                            <div class="form-group">
                                <label for="session">Session</label>
                                <select name="session" id="session" onchange="printSubtotal()">
                                    <option selected>Please select a session time</option>
                                </select>
                                <span class="alerts" id="sessionSpan"></span>
                            </div>
                            <fieldset>
                                <legend>Seats</legend>
                                <span class="alerts" id="seatSpan"></span>

                                <fieldset class="pricing">
                                    <legend>First Class</legend>
                                    <div class="form-group">
                                        <label for="adult">Adult ($30.00/$25.00*)</label>
                                        <input type="number" id="FA" name="seats[FA]">
                                        <span id="FA-price"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="child">Child ($25.00/$20.00*)</label>
                                        <input type="number" id="FC" name="seats[FC]">
                                        <span id="FC-price"></span>
                                    </div>
                                </fieldset>
                                <fieldset class="pricing">
                                    <legend>Standard</legend>
                                    <div class="form-group">
                                        <label for="adult">Full ($18.50/$12.50*)</label>
                                        <input type="number" id="SA" name="seats[SA]">
                                        <span id="SA-price"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="concession">Concession ($15.50/$10.50*)</label>
                                        <input type="number" id="SP" name="seats[SP]">
                                        <span id="SP-price"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="child">Child ($12.50/$8.50*)</label>
                                        <input type="number" id="SC" name="seats[SC]">
                                        <span id="SC-price"></span>
                                    </div>
                                </fieldset>
                                <fieldset class="pricing">
                                    <legend>Bean bag</legend>
                                    <div class="form-group">
                                        <label for="adult">Adult ($33.00/$22.00*)</label>
                                        <input type="number" id="BA" name="seats[BA]">
                                        <span id="BA-price"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="family">Family ($30.00/$20.00*)</label>
                                        <input type="number" id="BF" name="seats[BF]">
                                        <span id="BF-price"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="child">Child ($30.00/$20.00*)</label>
                                        <input type="number" id="BC" name="seats[BC]">
                                        <span id="BC-price"></span>
                                    </div>
                                </fieldset>
*Discounted prices apply to all sessions Monday and Tuesday, and 1pm sessions only Monday to Friday.
                            </fieldset>

                            <div class="form-group" id="subtotalLoc">
                                <label>Subtotal</label>
                                <span id="subtotal"></span>
                                <button class="button button-primary button-large button-block" name="submit" id="booking-button">Make booking!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<script type="text/javascript">

    function showSessions() {
        document.getElementById("session").innerHTML = '<option selected>Please select a session time</option>';
        var e = document.getElementById("movie");
        var value = e.options[e.selectedIndex].value;
        var moviesArray = <?php echo json_encode($json_data["movies"]); ?>

        var sessionsArray = <?php echo json_encode($json_data["sessions"]); ?>

//        console.log(JSON.stringify(sessionsArray));

        for ( var i = 0; i < moviesArray.length; i++ ) {
            if ( value == moviesArray[i].id) {

                for ( var j = 0; j < moviesArray[i].sessions.length; j++) {

                    for ( var k = 0; k < sessionsArray.length; k++) {
                        if (moviesArray[i].sessions[j] == sessionsArray[k].id) {
                            document.getElementById("session").innerHTML += '<option value="'+ sessionsArray[k].id +'">' + sessionsArray[k].day + ', ' + sessionsArray[k].time + '</option>';

                        }
                    }

                }

            }
        }
    }

    // Do this one in php
    function getDiscountedTimes() {

        var discounted = [];
        var sessionsArray = <?php echo json_encode($json_data["sessions"]); ?>

        for( var i = 0; i < sessionsArray.length; i++ ) {

            if (sessionsArray[i].discounted) {
                discounted.push(sessionsArray[i].id);
            }

        }
        return discounted;

    }

    function getPrice() {

        var e = document.getElementById("session");
        var value = e.options[e.selectedIndex].value;

        var discounted = getDiscountedTimes();

        for ( var i = 0; i < discounted.length; i++) {
            if(value == discounted[i]) {
                return true;
            }
        }
        return false;
    }

    function printSubtotal() {
        var subtotal = 0.00;
        var ticketArray = ['FA','FC','SA','SP','SC','BA','BF','BC'];
        var seatsArray = <?php echo json_encode($json_data["seats"]); ?>

        for (var i = 0; i < ticketArray.length; i++) {

            for(var j = 0; j < seatsArray.length; j++) {

                if (seatsArray[j].name == ticketArray[i]) {

                    if(getPrice()) {
                        subtotal += seatsArray[j].discount_price * Number(document.getElementById(ticketArray[i]).value);
                        document.getElementById(seatsArray[j].name + '-price').innerText = '$ ' + (seatsArray[j].discount_price * Number(document.getElementById(ticketArray[i]).value)).toFixed(2);
                    } else {
                        subtotal += seatsArray[j].price * Number(document.getElementById(ticketArray[i]).value);
                        document.getElementById(seatsArray[j].name + '-price').innerText = '$ ' + (seatsArray[j].price * Number(document.getElementById(ticketArray[i]).value)).toFixed(2);
                    }

                }

            }

        }

//        console.log(subtotal);
        document.getElementById('subtotal').innerText = '$ ' + subtotal.toFixed(2);
        return subtotal;

    }

    function formCheck(){

        var movie = checkMovie();
        var seats = checkSeats();
        var session = checkSession();

        if(seats && movie && session){
            return true
        }else{
            return false;
        }
    }

    function checkMovie(){

            var movieArray = [1,2,3,4];
            var movieSelected = false;

        for(var i = 0; i < movieArray.length; i++) {

            if (document.getElementById("movie").value == movieArray[i]) {
                movieSelected = true;
            }
        }
    if(movieSelected === true){
        document.getElementById("movieSpan").innerHTML = "";
        return true;
    }else{
        document.getElementById("movieSpan").innerHTML = "You must select a movie";
        return false;
    }

    }

    function checkSession(){

        var sessionsArray = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];
        var sessionSelected = false;

        for(var i = 0; i < sessionsArray.length; i++) {

            if (document.getElementById("session").value == sessionsArray[i]) {
                sessionSelected = true;
            }
        }
        if(sessionSelected === true){
            document.getElementById("sessionSpan").innerHTML = "";
            return true;
        }else{
            document.getElementById("sessionSpan").innerHTML = "You must select a session";
            return false;
        }
    }


    function checkSeats(){
        var isNum = true;
        var numValid = false;
        var ticketArray = ['FA','FC','SA','SP','SC','BA','BF','BC'];

        for (var i = 0; i < ticketArray.length; i++){

//            console.log(document.getElementById(ticketArray[i]).value);

            //checks if at least one item in the list is set between 0 - 20
            if(!isNaN(document.getElementById(ticketArray[i]).value) && (document.getElementById(ticketArray[i]).value) > 0 && (document.getElementById(ticketArray[i]).value) <= 20){
                numValid = true;
            }

            if(isNaN(document.getElementById(ticketArray[i]).value) || (document.getElementById(ticketArray[i]).value) < 0 || (document.getElementById(ticketArray[i]).value) > 20){
                isNum = false;
            }

        }

        if(numValid === false || isNum === false){
            document.getElementById("seatSpan").innerHTML = "You must enter a value between 0 - 20 on at least one seat type<br>";
            return false;
        }

        if(numValid === true && isNum === true){
            document.getElementById("seatSpan").innerHTML = "";
            return true
        }

    }

</script>

<?php include_once('partials/footer.php'); ?>

<script src="js/showing.js" type="text/javascript"></script>
</body>


</html>