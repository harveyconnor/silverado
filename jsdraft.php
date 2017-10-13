<!DOCTYPE html>




<html>

<head>

<title>js Draft page</title>

<nav>
  <a href="https://www.google.com">google mate</a>
</nav>


<script>

var cart = [];

//movies
var CH  = ["Monday 1PM", "Tuesday 1PM", "Wednesday 6PM", "Thursday 6PM", "Friday 6PM", "Satuday 12PM", "Sunday 12PM"];
var AF = ["Monday 6PM", "Tuesday 6PM", "Satuday 3PM", "Sunday 3PM"];
var RC = ["Monday 9PM", "Tuesday 9PM", "Wednesday 1PM", "Thursday 1PM", "Friday 1PM", "Satuday 6PM", "Sunday 6PM"];
var AC = ["Wednesday 9PM", "Thursday 9PM", "Friday 9PM", "Satuday 9PM", "Sunday 9PM"];

//Seats

const SF = {
  price: 18.50,
  discount:12.50
};

const SP = {
  price: 15.50,
  discount: 10.50
}

const SC = {
  price: 12.50,
  discount: 8.50
}

const FA = {
  price: 30.00,
  discount: 20.00
}

const FC = {
  price: 25.00,
  discount: 20.00
}

const BA = {
  price: 33.00,
  discount: 22.00
}

const BF = {
  price: 30.00,
  discount: 20.00
}

const BC = {
  price: 30.00,
  discount: 20.00
}

function populateSessions(){

var movie = document.getElementById("movies");
var sessions = document.getElementById("sessionSelect");
var length = sessions.options.length;

for (i = 0; i < length; i++) {
  sessions.remove(i);
  console.log("length is " + length);
  console.log(i);
}

if (movie.value === "CH"){
  for (var i = 0; i < CH.length; i++) {
   var el = document.createElement("option");
   el.textContent = CH[i];
   sessions.appendChild(el);
  }
}

if (movie.value === "AF"){
  for (var i = 0; i < AF.length; i++) {
   var el = document.createElement("option");
   el.textContent = AF[i];
   sessions.appendChild(el);
  }
}

if (movie.value === "RC"){
  for (var i = 0; i < RC.length; i++) {
   var el = document.createElement("option");
   el.textContent = RC[i];
   sessions.appendChild(el);
  }
}

if (movie.value === "AC"){
  for (var i = 0; i < AC.length; i++) {
   var el = document.createElement("option");
   el.textContent = AC[i];
   sessions.appendChild(el);
  }
}

};

function calculatePrice() {

    var seats = document.getElementsByClassName("seat");
    var total = document.getElementById("total");
    var totalCost = 0;

    for (i = 0; i < seats.length; i++) {
        if(seats[i].value > 0)
            totalCost++
    }
    console.log(totalCost + seats[i];
}


</script>

</head>

<body>
<h1> Movie time </h1>

<form id="movieForm" method="post">

<tr>
    <td>
        <select id="movies" name="movieSelect" onchange="populateSessions()">
        <option value="" selected>Select a movie</option>
        <optgroup label="Action"> <option value="AC">Dunkirk</option></optgroup>
        <optgroup label="Art/Foreign"><option value="AF">The Salesman</option></optgroup>
        <optgroup label="Childrens"><option value="CH">Beauty and the Beast</option></optgroup>
        <optgroup label="Romantic Comedy"><option value="RC">Everybody Loves Somebody</option></optgroup>
        </select>
    </td>
    <td>
        <select name="session" id="sessionSelect">
        <option>Select a movie to see sessions</option>
        </select>
    </td>
</tr>

<h2> select seat <h2>
<tr>

<td>

<h3> First Class </h3>

<label for="FA">Adult ($30.00/$25.00*)</label>
<select id = "FA" class="seat" name = "FA" onchange="calculatePrice()">
<option value=" " selected>add seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
</select>

<label for="FC">Child ($25.00/$20.00*)</label>
<select id = "FC" class="seat" name = "FC" onchange="calculatePrice()">
<option value=" " selected>add seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
</select>

</td>

<td>

<h3> Standard </h3>

<label for="SF">Adult ($18.50/$12.50*)</label>
<select id = "SF" class="seat" name = "SF" onchange="calculatePrice()">
<option value=" " selected>add seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
</select>

<label for="SP">Concession ($15.50/$10.50*)</label>
<select id = "SP" class="seat" name = "SP" onchange="calculatePrice()">
<option value=" " selected>add seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
</select>

<label for="SC">Child ($12.50/$8.50*)</label>
<select id = "SC" class="seat" name = "SC" onchange="calculatePrice()">
<option value=" " selected>add seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
</select>

</td>

<td>

<h3>Bean Bag</h3>

<label for="BA">Adult ($33.00/$22.00*)</label>
<select id = "BA" class="seat" name = "BA" onchange="calculatePrice()">
<option value=" " selected>add seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
</select>

<label for="BF">Family ($30.00/$20.00*)</label>
<select id = "BF" class="seat" name = "BF" onchange="calculatePrice()">
<option value=" " selected>add seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
</select>

<label for="BC">Child ($30.00/$20.00*)</label>
<select id = "BC" class="seat" name = "BC" onchange="calculatePrice()">
<option value=" " selected>add seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
</select>

</td>

<td>
<br>
<span id="total">Total: </span>

</td>

</tr>
</form>



</body>


<footer>
  <br>
&copy Sam Freshly <?php echo date("Y"); ?>

</footer>


</html>
























 ?>
