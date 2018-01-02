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
        document.getElementById("total-products").innerHTML = data.tproducts+ "products";
        document.getElementById("total-price").innerHTML = data.tprice+ "$";
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

        type: "POST",
        url: "models/add2Cart.php",
        data:{
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
            window.alert(status);
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
}