<!DOCTYPE html>
<html>
<?php include_once ('partials/header.php'); ?>
<body>
<?php include_once ('partials/nav.php'); ?>

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
                            If you wish to change the quantity of tickets, enter the numeric value in the quantity field and then click update,
                            or click remove if you wish to delete your booking.
                        </p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Movie</th>
                                    <th>Session</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- Loop through each movie form submission in the session. -->
                                <tr>
                                    <td>Dunkirk</td>
                                    <td>7pm</td>
                                    <td>
                                        <div class="form-group"><input type="number" value="1"></div>
                                    </td>
                                    <td>$50</td>
                                    <td>
                                        <button class="button button-primary"><i class="fa fa-pencil"></i> Update</button>
                                        <button class="button button-danger"><i class="fa fa-times"></i> Remove</button>
                                    </td>
                                </tr>
                            </tbody>
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