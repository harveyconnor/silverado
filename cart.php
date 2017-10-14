<!DOCTYPE html>
<html>
<?php include_once('partials/header.php'); ?>
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
                            <tr>
                                <td>
                                    <h3 class="mb-0 mt-0">Captain Underpants (G)</h3>
                                    <p class="mt-0">Showing at Monday, 1pm
                                        <button class="button button-danger pull-right"><i class="fa fa-times"></i>
                                            Delete from Cart
                                        </button>
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
                                        <tr class="text-center">
                                            <td>Standard (Full)</td>
                                            <td>$12.50</td>
                                            <td>1</td>
                                            <td>$12.50</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr class="text-right">
                                <td>
                                    Grand Total: $95.50
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <p>
                            Click checkout to complete your order!
                        </p>
                        <div class="form-group">
                            <button class="button button-success pull-right">
                                <i class="fa fa-arrow-right"></i> Checkout
                            </button>
                            <button class="button button-primary">
                                <i class="fa fa-list"></i> View more sessions
                            </button>
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