document.addEventListener("DOMContentLoaded", function() {
    let sidebar = document.querySelector(".sidebar");
    let btn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }

    searchBtn.onclick = function() {
        sidebar.classList.toggle("active");
    }

    let activeSidebar = localStorage.getItem("sidebarActive");
    if (activeSidebar === "true") {
        sidebar.classList.add("active");
    }
});