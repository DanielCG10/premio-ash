document.addEventListener("DOMContentLoaded", function () {
    const mobileMenu = document.getElementById("mobile-menu");
    const navLarge = document.querySelector(".nav-large");

    // Agregar evento de clic para mostrar/ocultar menú de hamburguesa
    mobileMenu.addEventListener("click", function () {
        navLarge.classList.toggle("show");
    });
});
