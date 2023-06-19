function check_cookie(){
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "check_login.php", true);
    myRequest.send();
    myRequest.onload = function(){
        if (this.responseText == 'user') {
            window.location.href = "http://localhost/lostandfound/user_homepage.html";
        }
        else if (this.responseText == 'admin') {
            window.location.href = "http://localhost/lostandfound/admin_homepage.html";
        }
    }
}

function verify() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "login.php?username="+username+
    "&password="+password, true);
    myRequest.send();
    myRequest.onload = function(){
        if (this.responseText == 'user') {
            window.location.href = "http://localhost/lostandfound/user_homepage.html";
        }
        else if (this.responseText == 'admin') {
            window.location.href = "http://localhost/lostandfound/admin_homepage.html";
        }
        else if (this.responseText == 'wrong') {
            document.getElementById("status").innerHTML =
                "<span style='color:red'>Incorrect username or password. Please try again!</span>";
        }
    }
}

function submit() {
    var username = document.getElementById("username2").value;
    var nickname = document.getElementById("nickname2").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var gender = document.getElementById("gender").value;
    var tempdate = document.getElementById("birthday").value.split("-");
    var birthday = tempdate.join("/");

    if (username == '' || nickname == '' || email == '' || password == '' || confirm_password == '' || gender == '') {
        document.getElementById("error").innerHTML = "<p style = 'color: red;'>Please fill in all the fields to proceed.</p>";
    }
    else if (password != confirm_password) {
        document.getElementById("error").innerHTML = "<p style = 'color: red;'>Passwords do not match.</p>";
    }
    else {
        var myRequest = new XMLHttpRequest();
        myRequest.open("GET", "register.php?u="+username+
        "&p="+password+"&n="+nickname+"&e="+email+"&g="+gender+"&b="+birthday, true);
        myRequest.send();
        myRequest.onload = function(){
                window.location.href = "http://localhost/lostandfound/user_homepage.html";
        }
    }
}

function register() {
    window.location.href = "http://localhost/lostandfound/register.html"
}

function login_page() {
    window.location.href = "http://localhost/lostandfound/login.html"
}

function forgot_password() {
    window.location.href = "http://localhost/lostandfound/forgot_password.html";
}

function change_password() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var myRequest = new XMLHttpRequest();
        myRequest.open("GET", "change_password.php?u="+username+
        "&p="+password, true);
        myRequest.send();
        myRequest.onload = function(){
                window.location.href = "http://localhost/lostandfound/login.html";
        }
}

