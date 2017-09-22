<header>
    <div class="content">
        <div id="header-emblem">
            <img src="photos/silverado.png" alt="The silverado logo">
        </div>

        <h1 class="title"> <br> <em>The best it gets</em> </h1>

        <div id="header-stars">
            <img src="photos/silverado_stars.png" alt="Silverado stars">
        </div>
    </div>

</header>

<nav>
    <div class="content">
        <a class="<?php echo ($_SERVER['PHP_SELF'] == '/index.php' || $_SERVER['PHP_SELF'] == '/' ? 'active' : ''); ?>" href="index.php">Home</a>
        <a class="<?php echo ($_SERVER['PHP_SELF'] == '/showing.php' ? 'active' : ''); ?>" href="showing.php">Now Showing</a>
    </div>
</nav>