function showProducts(catID) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","models/loadProducts.php?action=products&catID="+catID);
    xmlhttp.send();

}

function showDetails(prID) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","models/loadProductDetails.php?prID="+prID);
    xmlhttp.send();

}

function updateNavBar(session) {
    if(session == 1){
        var login = document.getElementById("login");
        login.parentNode.removeChild(login);
        var register = document.getElementById("register");
        register.parentNode.removeChild(register);

    }else{
        var userbar = document.getElementById("user-bar");
        userbar.parentNode.removeChild(userbar);
    }
}

function updateCart() {
    $.getJSON("models/updateCart.php",function (data) {
        document.getElementById("total-products").innerHTML = data.tproducts+ " products";
        document.getElementById("total-price").innerHTML = data.tprice+ " €";
    })
}

function sessionStatus() {

    $.ajax({
        type: "POST",
        url: "models/sessionStatus.php",
        success: function (status) {
            updateNavBar(status);
            updateCart();
        }
    })
}
function logout() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            window.location.replace("index.php")
        }
    }
    xmlhttp.open("GET","index.php?action=logout");
    xmlhttp.send();
}


function addProduct2Cart(prID) {
    var element = document.getElementById("quantity");
    var quantity = element.options[element.selectedIndex].value;
    $.ajax({

        type: "GET",
        url: "models/editCart.php",
        data:{
            mode:'add',
            prID:prID,
            q:quantity
        },
        success: function (response) {
            window.alert("Product added to cart");
            updateCart();
        }
    })
}

function checkcheckout() {

    $.ajax({
        type: "POST",
        url: "models/sessionStatus.php",
        success: function (status) {
            if(status == 1){
                window.location.replace("index.php?action=checkout");
            }else{
                window.alert("You need to be logged in to checkout");
                window.location.replace("index.php?action=login");

            }
        }
    })

}

function search() {
    var search = document.getElementById("q").value

    if(search.length >= 3){
        $.ajax({

            type: "GET",
            url: "models/search.php",
            data:{
                q:search
            },
            success: function (response) {
                document.getElementById("content").innerHTML = response;
            }
        })
    }else{
        document.getElementById("content").innerHTML = "";

    }
    return false;
}

function searchPage() {
    window.location = "index.php?action=login";

}

function editProfile(userId) {
    $('.user-profile input').attr('readonly',false);
    $('.user-profile label').attr('hidden',false);
    $('.user-profile input').attr('hidden',false);
    $('.user-profile :submit').attr('onclick', "return updateProfile("+userId+")");
    $('.user-profile #user-id').attr('value',userId);
    $('.user-profile #user-id').attr('disabled',true);
    $('.user-profile input').attr('required',true);

    return false;
}

function updateProfile(userId) {

    var fields =$(".user-profile :text, :password, input[type=number], input[type=email]");
    var bool = false;
    $.each(fields, function (i,field) {
        if(!field.value){
            bool = true;
        }
    });
    if(bool){
        window.alert("All the fields are required");
    }else{
        var id = document.getElementById("user-id").value;
        var name = document.getElementById("name").value;
        var surname = document.getElementById("surname").value;
        var mail = document.getElementById("mail").value;
        var address = document.getElementById("address").value;
        var city = document.getElementById("city").value;
        var postal_code = document.getElementById("postal_code").value;
        var old_password = document.getElementById("old_password").value;
        var new_password = document.getElementById("new_password").value;
        var new_password2 = document.getElementById("new_password2").value;

        if(new_password == new_password2){

            $.post('models/update_profile.php',
                {Id:id,
                    Name:name,
                    Surname:surname,
                    Mail:mail,
                    Address:address,
                    City:city,
                    Cp:postal_code,
                    Old_password:old_password,
                    New_password:new_password},
                function(response) {
                    if(response == 1){
                        window.location.replace("index.php?action=profile");
                    }else {
                        window.alert('Error modifying data. Old password is incorrect.');
                    }
                }
            )

        }else{
            window.alert("Passwords didn't match")
        }
    }

}


function removeProductCart(prID){
    $.ajax({

        type: "GET",
        url: "models/editCart.php",
        data:{
            mode:'remove',
            prID:prID
        },
        success: function (response) {
            window.alert("Product removed from to cart");
            location.reload();
        }
    })
}

function emptyCart(){
    $.ajax({

        type: "GET",
        url: "models/editCart.php",
        data:{
            mode:"empty"
        },
        success: function (response) {
            window.alert("All products removed from cart.");
            location.reload();
        }
    })
}

$('.slide > div:gt(0)').hide();
setInterval(function () {
    $('.slide > div:first').fadeOut().next().fadeIn().end().appendTo('.slide')
},3000)