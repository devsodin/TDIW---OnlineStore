<!DOCTYPE html>
<head>
    <title>ENP</title>
    <meta lang="en" charset="UTF-8">
    <link rel=stylesheet href="./views/css/navbar.css"/>
    <script src="./views/js/products.js" type="text/javascript" defer></script>


</head>
<body>
<header>
    <nav>
        <h1><a href=?action=index>ENP</a></h1>
        <div class="dropdown">
            <a class="dropbutton" href="?action=products" >Categories</a>
            <div class="dynamicdropdown">
                <?php
                foreach($categories as $category){
                    echo '<a id="'.$category['id'].'" onclick="showProducts('.'\''.$category['id'].'\''.')">'.$category['Name'].'</a>';
                }
                ?>
            </div>
        </div>
        <a href=?action=login>Login</a>
        <a href="?action=register">Register</a>
        <div class="dropdown">
            <button class="user-bar dropdown">Username</button>
        </div>
    </nav>
</header>
<section id="content">
