// script.js
document.addEventListener("DOMContentLoaded", function() {
  const searchInput = document.getElementById("searchBar");
  const itemsList = document.querySelector("#items-list ul");

  searchInput.addEventListener("keyup", function() {
    const filter = searchInput.value.toLowerCase();
    const liElements = itemsList.getElementsByTagName("li");

    for (let i = 0; i < liElements.length; i++) {
      let itemText = liElements[i].textContent || liElements[i].innerText;
      liElements[i].style.display = itemText.toLowerCase().indexOf(filter) > -1 ? "" : "none";
    }
  });
});
