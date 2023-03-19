// Prevent resubmission when refreshing the page
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

//Prevent default submission / Prevent reloading page
var buttons = document.querySelectorAll("input[type=submit]");
buttons.forEach((button) => {
  button.addEventListener("click", function (event) {
    event.preventDefault();
  });
});
