

 function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }
  
  function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}


  function checkForm(form)
  {
    if(form.login.value == "") {
      alert("Error: Username cannot be blank!");
      form.login.focus();
      return false;
    }
    
    if(!validateEmail(form.login.value))
    {
    	alert("Error : Email is you login");
    	form.login.focus();
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