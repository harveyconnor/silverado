<?php

if(isset($_POST['clear'])) {

    session_start();
    session_unset();
    session_destroy();

}

?>
<!DOCTYPE html>
<html>
<?php include_once('partials/header.php'); ?>

<?php

if(isset($_POST['deletefromcart'])) {

    array_splice($_SESSION['cart'], $_POST['id'], 1);
    $_SESSION['total'] -= $_POST['price'];
    if (count($_SESSION['cart']) < 1) {
        session_unset();
        session_destroy();
    }
    header('Location: cart.php');
}

?>

<!DOCTYPE html>

<?php

$json = file_get_contents('ticket.json');
$json_data = json_decode($json, true);

// Get session ['cart'] data (form post data). Add movie information to arrays.

if(isset($_SESSION['cart'])) {
    $i = 0;
    foreach ($_SESSION['cart'] as $movie) {

        foreach ($json_data['movies'] as $json_movie) {

            if($json_movie['id'] == $movie['movie']) {
                $_SESSION['cart'][$i]['title'] = $json_movie['title'];
                $_SESSION['cart'][$i]['rating'] = $json_movie['rating'];
            }

        }

        foreach ($json_data['sessions'] as $json_session) {

            if($json_session['id'] == $movie['session']) {
                $_SESSION['cart'][$i]['time'] = $json_session['time'];
                $_SESSION['cart'][$i]['day'] = $json_session['day'];
                $_SESSION['cart'][$i]['discounted'] = $json_session['discounted'];
            }

        }

        // Foreach movie/seats in the cart.

        foreach ($movie['seats'] as $ticket_name => $no_tickets) {

            $quantity = $no_tickets;

            if(is_int($no_tickets) && $no_tickets > 0) {
                // foreach seat in the seats json.
                foreach ($json_data['seats'] as $json_ticket) {

                    if ($json_ticket['name'] == $ticket_name ) {

                        $_SESSION['cart'][$i]['seats'][$ticket_name] = array(

                            "name" => $ticket_name,
                            "title" => $json_ticket['title'],
                            "quantity" => $quantity

                        );

                        if ($_SESSION['cart'][$i]['discounted'] == 1) {

                            $_SESSION['cart'][$i]['seats'][$ticket_name]['price'] = $json_ticket['discount_price'];

                        } else {
                            $_SESSION['cart'][$i]['seats'][$ticket_name]['price'] = $json_ticket['price'];
                        }

                        if(isset($_SESSION['total'])) {
                            $_SESSION['total'] += (double)$_SESSION['cart'][$i]['seats'][$ticket_name]['price'] * (double)$_SESSION['cart'][$i]['seats'][$ticket_name]['quantity'];
                        } else {
                            $_SESSION['total'] = (double)$_SESSION['cart'][$i]['seats'][$ticket_name]['price'] * (double)$_SESSION['cart'][$i]['seats'][$ticket_name]['quantity'];
                        }
                    }

                }
            }

        }

        $i++;
    }

//    print_r($_SESSION['cart']);

}

?>
<body>
<?php include_once('partials/nav.php'); ?>

<main>


    <section>
        <div class="content">
            <div class="content-main">
                <div class="card">
                    <div class="card-content">
                        <h2>Shopping Cart</h2>
                        <hr>
                        <p>
                            Below is a list of all current session bookings in your cart.
                        </p>
                        <p>
                            If you wish to change the quantity of tickets, enter the numeric value in the quantity field
                            and then click update,
                            or click remove if you wish to delete your booking.
                        </p>

                        <table>
                            <tbody>
                            <?php
                            if(isset($_SESSION['cart'])) {
                                // Display each movie
                                $i = 0;
                                foreach ($_SESSION['cart'] as $movie) {
//                                    print_r($movie);
                                ?>
                            <tr>
                                <td>
                                    <form action="" method="post">
                                        <input hidden name="id" value="<?php echo $i; ?>">
                                        <input hidden name="price" value="<?php echo $subtotal; ?>">
                                        <button type="submit" name="deletefromcart" class="button button-danger pull-right"><i class="fa fa-times"></i>
                                            Delete from Cart
                                        </button>
                                    </form>
                                    <h3 class="mb-0 mt-0"><?php echo $movie['title']; ?> <small>(<?php echo $movie['rating']; ?>)</small></h3>
                                    <p class="mt-0"><?php echo $movie['day'] . ', ' . $movie['time']; ?>
                                    <?php $subtotal = 0;
                                        foreach ($movie['seats'] as $ticket) {
                                            if ($ticket > 0) {
                                                $subtotal += (double)$ticket['price'] * (double)$ticket['quantity'];
                                            }
                                        }
                                        ?>
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

                                        $subtotal = 0;
                                        foreach ($movie['seats'] as $ticket) {
                                            if ($ticket > 0) {
                                                ?>
                                                <tr class="text-center">
                                                    <td><?php echo $ticket['title']; ?></td>
                                                    <td><?php echo '$ ' . number_format((double)$ticket['price'], 2); ?></td>
                                                    <td><?php echo 'x ' . $ticket['quantity']; ?></td>
                                                    <td><?php echo '$ ' . number_format(((double)$ticket['price'] * (double)$ticket['quantity']), 2); ?></td>
                                                </tr>
                                                <?php
                                                $subtotal += (double)$ticket['price'] * (double)$ticket['quantity'];
                                            }
                                          // End ticket loop
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-right">
                                                <td></td><td></td><td></td>
                                                <td>
                                                    Sub-Total: <?php echo '$ ' . number_format($subtotal, 2); ?>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </td>
                            </tr>
                            <?php
                                    // End foreach loop
                                    $i++;
                                }
                                // End IF
                            }
                            else {
                                ?>
                                <h3>There are no items in your cart.</h3>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <?php if(isset($_SESSION['total']) && $_SESSION['total'] > 0) { ?>
                            <tr class="text-right">
                                <td>
                                    Grand Total: <?php echo '$ ' . number_format($_SESSION['total'], 2); ?>
                                </td>
                            </tr>
                            <?php } ?>
                            </tfoot>
                        </table>
                        <p>
                            Click checkout to complete your order!
                        </p>
                        <div class="form-group">
                            <form action="checkout.php">
                            <button type="submit" class="button button-success pull-right">
                                <i class="fa fa-arrow-right"></i> Checkout
                            </button>
                            </form>
                        </div>
                        <div class="form-group">
                            <a href="showing.php">
                                <button type="submit" class="button button-primary pull-right mr-1">
                                    Add more tickets
                                </button>
                            </a>
                        </div>
                        <div class="form-group">
                            <a href="sessionclear.php">
                                <button class="button button-danger" name="clear" type="submit" value="submit">
                                    <i class="fa fa-times"></i> Clear Cart
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include_once('partials/footer.php'); ?>

</body>

</html>