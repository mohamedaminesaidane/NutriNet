
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
  var options = {
    damping: '0.5'
  }
  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
//////////////////////////////////////////////////////////////////////////////
function validateReclamationForm(expectedCaptcha) {
  var name = document.getElementById("nom").value;
  var title = document.getElementById("title").value;
  var category = document.getElementById("category").value;
  var description = document.getElementById("description").value;
  var email = document.getElementById("email").value;


  var errorMessage = "";

  if ((name.length <= 2)||(name.length > 100)) {
    errorMessage += "Please enter a name with more than 2 characters.\n";
  }

  if ((title.length <= 2)||(title.length > 100)) {
    errorMessage += "Please enter a title with more than 2 characters.\n";
  }

  if ((description.length <= 10)||(description.length  >= 500)) {
    errorMessage += "Please enter a description with more than 10 characters.\n";
  }

var emailPattern = /^[^\s@]+[^\s@]+[^\s@]@esprit\.tn$/;
  if (!emailPattern.test(email)) {
    errorMessage += "Please enter a valid email address.\n";
  }

//////////////////////////////////captcha//////////////////////////////////////////////////

  var userEnteredCaptcha = document.getElementById('captcha_input').value;

  if (userEnteredCaptcha === expectedCaptcha) {
  } else {
      errorMessage += "Captcha verification failed. Please try again.\n";
  } 

//////////////////////////////////////////////////////////////////////////////////////////   

  if (errorMessage !== "") {
    alert(errorMessage);
    return false;
  }

  return true;
}
///////////////////////////////////////////////////////////////////////////////////////

function showResponseForm(formId) {
  const form = document.getElementById(formId);

  if (form.style.display === 'block') {
    form.style.display = 'none'; 
  } else {
    document.querySelectorAll('.response-form').forEach(form => {
      form.style.display = 'none';
    });
    form.style.display = 'block'; 
  }
}


function submitResponse(event, formId) {
  event.preventDefault();
  console.log(`Form ${formId} submitted`);
}

function validateResponseForm(formId) {
  var responseTitle = document.getElementById(`${formId}_title`).value;
  var responseMail = document.getElementById(`${formId}_mail`).value;
  var responseMessage = document.getElementById(`${formId}_message`).value;
  var responseNom = document.getElementById(`${formId}_nom`).value;
  var idReclam = document.getElementById(`${formId}_id_reclam`).value;

  var errorMessage = "";

  if ((responseTitle.length <= 3 )||(responseTitle.length >=50 )) {
    errorMessage += `Please enter a title fo Response of Response id ${formId}.\n`;
  }

  var emailPattern =  /^[^\s@]+[^\s@]+[^\s@]@esprit\.tn$/;
  if (!emailPattern.test(responseMail)) {
    errorMessage += `Please enter an email for Response of reclam id ${formId}.\n`;
  }

  if (responseMessage.length <=10) {
    errorMessage += `Please enter a message for Response of reclam id ${formId}.\n`;
  }

  if (responseNom.length <=3) {
    errorMessage += `Please enter a nom for Response of reclam id ${formId}.\n`;
  }

  if (idReclam.length === 0) {
    errorMessage += `Please enter an ID Reclam for Response of reclam id ${formId}.\n`;
  }

  if (errorMessage !== "") {
    alert(errorMessage);
    return false;
  }
  return true;
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function searchTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.querySelector(".table-responsive"); 

  tr = table.querySelectorAll("tr");

  for (i = 1; i < tr.length; i++) {
    td = tr[i].querySelectorAll("td");
    var found = false; 

    for (var j = 0; j < td.length; j++) {
      txtValue = td[j].textContent || td[j].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        found = true; 
        break;
      }
    }
    tr[i].style.display = found ? "" : "none";
  }
}

function searchTable2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput2");
  filter = input.value.toUpperCase();
  table = document.querySelector(".table-responsive.custom-table");

  if (table) {
      tr = table.querySelectorAll("tr");

      for (i = 1; i < tr.length; i++) {
          td = tr[i].querySelectorAll("td");
          var found = false;

          for (var j = 0; j < td.length; j++) {
              txtValue = td[j].textContent || td[j].innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  found = true;
                  break;
              }
          }

          tr[i].style.display = found ? "" : "none";
      }
  }
}

