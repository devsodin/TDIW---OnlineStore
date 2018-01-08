        <form id="register" method="post"  class="translucid" accept-charset="UTF-8" onsubmit="?action=register">
            <div class="user-pass-block">
                <label><p>Name*</p></label>
                <input type="text" placeholder="Enter Name" name="name" id="name" required>
                <label><p>Surname*</p></label>
                <input type="text" placeholder="Enter Surname" name="surname" id="surname" required>

                <label><p>Mail*</p></label>
                <input type="email" placeholder="Enter mail" name="mail" id="mail" required>

                <label><p>Password*</p></label>
                <input type="password" placeholder="Enter Password" name="passwd" id="passwd" required>

                <label><p>Address*</p></label>
                <input type="text" placeholder="Enter Address" name="address" id="address" required>

                <label><p>City*</p></label>
                <input type="text" placeholder="Enter city" name="city" id="city" required>

                <label><p>Postal Code*</p></label>
                <input type="number" min="0" max="99999" placeholder="Enter Postal Code" name="cp" id="cp" required>

                <button type="submit" name="register-button">Register</button>
            </div>
        </form>
</section>

