<?php include_once("partials/header.php"); ?>

<!DOCTYPE html>

<?php
if(empty($_POST)) {
    session_unset();
    session_destroy();
}else{
$_SESSION["custDetails"] = $_POST;
}

?>
<html>

<?php

// Write to csv.
$my_file = 'orders/orders.csv';

$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
// Excel fix
//fputs($handle, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
$data = array(
    'name'      => $_SESSION["custDetails"]["firstName"] . ' ' . $_SESSION["custDetails"]["lastName"],
    'email'     => $_SESSION["custDetails"]["custEmail"],
    'mobile'    => $_SESSION["custDetails"]["custNum"],
    'movie'     => json_encode($_SESSION['cart'])
);

fputcsv($handle, $data);
fclose($handle);

?>

<body>

<?php include_once("partials/nav.php"); ?>

<main>

    <section>
        <div class="content">
            <div class="content-main">
                <div class="card">
                    <div class="card-content">
                        <script>
                            function print_tickets() {
                                my_window = window.open('receipt_print.php', 'mywindow', 'status=1,width=900,height=600');
                                my_window.print();
                            }
                        </script>
                        <button class="button button-success pull-right" onclick="print_tickets()">
                            <i class="fa fa-arrow-right"></i> Print Tickets</button>
                        <h1>Confirmation page</h1>
                        <hr>

                            <?php

                            if(isset($_SESSION['cart'])) {
                                $receiptNumber = rand(1000,10000);
                                foreach ($_SESSION['cart'] as $movie) {
                                    $total = 0.00;
                                    $numtickets = 0.00;
                                    $receiptNumber++;
                                    ?>

                                    <h2>Receipt #<?php echo $receiptNumber ?> </h2>
                                    <table>
                                        <tr>
                                            <td><?php echo "Name: ".$_SESSION["custDetails"]["firstName"] . " " . $_SESSION["custDetails"]["lastName"]; ?></td>
                                            <td><?php echo "Silverado" ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo "Email: ".$_SESSION["custDetails"]["custEmail"]; ?></td>
                                            <td><?php echo $movie['title']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo "Mobile: ".$_SESSION["custDetails"]["custNum"]; ?></td>
                                            <td><?php echo $movie['day'] . ', ' . $movie['time']; ?></td>
                                        </tr>

                                    </table>

                                    <?php
                                    foreach ($movie['seats'] as $ticket) {
                                        if ($ticket > 0) {
                                            ?>
                                            <table>
                                                <tr class="text-center">
                                                    <td><?php echo $ticket['title']; ?></td>
                                                    <td><?php echo 'x ' . $ticket['quantity']; ?></td>
                                                    <td><?php echo '$ ' . number_format(((double)$ticket['price'] * (double)$ticket['quantity']), 2); ?></td>
                                                </tr>

                                                <?php
                                                $total+=($ticket['price'] * (double)$ticket['quantity']);
                                                        $numtickets += $ticket['quantity'];
                                                        ?>
                                            </table>
                                            <?php
                                        }
                                    }?>
                                    <table>
                                    <tr class="text-right">
                                     <td class="totalTd">
                                Total: <?php echo '$ ' . number_format($total, 2); ?>
                                    </td>
                                    </tr>
                                    </table>

                                    <?php
                                    foreach ($movie['seats'] as $ticket) {
                                        if ($ticket > 0) {
                                        ?>

                                        <table class="ticketStyle">

                                        <?php
                                        for ($i = 0; $i < $ticket['quantity']; $i++) {
                                            ?>
                                            <tr>
                                                <td>
                                                    Silverado <br>
                                                    <?php echo $movie["day"] . " " . $movie['time'] ?> <br>
                                                    <?php echo $movie['title'] ?> <br> <br> <br>
                                                    <?php echo $ticket['title'] ?>
                                                </td>
                                                <td class="ticketTd">
                                                    <img src="photos/lineofstars.png" alt="a line of stars">
                                                    <!--                                                lines of stars image sourced from: http://clipart-library.com/clipart/1054263.htm-->
                                                    <h1>ADMIT ONE</h1>
                                                    <img src="photos/lineofstars.png" alt="a line of stars">
                                                </td>
                                            </tr>

                                        <?php }
                                    }
                                    ?>


                                        </table>
                                   <?php }?>



                                    <br> <hr> <br><?php
                                    }


                                }else {
                                ?>
                                <h3>There are no items in your cart.</h3>
                                <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include_once("partials/footer.php"); ?>

</body>


</html>