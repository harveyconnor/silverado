<?php

session_start();

$json = file_get_contents('ticket.json');
$json_data = json_decode($json, true);

if(isset($_POST['submit'])) {

    $movie = $_POST['movie'];
    $session = $_POST['session'];

    $_SESSION['cart'] = array(
        "movie"     => $movie,
        "session"   => $session
    );

    print_r($_SESSION['cart']);

}

//foreach ($json_data["movies"] as $movie) {
//
//    echo 'ID: ' . $movie["id"] . '<br>';
//    echo 'Title: ' . $movie["title"] . '<br>';
//    echo 'Rating: ' . $movie["rating"] . '<br>';
//
//    echo '<br>';
//
//    foreach ($movie["sessions"] as $session) {
//
//        echo $session["day"] . ', ' . $session["time"] . '<br>';
//
//    }
//
//    echo '<hr>';
//
//}
?>

<html>

<body>

<main>

    <form action="" method="POST">
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
        <select name="session" id="session">
            <option selected>Please select a session time</option>
        </select>

        <input type="submit" name="submit" value="Submit Form">

        <script type="text/javascript">

            function showSessions() {
                document.getElementById("session").innerHTML = '<option selected>Please select a session time</option>';
                var e = document.getElementById("movie");
                var value = e.options[e.selectedIndex].value;
                // Log movie ID
//                console.log(value);

                var jsonArray = <?php echo json_encode($json_data["movies"]); ?>

//                console.log(jsonArray);

                for ( var i = 0; i < jsonArray.length; i++ ) {

                    if ( value == jsonArray[i].id) {

                        for (var k = 0; k < jsonArray[i].sessions.length; k++) {
//                            console.log(jsonArray[i].sessions[k]);

                            document.getElementById("session").innerHTML += '<option>' + jsonArray[i].sessions[k].day + ', ' + jsonArray[i].sessions[k].time + '</option>';

                        }

                    }

                }

            }

        </script>

    </form>

</main>

</body>

</html>
