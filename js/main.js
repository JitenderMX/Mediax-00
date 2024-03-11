// Loading Common Element Using External File
$("#header").load("header.html");
$("#footer").load("footer.html");
$("#let-connect").load("lets-connect.html");
$("#apply-form").load("career-form.html");

// AOS Js (Reveal Animation)
AOS.init({});


$('.service-box h4').hover(function () {
  let childClass = "child-" + $(this).parent().index();
  $("#service-sec").attr("class", "service");
  $("#service-sec").addClass(childClass);
});

