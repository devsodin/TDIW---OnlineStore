<!DOCTYPE html>
<head>
    <title>ENP</title>
    <meta lang="en" charset="UTF-8">
    <link rel=stylesheet href="./views/default/css/navbar.css"/>
</head>
<body>
    <header>
        <nav>
            <h1><a href=?action=#>ENP</a></h1>
            <div class="dropdown">
                <button class="dropbutton">Categories</button>
                <div class="dynamicdropdown">
                    <?php
                    for($i = 0; $i < $categories->num_rows; $i++){
                        $category = $categories->fetch_assoc()['name'];
                        echo '<a href=action=products&category='.$category.'>'.$category.'</a>';
                    }
                    ?>
                </div>
            </div>
            <a href="?action=products">Deals</a>
            <a href=?action=login>Login</a>
            <a href="?action=register">Register</a>
            <div class="dropdown">
                <button class="user-bar dropdown">Username</button>
            </div>
        </nav>

    </header>


    
</body>

</html>
