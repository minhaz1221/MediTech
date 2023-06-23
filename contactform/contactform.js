$(function() {
  $("#contactForm").submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "contactform/contactform.php",
      data: { id: 1 },
      dataType: "jsonp",
      cors: true,
      contentType: "application/json",
      secure: true,
      headers: {
        "Access-Control-Allow-Origin": "*"
      },
      success: function(response) {
        console.log(response);
      }
    });
  });
});
