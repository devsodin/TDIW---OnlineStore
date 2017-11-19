<!DOCTYPE html>
<link rel=stylesheet href="./views/default/css/login-register.css"/>
<hmtl>
    <body>
        <form id="register" action='?action=register' method="post" class="translucid" accept-charset="UTF-8">
            <div class="user-pass-block">

                <label><p>Name*</p></label>
                <input type="text" placeholder="Enter Name" name="name" required>
                <label><p>Surname*</p></label>
                <input type="text" placeholder="Enter Surname" name="surname" required>

                <label><p>Mail*</p></label>
                <input type="email" placeholder="Enter mail" name="mail" required>
                <label><p>Repeat mail*</p></label>
                <input type="email" placeholder="Enter mail" name="mail2" required>

                <label><p>Password*</p></label>
                <input type="password" placeholder="Enter Password" name="passwd" required>
                <label><p>Repeat password*</p></label>
                <input type="password" placeholder="Enter Password" name="passwd2" required>

                <label><p>Address*</p></label>
                <input type="text" placeholder="Enter Address" name="address" required>

                <label><p>City*</p></label>
                <input type="text" placeholder="Enter city" name="city" required>

                <label><p>Postal Code*</p></label>
                <input type="text" placeholder="Enter Postal Code" name="cp" required>

                <button type="submit">Login</button>
            </div>
        </form>
    </body>
</hmtl>