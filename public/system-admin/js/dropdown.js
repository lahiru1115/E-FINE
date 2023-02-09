function myFunction() {
  document.getElementById("myDropdown").classList.toggle("dropdown-show");

  window.onclick = function (event) {
    if (!event.target.matches('.bx-user')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('dropdown-show')) {
          openDropdown.classList.remove('dropdown-show');
        }
      }
    }
  }
}