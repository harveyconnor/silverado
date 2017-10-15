<?php include_once("partials/header.php"); ?>
<!DOCTTPE html>

<html>


<body>

<?php include_once("partials/nav.php"); ?>

<main>

<h1>Enter customer details</h1>

    <div class="card">
    <div class="card-content">
        <fieldset class="pricing">
    <form action="receipt.php" method="post" id="custForm" onsubmit="return custCheck()">

        <div>
        <label for="custName">Full name:</label>
        <input id="custName" required type="text" name="custName"/>
            <span class="alerts" id="nameSpan"></span>
        </div>

        <br>

        <div>
        <label for="custEmail">Email address:</label>
        <input id="custEmail" required type="email" name="custEmail"/>
            <span class="alerts" id="emailSpan"></span>
        </div>
        <br>

        <div>
        <label for="custNum">Aus mobile number:</label>
        <input id="custNum" required type="text"  name="custNum"/>
            <span class="alerts" id="nameSpan"></span>
        </div>

        <br>

        <div>
        <button class="button button-primary button-large button-block" name="submit" id="checkout-button">Complete checkout</button>
        </div>

    </form>

        </fieldset>

    </div>

    </div>



</main>

<script type="text/javascript">

    function custCheck(){

        var name = checkName();
//        var email = checkEmail();
        var number = checkPhone();
        if(name && number){
            return true;
        }else{
            return false;
        }
    }

    function checkName(){

       var name = document.getElementById("custName").value;
       var replacement = name.replace(/[^A-Za-z]/g, "");

       if(replacement == name){
           return true;
       }else{
           document.getElementById("nameSpan").innerHTML = "This name is invalid, try " + replacement;
           return false;
       }

    }

 function checkPhone(){

     var num = document.getElementById("custNum").value;
     //this does not work for some reason
     var replacement = num.replace(/^(\(04\)|04|\+614)([ ]?\d){8}$/g, "");

     if(replacement == num){
         return true;
     }else{
         document.getElementById("numSpan").innerHTML = "This number is invalid, try " + replacement;
         return false;
     }


 }


</script>

<?php include_once('partials/footer.php'); ?>

</body>


<?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>

</html>