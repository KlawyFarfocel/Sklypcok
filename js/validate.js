passFlag=true;
function validateLogin(login){
    console.log(login);
    var regEx=/^[a-zA-Z0-9]{8,15}$/;
    if (regEx.test(login.value)!=true) {
        passFlag=false;
        return false;
    }
}
function validatePass(pass){
    var regEx=/(?=(.*[0-9]))(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,./?])(?=.*[a-z])(?=(.*[A-Z]))(?=(.*)).{8,}/ ;
    if (regEx.test(pass.value)!=true) {
        passFlag=false;
        return false;
    }
}
function chkPass(old,nova){
    if(old.valu!=nova.value){ 
        passFlag=false;
        return false;
    }
}
function validateMail(mail){
    var regEx=/^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$/;
    if (regEx.test(mail.value)!=true) {
        passFlag=false;
        return false;
    }
}
$('#chk').click(validateRegister);
function validateRegister(){
    event.preventDefault();
    var form=$('.form-control');
    function validColor(number){
        var label=$('.form-group label')[number];
        label.style.color='red';
        var input=$('.form-control')[number];
        input.style.border='1px solid red';
    }
    var result=validateLogin(form[0]);
    if(result==false){
        validColor(0);
        var p=$('.form-group p')[0];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="Błędny login. Spróbuj ponownie";
    }
    result=validatePass(form[2]);
    if(result==false){
        validColor(2);
        var p=$('.form-group p')[2];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="Hasło niezgodne ze wzorcem. Spróbuj ponownie";
    }
    result=chkPass(form[2],form[3]);
    if(result==false){
        validColor(3);
        var p=$('.form-group p')[3];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="Hasła się nie zgadzają. Spróbuj ponownie";
    }
    result=validateMail(form[1]);
    if(result==false){
        validColor(1);
        var p=$('.form-group p')[1];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="E-mail niezgodny ze wzorcem. Spróbuj ponownie";
    }

}