<?php include_once("partials/header.php"); ?>

<!DOCTYPE html>

<?php $_SESSION["custDetails"] = $_POST; ?>

<html>



<body>

<?php include_once("partials/nav.php"); ?>

<main>

    <section>
        <div class="content">
            <div class="content-main">
                <div class="card">
                    <div class="card-content">
                        <h1>Confirmation page</h1>

                        <hr>
                        <table>
                            <tbody>
                            <?php
                            if(isset($_SESSION['cart'])) {
                                // Display each movie
                                foreach ($_SESSION['cart'] as $movie) {
//                                    print_r($movie);
                                    ?>
                                    <tr>
                                        <?php echo $_SESSION["custDetails"]["firstName"]; ?>

                                        <?php echo $_SESSION["custDetails"]["lastName"]; ?>
                                        <?php echo $_SESSION["custDetails"]["custEmail"]; ?>
                                        <?php echo $_SESSION["custDetails"]["custNum"]; ?>

                                        <h3 class="mb-0 mt-0"><?php echo $movie['title']; ?> <small>(<?php echo $movie['rating']; ?>)</small></h3>
                                        <p class="mt-0"><?php echo $movie['day'] . ', ' . $movie['time']; ?>
                                        </p>
                                        <table>
                                            <thead>
                                            <tr class="text-center">
                                                <th>Ticket Type</th>
                                                <th>Cost</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <!-- Loop through each movie form submission in the session. -->
                                            <?php

                                            foreach ($movie['seats'] as $ticket) {
                                                if ($ticket > 0) {
                                                    ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $ticket['title']; ?></td>
                                                        <td><?php echo '$ ' . number_format((double)$ticket['price'], 2); ?></td>

                                                        <!--                                                           need to change this-->
                                                        <td><?php echo 'x ' . $ticket['quantity']; ?></td>
                                                        <td><?php echo '$ ' . number_format(((double)$ticket['price'] * (double)$ticket['quantity']), 2); ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                // End ticket loop
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        </td>
                                    </tr>
                                    <?php
                                    // End foreach loop
                                }
                                // End IF










                            } else {
                                ?>
                                <h3>There are no items in your cart.</h3>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>

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