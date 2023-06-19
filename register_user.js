function submit_userdetails(){
    alert("work?");
    var username = document.getElementById("username").value;
    var nickname = document.getElementById("nickname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var gender = document.getElementById("gender").value;
    var tempdate = document.getElementById("date").value.split("-");
    var birthday = tempdate.join("/");

    if (username == '' || nickname == '' || email == '' || password == '' || confirm_password == '' || gender == '') {
        document.getElementById("error").innerHTML = <p>Please fill in all the fields to proceed.</p>
    }
    else if (password != confirm_password) {
        document.getElementById("error").innerHTML = <p>Passwords do not match.</p>
    }
    else {
        var myRequest = new XMLHttpRequest();
        myRequest.open("GET", "register.php?username="+username+
        "&password="+password+"&ni="+nickname+"&em="+email+"&ge="+ge+"&bd="+birthday, true);
        myRequest.send();
        myRequest.onload = function(){
            if (this.responseText == 'registered') {
                window.location.href = "http://localhost/lostandfound/user_homepage.html";
            }
            
        }
    }
}