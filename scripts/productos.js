/* Definimos los productos por id en un array */

const productos = [
    {
        id: 1,
        nombre: "Taza de Ceramica Nacional",
        descripcion: "Dimensiones: 9,5cm de alto por 8cm de diametro",
        precio: "$8000",
        imagen: "imgs/TazaCeramicaNacional.png",
    },
    {
        id: 2,
        nombre: "Botella de Plastico 500cc",
        descripcion: "Botella de plastico no hermetica. Dimensiones: 16cm de alto por 7,5cm de diametro",
        precio: "$16000",
        imagen: "imgs/botellaHomero.png",
    },
    {
        id: 3,
        nombre: "Botella de Aluminio",
        descripcion: "Botella de aluminio hermetica. Dimensiones: 16cm de alto por 7,5 de diametro",
        precio: "$18000",
        imagen: "imgs/botellaAluminio.png",
    },
    {
        id: 4,
        nombre: "Taza de Plastico",
        descripcion: "Dimensiones: 9,5cm de alto por 8cm de diametro",
        precio: "$4000",
        imagen: "imgs/tazaPlastico.png",
    },
    {
        id: 5,
        nombre: "Vaso de Cafe",
        descripcion: "Vaso de cafe de plastico no hermetico",
        precio: "$8000",
        imagen: "imgs/vasoCafe.png",
    },
    {
        id: 6,
        nombre: "Mate de Ceramica",
        descripcion: "Dimensiones: 9cm de alto y 8cm de diametro",
        precio: "$9000",
        imagen: "imgs/mateChico.png",
    }
]

/* Script para modificar el contenido de "producto.html" dependiendo del id */
const params = new URLSearchParams(window.location.search);
const id = parseInt(params.get("id"));

const producto = productos.find(p => p.id === id);

const img = document.querySelector(".container-productInfo img");
const nombre = document.querySelector(".container-productInfo h2");
const descripcion = document.querySelector(".container-productInfo p");
const precio = document.querySelector(".container-productInfo b");

img.src = producto.imagen;
img.alt = producto.nombre;
nombre.textContent = producto.nombre;
descripcion.textContent = producto.descripcion;
precio.textContent = producto.precio;