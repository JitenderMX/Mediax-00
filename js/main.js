// Loading Common Element Using External File
$("#header").load("header.html");
$("#footer").load("footer.html");
$("#let-connect").load("lets-connect.html");
$("#apply-form").load("career-form.html");

// AOS Js (Reveal Animation)
AOS.init();

/* 
// Function to handle loading content based on page value
function loadContent(page) {
  // List of valid page values
  var validPages = ['home', 'about', 'project', 'service', 'career', 'contact', 'apply'];

  // Check if the extracted page value is valid
  if (!page) {
    // If there is no value after '#', load the home.html page by default
    $('body,html').animate({ scrollTop: 0 }, 10);

    $('main').load('home.html', initializeOtherJs);
  } else if (validPages.includes(page)) {
    // If the page value is valid, load corresponding HTML content into the main tag
    $('body,html').animate({ scrollTop: 0 }, 10);

    $('main').load(page + '.html', initializeOtherJs);
  } else {
    // If the page value is not valid, load the 404.html page
    $('body,html').animate({ scrollTop: 0 }, 10);

    $('main').load('404.html', initializeOtherJs);
  }
} 
*/
// Function to initialize the Slick slider
// function initializeOtherJs() {
  // Handle click event for Page Load Link
  $('a.page-load-link').on('click', function (e) {
    // e.preventDefault();
    // Get the value after '#' from the href attribute
    var page = $(this).attr('href').substring(1);
    // alert(page);
    // Call the function to load content based on page value
    loadContent(page);
  });
  $(".sa-left-box").on('click', function () {
    $(this).parent().toggleClass("active");
    //  $(this).parent().toggleClass("d-flex");
  })

  $('.service-box h4').hover(function () {
    let childClass = "child-" + $(this).parent().index();
    $("#service-sec").attr("class", "service");
    $("#service-sec").addClass(childClass);
  });
// }
$(document).ready(function () {
  $(window).on('hashchange', function () {
    var initialPage = window.location.hash.substring(1);
    loadContent(initialPage);
  });
  // Load content on window load
  var initialPage = window.location.hash.substring(1);
  loadContent(initialPage);
});