<!DOCTYPE html>

<html>

<body>
    <header>
        <nav>
            <h1><a href=?action=#>ENP</a></h1>
            <div class="dropdown">
                <button class="dropbutton">Categories</button>
                <div class="dynamicdropdown">
                    <?php
                    for($i = 0; $i < $categories->num_rows; $i++){
                        echo '<a>'. $categories->fetch_assoc()['name'].'</a>';
                    }
                    ?>
                </div>
            </div>
            <a>Deals</a>
            <a href=?action=login>Login</a>
            <a href="?action=register">Register</a>
            <div class="dropdown">
                <button class="user-bar dropdown">Username</button>
            </div>
        </nav>

    </header>


    
</body>

</html>
