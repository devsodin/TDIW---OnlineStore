<!DOCTYPE html>
    <hmtl>
        <head>
            <title>ENP</title>
            <meta lang="en" charset="UTF-8">
            <link rel="icon" href="a.ico" type="image/x-icon"/>
            <link rel=stylesheet href="view/default/css/index.css"/>
        </head>
        <body>
            <form action="../../controllers/login.php" method="post">
                <div class="imgcontainer">
                    <img src="img_avatar2.png" alt="Avatar" class="avatar">
                </div>

                <div class="user-pass-block">
                    <label><p>Mail:</p></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label><p>Password:</p></label>
                    <input type="password" placeholder="Enter Password" name="passwd" required>

                    <button type="submit">Login</button>
                </div>
            </form>
        </body>
    </hmtl>