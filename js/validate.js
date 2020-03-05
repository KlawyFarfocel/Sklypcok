passFlag=true;
function validateLogin(login){
    var regEx=/^[a-zA-Z0-9ąĄćĆęĘłŁńŃóÓśŚźŹżŻ]{8,15}$/;
    if (regEx.test(login.value)!=true) {
        passFlag=false;
        return false;
    }
    return true;
}
function validatePass(pass){
    var regEx=/(?=(.*[0-9]))(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,./?])(?=.*[a-ząĄćĆęĘłŁńŃóÓśŚźŹżŻ])(?=(.*[A-ZąĄćĆęĘłŁńŃóÓśŚźŹżŻ]))(?=(.*)).{8,}/ ;
    if (regEx.test(pass.value)!=true) {
        passFlag=false;
        return false;
    }
    return true;
}
function chkPass(old,nova){
    if(old.value!=nova.value){ 
        passFlag=false;
        return false;
    }
    return true;
}
function validateMail(mail){
    var regEx=/^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$/;
    if (regEx.test(mail.value)!=true) {
        passFlag=false;
        return false;
    }
    return true;
}
$('#chk').click(validateRegister);
$('#chkAcc').click(validateAcc);
function validColor(number){
    var label=$('.form-group label')[number];
    label.style.color='red';
    var input=$('.form-control')[number];
    input.style.border='1px solid red';
}
function resetDefault(){
    var a=$(':input');
    a.removeAttr('style');
    var b=$('label');
    b.removeAttr('style');
}
function validateRegister(){
    resetDefault();
    passFlag=true;
    var form=$('.form-control');
    var result=validateLogin(form[0]);
    if(result==false){
        validColor(0);
        var p=$('.form-group p')[0];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="Login niezgodny ze wzorcem. Spróbuj ponownie";
    }
    else{
        var p=$('.form-group p')[0];
        p.classList='d-none';
    }
    result=validatePass(form[2]);
    if(result==false){
        validColor(2);
        var p=$('.form-group p')[2];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="Hasło niezgodne ze wzorcem. Spróbuj ponownie";
    }
    else{
        var p=$('.form-group p')[2];
        p.classList='d-none';
    }
    result=chkPass(form[2],form[3]);
    if(result==false){
        validColor(3);
        var p=$('.form-group p')[3];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="Hasła się nie zgadzają. Spróbuj ponownie";
    }
    else{
        var p=$('.form-group p')[3];
        p.classList='d-none';
    }
    result=validateMail(form[1]);
    if(result==false){
        validColor(1);
        var p=$('.form-group p')[1];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="E-mail niezgodny ze wzorcem. Spróbuj ponownie";
    }
    else{
        var p=$('.form-group p')[1];
        p.classList='d-none';
    }
    if(passFlag==false){
        event.preventDefault();
    }
}
function validateAcc(){
    resetDefault();
    passFlag=true;
    var form=$('.form-control');
    var result=validateLogin(form[0]);
    if(result==false){
        validColor(0);
        var p=$('.form-group p')[0];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="Login niezgodny ze wzorcem. Spróbuj ponownie";
    }
    else{
        var p=$('.form-group p')[0];
        p.classList='d-none';
    }
    result=validatePass(form[1]);
    if(result==false){
        validColor(1);
        var p=$('.form-group p')[1];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="Hasło niezgodne ze wzorcem. Spróbuj ponownie";
    }
    else{
        var p=$('.form-group p')[1];
        p.classList='d-none';
    }
    result=validateMail(form[2]);
    if(result==false){
        validColor(12);
        var p=$('.form-group p')[2];
        p.classList="d-block";
        p.style.color="red";
        p.innerText="E-mail niezgodny ze wzorcem. Spróbuj ponownie";
    }
    else{
        var p=$('.form-group p')[2];
        p.classList='d-none';
    }
    if(passFlag==false){
        event.preventDefault();
    }
}