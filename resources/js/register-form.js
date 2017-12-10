function init() {
    document.getElementById("mainForm").addEventListener("submit", checkForEmptyFields);
    
    var cssSelector = ".hilightable";
    var fields = document.querySelectorAll(cssSelector);
    
    for (var i=0; i<fields.length; i++) {
        fields[i].addEventListener("focus", setClass);
        fields[i].addEventListener("blur", setClass);
        
        if(fields[i].getAttribute('id') == 'password' || fields[i].getAttribute('id') == 'passwordmatch') {
            fields[i].addEventListener("change", checkPasswords);
        }
    }
}

window.addEventListener("load", init);
window.addEventListener("load", checkEmail);


function setClass(e) {
    if (e.type == "focus") {
        e.target.setAttribute("class", "highlight");
    }
    else if(e.type == "blur") {
        e.target.setAttribute("class", "hilightable");
    }
}

function checkEmail() {
    var errorEmail = document.getElementById("emailError");
    errorEmail.style.color = 'red';
    document.getElementById("email").setAttribute("class", "error");
    
}

function checkForEmptyFields(e) {
    
    var errorArea = document.getElementById("errors");
    errorArea.className = "hidden";
    
    var cssSelector = "[class*='required']";
    var fields = document.querySelectorAll(cssSelector);
    
    var fieldList = [];
    for (i=0; i<fields.length; i++) {
        if(fields[i].value == null || fields[i].value == "") {
            e.preventDefault();
            fieldList.push(fields[i]);
            fields[i].setAttribute("class", "error");
        }
    }
    var msg = "The following fields can't be empty: ";
    if (fieldList.length > 0) {
        for (i=0; i<fieldList.length; i++) {
            msg += fieldList[i].id + ", ";
        }
        errorArea.innerHTML = "<p>" + msg + "</p>";
        errorArea.className = "visible";
    }
}

function checkPasswords() {
    var password = document.getElementById('password');
    var confirm_pass = document.getElementById('passwordmatch');
    
    if(password.value == confirm_pass.value && password.value != "") {
        document.getElementById('checkPasswords').style.color = 'green';
        document.getElementById('checkPasswords').innerHTML = '<p>Passwords Match</p>';
    }
    else {
        document.getElementById('checkPasswords').style.color = 'red';
        document.getElementById('checkPasswords').innerHTML = '<p>Passwords do not Match</p>';
    }
    
}