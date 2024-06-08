let menuIcon = document.getElementById("menu-icon");
let menuItems = document.getElementById("menuitems");

menuIcon.onclick = () => {
    menuItems.classList.toggle("active");
}
