


function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}


function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }

  function checkForm(form)
  {
    if(form.name.value == "") {
      alert("Error: Name cannot be blank!");
      form.name.focus();
      return false;
    }
    
     re = /^\w+$/;
    if(!re.test(form.name.value)) {
      alert("Error: Name must contain only letters, numbers and underscores!");
      form.name.focus();
      return false;
    }
    
    
     if(form.surname.value == "") {
      alert("Error: Surname cannot be blank!");
      form.surname.focus();
      return false;
    }
    
     re = /^\w+$/;
    if(!re.test(form.surname.value)) {
      alert("Error: Surname must contain only letters, numbers and underscores!");
      form.surname.focus();
      return false;
    }
    
     if(form.mail.value == "") {
      alert("Error: Mail cannot be blank!");
      form.login.focus();
      return false;
    }
    
     if(!validateEmail(form.mail.value))
     {
     	alert("Error : Type in correct mail");
     	form.mail.focus();
     	return false;
     }
    if(form.pass.value == "") {
        alert("Error : Password cannot be blank!");
        form.pass.focus();
        
        return false;
       }
       
    else if(!checkPassword(form.pass.value)) 
       {
        alert("The password you have entered is not valid!");
        form.pass.focus();
        return false;
      }
   
    
    return true;
  }