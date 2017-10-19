<?php
session_start();
?>
<html>
<head>
    <title>Print Tickets</title>
    <style type="text/css" media="print">
        /*@page { size: portrait; }*/
    </style>
    <style type="text/css">

        thead {
            border-bottom: 2px solid #000033;
            background: #2F2F4F;
            color: #fff;
        }
        table, th, td {
            border: 1px solid #000033;
            padding: 15px;
        }

        tfoot {
            background-color: rgb(222, 222, 222);
            font-weight: bold;
            font-style: italic;
        }
        #subtotalLoc{

            /*border: 2px;*/
            /*border-color: #8c8b8b;*/
            font-weight: bold;
            font-size: larger;
        }

        .ticketTd{
            text-align: center;
            font-size: larger;
            font-weight: bold;
            overflow: hidden;
        }

        .totalTd{
            background-color: rgb(222, 222, 222);
            font-weight: bold;
            font-size: large;
        }

        .ticketStyle{
            background-color: #2f2f4f;
            color: #808080;
            font-weight: bolder;
            border: 10px solid black;
            margin-bottom: 10px;
        }

        .mr-1 {
            margin-right: 1em;
        }

    </style>
</head>
<body>
<?php
foreach ($_SESSION['cart'] as $movie) {
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
        <?php
    }
}
?>
</body>
</html>
