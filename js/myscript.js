function previewFile() {
    const preview = document.querySelector('.imgselection');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function () {
        // convert image file to base64 string
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

function setCookies(email, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = "email=" + email + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function loadCookies() {
    var email = getCookie("email");
    if (email == null || email == "") {
        email = prompt("Please enter your email", "");
        setCookies(email, 30);
        alert('Email stored');
    } else {
        return;
    }
}
function cookiesdialog(){
    email = prompt("Please enter your email", "");
    setCookies(email, 30);
    alert('Email stored');
}

function cartDialog() {
    var r = confirm("Insert into cart?");
    if (r == true) {
        return true;
    } else {
        return false;
    }
}

function deleteDialog() {
    var r = confirm("Delete this item?");
    if (r == true) {
        return true;
    } else {
        return false;
    }
}