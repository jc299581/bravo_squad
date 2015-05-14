function CheckPass()
{
    var pass1 = document.getElementById('mem_password');
    var pass2 = document.getElementById('mem_password2');
    var submit = document.getElementById("submit")

    var message = document.getElementById('confirmMessage');

    var acceptColour = "#66cc66";
    var declineColour = "#ff6666";

    if(pass1.value == "" || pass2.value == ""){

        pass2.style.backgroundColor = declineColour;
        message.style.color = declineColour;
        message.innerHTML = "Passwords do not MATCH!"

    }else if(pass1.value == pass2.value){

        pass2.style.backgroundColor = acceptColour;
        message.style.color = acceptColour;
        message.innerHTML = "Passwords Match!"
        submit.disabled =false;
    }

    else{

        pass2.style.backgroundColor = declineColour;
        message.style.color = declineColour;
        message.innerHTML = "Passwords do not MATCH!"
        submit.disabled =true;
    }
}
