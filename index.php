<?php

    session_start();

    include 'helper/functions.php' ;
    include 'helper/DB_connection.php' ;

    isAdmin();

    if (isset($_GET['page']) && $_GET['page']) {
        $page = $_GET['page'];
    } else {
        $page = 'dashboard';
    }

    if (isset($_GET['action']) && $_GET['action']) {
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <header>
        <span class="logo">LOGO</span>
        <div class="user">
            <div>
                <img src="assets/img/user.png" alt="">
            </div>
            <div>
                <span>
                    <?php $_SESSION['user_name'] ?>
                </span>
                <span><a class="logout" href="logout.php">Logout</a></span>
            </div>
            <div>
                <button>
                    <img class="arrow" src="assets/img/down-arrow.png" alt="">
                </button>
            </div>
        </div>
    </header>

    <aside>
        <ul>
            <li class="<?= $page == 'dashboard' ? 'active' : '' ?>">
                <a href="?page=dashboard">Dashboard</a>
            </li>
            <li class="<?= $page == 'categories' ? 'active' : '' ?>">
                <a href="?page=categories">Categories</a>
            </li>
            <li class="<?= $page == 'news' ? 'active' : '' ?>">
                <a href="?page=news">News</a>
            </li>
        </ul>
    </aside>

    <?php
    
    include 'pages/'.$page.'/'.$action.'.php';

    ?>

</body>
</html>