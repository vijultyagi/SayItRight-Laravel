// $("#btnregister").on("click", function (e) {
//   var loginform = document.getElementById("loginform");
//   var registerform = document.getElementById("registerform");
//   loginform.style.display = "none";
//   registerform.style.display = "block";
//   return false;
// });

// $("#btnlogin").on("click", function (e) {
//   var loginform = document.getElementById("loginform");
//   var registerform = document.getElementById("registerform");
//   loginform.style.display = "block";
//   registerform.style.display = "none";
//   return false;
// });

$("#btnsignin").on("click", function (e) {
  var UserName = $('#txtLUName').val().split('@');
  var Password = $('#txtLPwd').val();
  if (UserName[0].toLowerCase() === "student") {
    window.location.href = "../student/";
  }
  if (UserName[0].toLowerCase() === "professor") {
    window.location.href = "../professor/";
  }
  if (UserName[0].toLowerCase() === "advisor") {
    window.location.href = "../advisor/";
  }
  if (UserName[0].toLowerCase() === "admin") {
    window.location.href = "../super-admin/";
  }
});

  $("#btnreg").on("click", function(e) {
    var name = $('#txtRName').val();
    var uname = $('#txtRUName').val();
    var password = $('#txtRPwd').val();
    var rePassword = $('#txtRPwdcheck').val();
    var regularExpression = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,16}$");

    if (name && uname && password && rePassword)
    {
      if (!regularExpression.test(password)) {
        alert("Password should be between 8 to 16 digits and should be alphanumeric with atleast 1 uppercase , 1 lowercase letter and a special character");
        return false;
      }
      else if(password != rePassword)
        alert("Password doesn't match")
      else
        alert("Registered Successfully!")
    }
  });