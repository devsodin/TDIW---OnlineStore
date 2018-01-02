<body>
<header>
    <nav>
        <h1><a href=?action=management>ADMIN-ENP</a></h1>
        <a href=?action=history>Orders History</a>

        <div class="dropdown">
            <a class="dropbutton">Products</a>
            <div class="user-bar dynamicdropdown">
                <a href=?action=m_products&m=list>Product List</a>
                <a href=?action=m_products&m=add>Add Products</a>
            </div>
        </div>
        <a id="users" href=#>Users</a>

        <div class="user">
            <div class="dropdown">
                <a id="user-bar" class="dropbutton user-bar"><?php echo $name ?></a>
                <div class="user-bar dynamicdropdown">
                    <a id="account">My Account</a>
                    <a id="logout" onclick="logout()" >Logout</a>

                </div>
            </div>
        </div>

</nav>
</header>
<section id="content">
