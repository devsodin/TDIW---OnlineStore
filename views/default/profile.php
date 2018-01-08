    <form class="translucid user-profile" onsubmit="return false">
        <label hidden>User Id</label>
        <input id="user-id" type="text" hidden>
        <label>Name</label>
        <input id="name" type="text" readonly=true value="<?php echo $userData['Name']?>">
        <label>Surname</label>
        <input id="surname" type="text" readonly=true value="<?php echo $userData['Surname']?>">
        <label>Mail</label>
        <input id="mail" type="email" readonly=true value="<?php echo $userData['Mail']?>">
        <label>Address</label>
        <input id="address" type="text" readonly=true value="<?php echo $userData['Address']?>">
        <label>City</label>
        <input id="city" type="text" readonly=true value="<?php echo $userData['City']?>">
        <label>Postal Code</label>
        <input id="postal_code" type="number" readonly=true value="<?php echo $userData['Postal_Code']?>">

        <label>Old Password</label>
        <input id="old_password" type="password" readonly=true value="********">
        <label hidden>New Password</label>
        <input id="new_password" type="password" hidden>
        <label hidden>Confirm new Password</label>
        <input id="new_password2" type="password" hidden>

        <input type="submit" onclick="return editProfile(<?php echo $userData['Id']?>)">

    </form>
</section>