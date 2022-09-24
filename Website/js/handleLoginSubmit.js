var login_input = document.getElementById('student_login_input')
var password_input = document.getElementById('student_login_password');
var form = document.getElementById('form-student-login');
var info_div = document.getElementById('login-info');

var is_something_wrong = false;
var error_info = "";

if (form.attachEvent) {
    form.attachEvent("submit", processForm);
} else {
    form.addEventListener("submit", processForm);
}

function processForm(e) {
    if (e.preventDefault) e.preventDefault();

    is_something_wrong = false;
    error_info = "";

    if(login_input.value.length > 0 && password_input.value.length > 0)
    {
        validateEmail(login_input);
        CheckPassword(password_input);
        console.log("Not empty!");
    }
    else
    {
        is_something_wrong = true;
        error_info = "Fields cannot be Empty!";
        console.log("Empty!");
    }

    if(is_something_wrong)
    {
        info_div.style.visibility = "visible";
        info_div.textContent = error_info;
        console.log(error_info);
    }
    else
    {
        form.submit();
    }

    // You must return false to prevent the default form behavior
    return false;
}

const validateEmail = (email) => {
    var is_validated =  String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );

      if(is_validated)
      {
        is_something_wrong = false;
      }
      else
      {
        is_something_wrong = true;
        error_info += "Wrong format of email. ";
      }
  };

  // at least one digit, one special char, one lowercase and one uppercase
  function CheckPassword(inputtxt) 
  { 
    var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    
    if(inputtxt.value.match(decimal)) 
    { 
        is_something_wrong = false;
        return true;
    }
    else
    { 
        is_something_wrong = true;
        error_info += "Wrong format of password. "
        return false;
    }
  } 