<?php

session_start();

$json = file_get_contents('ticket.json');
$json_data = json_decode($json, true);

if(isset($_POST['submit'])) {

    $movie = $_POST['movie'];
    $session = $_POST['session'];

    print_r($seats);

    $_SESSION['cart'] = array(
        "movie"     => $movie,
        "session"   => $session
    );

    print_r($_SESSION['cart']);

}
?>

<html>

<body>

<main>

    <form action="" method="POST" id="ticket-form" onkeyup="printSubtotal()">
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
        <br>
        <label for="session">Session</label>
        <select name="session" id="session" onchange="printSubtotal()">
            <option selected>Please select a session time</option>
        </select>

        <fieldset>
            <legend>Seats</legend>
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

        </fieldset>

        <label>Subtotal</label>
        <span id="subtotal"></span>

        <input type="submit" name="submit" value="Submit Form">

    </form>

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
                        document.getElementById(seatsArray[j].name + '-price').innerText = '$ ' + seatsArray[j].discount_price * Number(document.getElementById(ticketArray[i]).value);
                    } else {
                        subtotal += seatsArray[j].price * Number(document.getElementById(ticketArray[i]).value);
                        document.getElementById(seatsArray[j].name + '-price').innerText = '$ ' + seatsArray[j].price * Number(document.getElementById(ticketArray[i]).value);
                    }

                }

            }

        }

//        console.log(subtotal);
        document.getElementById('subtotal').innerText = '$ ' + subtotal.toFixed(2);
        return subtotal;

    }

</script>

</body>

</html>
