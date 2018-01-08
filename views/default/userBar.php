
    <header>
        <nav>
            <a class="ENP-title" href=?action=index><img class="ENP-title" src="views/images/logo.png"></a>
            <div class="dropdown">
                <a class="dropbutton" onclick="showProducts(0)" >Categories</a>
                <div class="dynamicdropdown">
                    <?php
                    foreach($categories as $category){
                        echo "<a id='{$category['id']}' onclick='showProducts({$category['id']})'>{$category['Name']}</a>";
                    }
                    ?>
                </div>
            </div>
            <a id="login" href=?action=login>Login</a>
            <a id="register" href="?action=register">Register</a>
            <a><form onsubmit="searchPage()">
                    <input type="text" class="search-bar" id="q" name="q" onkeyup="search()" placeholder="Search">
                </form>
            </a>
            <div class="user">
                <div class="dropdown">
                    <a id="user-bar" class="dropbutton user-bar"><?php echo $name ?></a>
                    <div class="user-bar dynamicdropdown">
                        <a id="account" href="?action=profile">My Account</a>
                        <a id="history" href="?action=purchases">Older Carts</a>
                        <a id="logout" onclick="logout()" >Logout</a>

                    </div>
                </div>
            </div>
            <div class="cart">
                <div class="cart-data">
                    <a href="?action=cart&mode=show"><img src="./views/images/cart.png" alt="carro"></a>
                    <a id="total-products"></a>
                    <a id="total-price"></a>
                </div>
            </div>

        </nav>
    </header>
<section id="content">
