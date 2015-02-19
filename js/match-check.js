//CODED BY KEITH'S CODE
      function checkEmail()
      {
          //Store the password field objects into variables ...
          var email1 = document.getElementById('e1');
          var email2 = document.getElementById('e2');
          //Store the Confimation Message Object ...
          var message = document.getElementById('validate-status');
          //Set the colors we will be using ...
          var goodColor = "#66cc66";
          var badColor = "#ff6666";
          //Compare the values in the password field 
          //and the confirmation field
          if(email1.value == email2.value){
              //The passwords match. 
              //Set the color to the good color and inform
              //the user that they have entered the correct password 
              message.style.color = goodColor;
              message.innerHTML = "E-mails Match!"
          }else{
              //The passwords do not match.
              //Set the color to the bad color and
              //notify the user.
              message.style.color = badColor;
              message.innerHTML = "E-mails Do Not Match!"
          }
      }
//CODED BY KEITH'S CODE
      function checkPass()
      {
          //Store the password field objects into variables ...
          var pass1 = document.getElementById('pass1');
          var pass2 = document.getElementById('pass2');
          //Store the Confimation Message Object ...
          var message = document.getElementById('validate-status2');
          //Set the colors we will be using ...
          var goodColor = "#66cc66";
          var badColor = "#ff6666";
          //Compare the values in the password field 
          //and the confirmation field
          if(pass1.value == pass2.value){
              //The passwords match. 
              //Set the color to the good color and inform
              //the user that they have entered the correct password 
              message.style.color = goodColor;
              message.innerHTML = "Passwords Match!"
          }else{
              //The passwords do not match.
              //Set the color to the bad color and
              //notify the user.
              message.style.color = badColor;
              message.innerHTML = "Passwords Do Not Match!"
          }
      }