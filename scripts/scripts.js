//Script simple para abrir el menú hamburguesa
const menuIcon = document.querySelector('.navbar img');
const menu = document.querySelector('.navbar-menu');

menuIcon.addEventListener('click', () => {
    menu.classList.toggle('active');
});

//Script para cerrar el menú hamburguesa si detecta un clic fuera del menu
document.addEventListener('click', (e) => {
    if (!menu.contains(e.target) && !menuIcon.contains(e.target)) {
        menu.classList.remove('active');
    }
});

//Mismo script pero para mostrar las opciones de usuario
const userIcon = document.querySelector('.userLogIn');
const userMenu = document.querySelector('.user-menu');

if (userIcon) {
    userIcon.addEventListener('click', () => {
        userMenu.classList.toggle('active');
    });
}

document.addEventListener('click', (e) => {
    if (!userMenu.contains(e.target) && !userIcon.contains(e.target)) {
        userMenu.classList.remove('active');
    }
});

//Script para mostrar un mensaje y redirigir al index una vez se simule la compra
document.addEventListener("DOMContentLoaded", () => {
    const formCompra = document.getElementById("formCompra");

    if (formCompra) {
        formCompra.addEventListener("submit", function(e) {
            e.preventDefault(); // Evita que recargue la página
            alert("Compra simulada exitosamente!");
            window.location.href = "index.html"; // Redirección al index
        });
    }
});

//Script para un carusel en el banner del index

document.addEventListener("DOMContentLoaded", () => {
    const banner = document.querySelector(".banner");
    const mobileVer = window.matchMedia("(max-width: 768px)").matches;

    //TODO: mejorar la calidad de las imagenes
    const banners = [
        "imgs/banner.jpg",
        "imgs/banner2.jpg",
        "imgs/banner3.jpg"
    ];
    
    const bannersMobile = [
        "imgs/bannerMobile.png",
        "imgs/bannerMobile2.jpg",
        "imgs/bannerMobile3.jpg"
    ];

    const imagenes = mobileVer ? bannersMobile : banners;

    let indice = 0;

    function carousel() {
        indice = (indice + 1) % imagenes.length;
        banner.style.backgroundImage = `linear-gradient(to bottom, #00000031, #0000000a), url('${imagenes[indice]}')`;
    }

    setInterval(carousel, 5000);
});