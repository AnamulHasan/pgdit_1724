function formValid(){
    var fullName = document.contact.fullName;
    if(fullName.value==""){
        alert("Your Name is required!");
        fullName.focus();
        return false;
    }
    var eMail = document.contact.eMail;
    if(eMail.value==""){
        alert("E-Mail address is required!");
        eMail.focus();
        return false;
    }
    var subject = document.contact.subject;
    if(subject.value==""){
        alert("Subject field is required!");
        subject.focus();
        return false;
    }
    var message = document.contact.message;
    if(message.value==""){
        alert("Message field is required!");
        message.focus();
        return false;
    }
    return true;
}

function formValid2(){
    var userName = document.login.userName;
    if(userName.value==""){
        alert("Enter username");
        userName.focus();
        return false;
    }
    var passWord = document.login.passWord;
    if(passWord.value==""){
        alert("Enter password");
        passWord.focus();
        return false;
    }
}