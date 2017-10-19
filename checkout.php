<?php include_once("partials/header.php"); ?>
<!DOCTTPE html>

<html>


<body>

<?php include_once("partials/nav.php"); ?>

<main>
    <section>
        <div class="content">
            <div class="content-main">
                <div class="card">
                    <div class="card-content">
                        <h1>Enter customer details to checkout!</h1>
                        <fieldset class="pricing">
                            <form action="receipt.php" method="post" id="custForm" onsubmit="return custCheck()">

                                <div class="form-group">
                                    <label for="firstName">First name:</label>
                                    <input class="form-control" id="firstName" required type="text" name="firstName" autofocus/>
                                    <span class="alerts" id="firstSpan"></span>
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="lastName">Last name:</label>
                                    <input class="form-control" id="lastName" required type="text" name="lastName"/>
                                    <span class="alerts" id="lastSpan"></span>
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="custEmail">Email address:</label>
                                    <input class="form-control" id="custEmail" required type="email" name="custEmail"/>
                                    <span class="alerts" id="emailSpan"></span>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="custNum">Aus mobile number:</label>
                                    <input class="form-control" id="custNum" required type="text" name="custNum"/>
                                    <span class="alerts" id="numSpan"></span>
                                </div>

                                <br>

                                <div>
                                    <button class="button button-primary button-large button-block"
                                            id="checkout-button">Complete checkout
                                    </button>
                                </div>

                            </form>

                        </fieldset>

                    </div>

                </div>
            </div>
        </div>
    </section>


</main>

<script type="text/javascript">

    function custCheck() {

        var name = checkName();
        var email = checkEmail();
        var number = checkPhone();
        if (name && number && email) {
            return true;
        } else {
            return false;
        }
    }

    function checkName() {

        var first = false;
        var second = false;
        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var regex = /^[a-z]{2,}$/i;

        if (regex.test(firstName)) {
            first = true;
            document.getElementById("firstSpan").innerHTML = "";
        } else {
            document.getElementById("firstSpan").innerHTML = "This name is invalid";
            first = false;
        }

        if (regex.test(lastName)) {
            second = true;
            document.getElementById("lastSpan").innerHTML = "";
        } else {
            document.getElementById("lastSpan").innerHTML = "This name is invalid";
            second = false;
        }

        if (first && second) {
            return true;
        } else {
            return false;
        }

    }

    function checkPhone() {

        var num = document.getElementById("custNum").value;
        var regex = /^(\(04\)|04|\+614)([ ]?-?\d){8}$/;

        if (regex.test(num)) {
            document.getElementById("numSpan").innerHTML = "";
            return true;
        } else {
            document.getElementById("numSpan").innerHTML = "This number is invalid";
            return false;
        }

    }

    function checkEmail() {

        var email = document.getElementById("custEmail").value;
        var regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

        if (regex.test(email)) {
            document.getElementById("emailSpan").innerHTML = "";
            return true;
        } else {
            document.getElementById("emailSpan").innerHTML = "Invalid Email";
            return false;
        }


    }


</script>

<?php include_once('partials/footer.php'); ?>

</body>


</html>