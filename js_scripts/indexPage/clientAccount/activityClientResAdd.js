$(document).on('click','.confirmRes',function() {
    $(".final_status").empty();
    
    var lInput = document.getElementById("labelnumber");
    var cInput = document.getElementById("capnumber");
    var name = document.getElementById("nameLabel");
    var password = document.getElementById("passwordLabel");
    var passwordRepeat = document.getElementById("passRptLabel");
    var advance = document.getElementById("advanceLabel");
    var persons = document.getElementById("id_people_number");

    var resBegin = document.getElementById("res_begin");
    var resEnd = document.getElementById("res_end");

    name.addEventListener('blur',nameCheck,true);
    password.addEventListener('blur',passCheck,true);
    passwordRepeat.addEventListener('blur',passRptCheck,true);
    advance.addEventListener('blur',advanceCheck,true);

    var nameErr = document.getElementById("name_error");
    var passErr = document.getElementById("password_error");
    var passRptErr = document.getElementById("password_repeat_error");
    var advanceErr = document.getElementById("advance_error");

        if(name.value == "")
        {
            name.style.border = "1px solid red";
            nameErr.style = "font-size: 12px";
            nameErr.textContent = "Proszę podać pełne dane";
            name.focus();
            return false;	
        }

        if(password.value == "")
        {
            password.style.border = "1px solid red";
            passErr.style = "font-size: 12px";
            passErr.textContent = "Proszę podać pełne dane";
            password.focus();
            return false;	
        }

        if(passwordRepeat.value == "" || passwordRepeat.value != password.value)
        {
            passwordRepeat.style.border = "1px solid red";
            passRptErr.style = "font-size: 12px";
            passRptErr.textContent = "Proszę podać pełne dane";
            passwordRepeat.focus();
            return false;	
        }

        var adv = /[0-9]/;
        if(advance.value == "" || !(advance.value.match(adv)))
        {
            advance.style.border = "1px solid red";
            advanceErr.style = "font-size: 12px";
            advanceErr.textContent = "Proszę podać pełne dane";
            advance.focus();
            return false;	
        }
        
        else{
            var roomNumber = lInput.value;
            var accountName = name.value;
            var personsNumber = persons.value;
            var advancePrice = advance.value;
            var typedPassword = password.value;
            var begin = resBegin.value;
            var end = resEnd.value;


            $.ajax({
                url: "proceed_reservation.php",
                type: "POST",
                data: {accountName:accountName, personsNumber:personsNumber, advancePrice:advancePrice, typedPassword:typedPassword, roomNumber:roomNumber,
                       begin:begin, end:end},

                success: function(response){
                    $(".final_status").append(response);
                    $("#nameLabel").val('');
                    $("#passwordLabel").val('');
                    $("#passRptLabel").val('');
                    $("#advanceLabel").val('');
                },

                error: function(response){
                    $(".final_status").append(response);
                }
            });

        }
        
    function nameCheck(){
        if(name.value !=  ""){
            name.style.border = "none";
            nameErr.innerHTML = "";
            return true;
        }
    }


    function passCheck(){
        if(password.value !=  ""){
            password.style.border = "none";
            passErr.innerHTML = "";
            return true;
        }
    }

    function passRptCheck(){
        if(passwordRepeat.value !=  "" && passwordRepeat.value == password.value){
            passwordRepeat.style.border = "none";
            passRptErr.innerHTML = "";
            return true;
        }
    }

    var adv = /[0-9]{2,3}/;
    function advanceCheck(){
        if(advance.value !=  "" && advance.value.match(adv)){
            advance.style.border = "none";
            advanceErr.innerHTML = "";
            return true;
        }
    }
});