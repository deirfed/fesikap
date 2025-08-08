window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
    preloader.classList.add("fade-out");
    setTimeout(() => preloader.remove(), 1000);
});

document.addEventListener("DOMContentLoaded", function () {
    const alert = document.querySelector(".alert");
    if (alert) {
        setTimeout(() => {
            alert.classList.add("fade-out");
        }, 2000);
    }
});
