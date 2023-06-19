window.onload=function(){
    registered_users();
}

function registered_users() {
    document.getElementById("section_title").innerHTML = "Registered Users";
    document.getElementById("extra").innerHTML = 
        ""
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "registered_users.php", true);
    myRequest.send();
    myRequest.onload = function(){
        document.getElementById("tables").innerHTML = this.responseText;
    }
}

function pending_notices() {
    document.getElementById("section_title").innerHTML = "Pending Notices";
    document.getElementById("extra").innerHTML = 
        "<input type='button' class = 'buttons' value='Pending' id = 'pending'> <input type='button' class = 'buttons' value='Completed' id = 'completed' onclick = 'completed_notices();'>"; 
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "pending_notices.php", true);
    myRequest.send();
    myRequest.onload = function(){
        document.getElementById("tables").innerHTML = this.responseText;
    }
    
}

function completed_notices() {
    document.getElementById("section_title").innerHTML = "Completed Notices";
    document.getElementById("extra").innerHTML = 
        "<input type='button' value='Pending' id = 'pending' class = 'buttons' onclick = 'pending_notices();'> <input type='button' class = 'buttons' value='Completed' id = 'completed'>"; 
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "completed_notices.php", true);
    myRequest.send();
    myRequest.onload = function(){
        document.getElementById("tables").innerHTML = this.responseText;
    }
}

function close_details() {
    const modal_container = document.getElementById("modal-container");
    modal_container.classList.remove('show');
}

function search_user() {
    const modal_container = document.getElementById("modal-container");
    modal_container.classList.add('show');
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "search_user.php", true);
    myRequest.send();
    myRequest.onload = function(){
        document.getElementById("modal").innerHTML = this.responseText;
    }
}

function notices_by_userid() {
    var userid = document.getElementById("userid").value;

    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "check_user.php?id="+userid, true);
    myRequest.send();
    myRequest.onload = function(){
        if (this.responseText == 'found') {
            show_notices_by_id(userid);
        }
        else if (this.responseText == 'none'){
            document.getElementById("error").innerHTML = "<p>Unable to find user. Try again!</p>";
        }
    }
}

function show_notices_by_id(userid) {
    document.getElementById("extra").innerHTML = 
        ""
    document.getElementById("section_title").innerHTML = "Notices by User ID Search";
    close_details();
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "show_notices_by_id.php?id="+userid, true);
    myRequest.send();
    myRequest.onload = function(){
        document.getElementById("tables").innerHTML = this.responseText;
    }
}

function logout() {
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "logout.php", true);
    myRequest.send();
    myRequest.onload = function(){
        window.location.href = "http://localhost/lostandfound/login.html";
    }
}