var clientName = document.forms["client_res_data"]["res_c_name"];
var clientSurname = document.forms["client_res_data"]["res_c_surname"];
var clientEmail = document.forms["client_res_data"]["res_c_email"];
var clientPhNumber = document.forms["client_res_data"]["res_c_phnumber"];
var clientStreet = document.forms["client_res_data"]["res_c_street"];
var clientAddress = document.forms["client_res_data"]["res_c_address"];
var clientPostal = document.forms["client_res_data"]["res_c_postal"];
var clientCity = document.forms["client_res_data"]["res_c_city"];
var clientPesel = document.forms["client_res_data"]["res_c_pesel"];
var clientIDCard = document.forms["client_res_data"]["res_c_idcard"];
var clientAdvance = document.forms["client_res_data"]["res_c_advance"];

var nameError = document.getElementById("cl_name_error");
var surnameError = document.getElementById("cl_surname_error");
var emailError = document.getElementById("cl_email_error");
var phNumberError = document.getElementById("cl_phnumber_error");
var streetError = document.getElementById("cl_street_error");
var addressError = document.getElementById("cl_address_error");
var postalError = document.getElementById("cl_postal_error");
var cityError = document.getElementById("cl_city_error");
var peselError = document.getElementById("cl_pesel_error");
var idCardError = document.getElementById("cl_idcard_error");
var advanceError = document.getElementById("cl_advance_error");

clientName.addEventListener("blur", nameVerify, true);
clientSurname.addEventListener("blur", surnameVerify, true);
clientEmail.addEventListener("blur", emailVerify, true);
clientPhNumber.addEventListener("blur", phNumberVerify, true);
clientStreet.addEventListener("blur", streetVerify, true);
clientAddress.addEventListener("blur", addressVerify, true);
clientPostal.addEventListener("blur", postalVerify, true);
clientCity.addEventListener("blur", cityVerify, true);
clientPesel.addEventListener("blur", peselVerify, true);
clientIDCard.addEventListener("blur", idCardVerify, true);
clientAdvance.addEventListener("blur", advanceVerify, true);



function clientDataValidation(){
        if(clientName.value == ""){
                clientName.style.border = "1px solid red";
                nameError.style = "font-size: 14px";
                nameError.textContent = "Proszę podać pełne dane";
                clientName.focus();
                return false;	
            }
        if(clientName.value.length > 30){
            clientName.style.border = "1px solid red";
            nameError.textContent = "Zbyt dużo znaków";
            nameError.style = "font-size: 14px";
            clientName.focus();
            return false;
            }
        
        if(clientSurname.value == ""){
            clientSurname.style.border = "1px solid red";
            surnameError.textContent = "Proszę podać pełne dane";
            surnameError.style = "font-size: 14px";
            clientSurname.focus();
            return false;	
        }
        if(clientSurname.value.length > 30){
            clientSurname.style.border = "1px solid red";
            surnameError.textContent = "Zbyt dużo znaków";
            surnameError.style = "font-size: 14px";
            clientSurname.focus();
            return false;
            }
        
        if(clientEmail.value == ""){
            clientEmail.style.border = "1px solid red";
            emailError.textContent = "Proszę podać pełne dane";
            emailError.style = "font-size: 14px";
            clientEmail.focus();
            return false;	
        }
        if(clientEmail.value.length > 30){
            clientEmail.style.border = "1px solid red";
            emailError.textContent = "Zbyt dużo znaków";
            emailError.style = "font-size: 14px";
            clientEmail.focus();
            return false;
            }
        
        if(clientPhNumber.value == ""){
            clientPhNumber.style.border = "1px solid red";
            phNumberError.textContent = "Proszę podać pełne dane";
            phNumberError.style = "font-size: 14px";
            clientPhNumber.focus();
            return false;	
        }

        var phoneno = /[0-9]{9}/;
          if(!(clientPhNumber.value.match(phoneno))) {
                 clientPhNumber.style.border = "1px solid red";
                phNumberError.textContent = "Zły format numeru telefonu";
                phNumberError.style = "font-size: 14px";
                clientPhNumber.focus();
                return false;
          }
        
        if(clientStreet.value == ""){
            clientStreet.style.border = "1px solid red";
            streetError.textContent = "Proszę podać pełne dane";
            streetError.style = "font-size: 14px";
            clientStreet.focus();
            return false;	
        }
        if(clientStreet.value.length > 30){
            clientStreet.style.border = "1px solid red";
            streetError.textContent = "Zbyt dużo znaków";
            streetError.style = "font-size: 14px";
            clientStreet.focus();
            return false;
            }
        
        if(clientAddress.value == ""){
            clientAddress.style.border = "1px solid red";
            addressError.textContent = "Proszę podać pełne dane";
            addressError.style = "font-size: 14px";
            clientAddress.focus();
            return false;	
        }
        if(clientAddress.value.length > 10){
            clientAddress.style.border = "1px solid red";
            addressError.textContent = "Zbyt dużo znaków";
            addressError.style = "font-size: 14px";
            clientAddress.focus();
            return false;
            }
        
        if(clientPostal.value == ""){
            clientPostal.style.border = "1px solid red";
            postalError.textContent = "Proszę podać pełne dane";
            postalError.style = "font-size: 14px";
            clientPostal.focus();
            return false;	
        }

        var postalRegEx = /[0-9]{2}\-[0-9]{3}/;
        
        if(!(clientPostal.value.match(postalRegEx))) {
            clientPostal.style.border = "1px solid red";
            postalError.textContent = "Nieprawidłowy kod pocztowy";
            postalError.style = "font-size: 14px";
            clientPostal.focus();
            return false;
      }
        
        if(clientCity.value == ""){
            clientCity.style.border = "1px solid red";
            cityError.textContent = "Proszę podać pełne dane";
            cityError.style = "font-size: 14px";
            clientCity.focus();
            return false;	
        }
        if(clientCity.value.length > 50){
            clientCity.style.border = "1px solid red";
            cityError.textContent = "Zbyt dużo znaków";
            cityError.style = "font-size: 14px";
            clientCity.focus();
            return false;
            }
        
        if(clientPesel.value == ""){
            clientPesel.style.border = "1px solid red";
            peselError.textContent = "Proszę podać pełne dane";
            peselError.style = "font-size: 14px";
            clientPesel.focus();
            return false;	
        }
        if(clientPesel.value.length != 11){
            clientPesel.style.border = "1px solid red";
            peselError.textContent = "PESEL musi mieć 11 cyfr";
            peselError.style = "font-size: 14px";
            clientPesel.focus();
            return false;
            }
        
        if(clientIDCard.value == ""){
            clientIDCard.style.border = "1px solid red";
            idCardError.textContent = "Proszę podać pełne dane";
            idCardError.style = "font-size: 14px";
            clientIDCard.focus();
            return false;	
        }

        var idCardRegEx = /[A-Z]{3}[0-9]{6}/;
        
        if(!(clientIDCard.value.match(idCardRegEx))){
            clientIDCard.style.border = "1px solid red";
            idCardError.textContent = "Nieprawidłowy numer dowodu osobistego";
            idCardError.style = "font-size: 14px";
            clientIDCard.focus();
            return false;
            }
        
        if(clientAdvance.value == ""){
            clientAdvance.style.border = "1px solid red";
            advanceError.textContent = "Proszę podać pełne dane";
            advanceError.style = "font-size: 14px";
            clientAdvance.focus();
            return false;	
        }
        
    }

function nameVerify(){
    if(clientName.value != ""){
        clientName.style.border = "none";
        nameError.innerHTML = "";
        return true;	
        }
}

function surnameVerify(){
    if(clientSurname.value != ""){
        clientSurname.style.border = "none";
        surnameError.innerHTML = "";
        return true;	
        }
}

function emailVerify(){
    if(clientEmail.value != ""){
        clientEmail.style.border = "none";
        emailError.innerHTML = "";
        return true;	
        }
}

function phNumberVerify(){
    var phoneno = /[0-9]{9}/;
    if(clientPhNumber.value != "" && clientPhNumber.value.match(phoneno)){
        clientPhNumber.style.border = "none";
        phNumberError.innerHTML = "";
        return true;	
        }
}

function streetVerify(){
    if(clientStreet.value != ""){
        clientStreet.style.border = "none";
        streetError.innerHTML = "";
        return true;	
        }
}

function addressVerify(){
    if(clientAddress.value != ""){
        clientAddress.style.border = "none";
        addressError.innerHTML = "";
        return true;	
        }
}

function postalVerify(){
    var postalRegEx = /[0-9]{2}\-[0-9]{3}/;
    if(clientPostal.value != "" && clientPostal.value.match(postalRegEx)){
        clientPostal.style.border = "none";
        postalError.innerHTML = "";
        return true;	
        }
}

function cityVerify(){
    if(clientCity.value != ""){
        clientCity.style.border = "none";
        cityError.innerHTML = "";
        return true;	
        }
}

function peselVerify(){
    if(clientPesel.value != ""){
        clientPesel.style.border = "none";
        peselError.innerHTML = "";
        return true;	
        }
}

function idCardVerify(){
    var idCardRegEx = /[A-Z]{3}[0-9]{6}/;
    if(clientIDCard.value != "" && clientIDCard.value.match(idCardRegEx)){
        clientIDCard.style.border = "none";
        idCardError.innerHTML = "";
        return true;	
        }
}

function advanceVerify(){
    if(clientAdvance.value != ""){
        clientAdvance.style.border = "none";
        advanceError.innerHTML = "";
        return true;	
        }
}