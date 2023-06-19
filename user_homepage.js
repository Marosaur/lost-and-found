window.onload=function(){
    profilePicture();
    load_notices();
}

function profilePicture(){
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "user_homepage.php", true);
    myRequest.send();
    myRequest.onload = function(){
        document.getElementById("profilePicture").innerHTML = 
            "<h1>Welcome back, " + this.responseText + ".</h1>";
    }
}

function load_notices() {
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "load_notices.php", true);
    myRequest.send();
    myRequest.onload = function(){
        document.getElementById("notices").innerHTML = this.responseText;
    }
}

function load_details(id) {
    const modal_container = document.getElementById("modal-container");
    modal_container.classList.add('show');
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "load_details.php?id="+id, true);
    myRequest.send();
    myRequest.onload = function(){ 
        document.getElementById("modal").innerHTML = this.responseText;
    }
}

function respond(id) {
    const modal_container = document.getElementById("modal-container");
    modal_container.classList.add('show');
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "respond.php?id="+id, true);
    myRequest.send();
    myRequest.onload = function(){ 
        document.getElementById("modal").innerHTML = this.responseText;
    }
}

function cancel(id) {
    const modal_container = document.getElementById("modal-container");
    modal_container.classList.add('show');
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "cancel.php?id="+id, true);
    myRequest.send();
    myRequest.onload = function(){ 
        document.getElementById("modal").innerHTML = this.responseText;
    }
}

function delete_notice(id) {
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "delete_notice.php?id="+id, true);
    myRequest.send();
    myRequest.onload = function(){ 
        document.getElementById("modal").innerHTML = this.responseText;
    }
    close_details();
    load_notices();
}
function close_details() {
    const modal_container = document.getElementById("modal-container");
    modal_container.classList.remove('show');
    load_notices();
}

function notice_respond(id) {
    var response = document.getElementById("response").value;
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "notice_respond.php?id="+id+"&q="+response, true);
    myRequest.send();
    myRequest.onload = function(){
        document.getElementById("modal").innerHTML = this.responseText;
    }
}

function add_notice() {
    const modal_container = document.getElementById("modal-container");
    modal_container.classList.add('show');
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "add_notice.php", true);
    myRequest.send();
    myRequest.onload = function(){ 
        document.getElementById("modal").innerHTML = this.responseText;
    }
}

function submit_new_notice() {
    var type = document.getElementById("type").value;
    var tempdate = document.getElementById("date").value.split("-");
    var date = tempdate.join("/");
    var venue = document.getElementById("venue").value;
    var contact = document.getElementById("contact").value;
    var title = document.getElementById("title").value;
    var description = document.getElementById("description").value;

    if (!type || !date || !venue || !contact || !title || !description) {
        document.getElementById("status").innerHTML =
                "<span style='color:red'>Missing details. Please try again!</span>";
    }
    else {
        var myRequest = new XMLHttpRequest();
        myRequest.open("GET", "submit_new_notice.php?t="+type+"&da="+date+"&v="+venue+"&c="+contact+"&ti="+title+"&d="+description, true);
        myRequest.send();
        myRequest.onload = function(){ 
            document.getElementById("modal").innerHTML = this.responseText;
        }           
    }
}

function show_my_notices() {
    const modal_container = document.getElementById("modal-container");
    modal_container.classList.add('show');
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "show_my_notices.php", true);
    myRequest.send();
    myRequest.onload = function(){ 
        document.getElementById("modal").innerHTML = this.responseText;
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