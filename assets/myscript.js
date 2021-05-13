// unlock email window by clicking checkbox
document.getElementById('changeEmail').onchange = function() {

  let email = document.getElementById('email');

  if (email.readOnly == false)
  {
    email.readOnly = true;
  }
  else 
  {
    email.readOnly = false;
  }
  };


  