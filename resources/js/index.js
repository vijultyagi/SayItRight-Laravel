$(function(){
  $("#nav-placeholder").load("../assets/header.html");
});

$("#contactSubmit").on("click", function(e) {
  var fn = $('#fn').val();
  var ln = $('#ln').val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  var query = $('#query').val();
  if (fn && ln && phone && email && query)
    alert("Query Submitted Successfully!")
});
