<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería con efecto hover</title>
    <style>
        .contenedor-galeria {
            position: relative;
            width: 100%;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
        }

        .carrusel {
            display: none; /* Ocultar carruseles por defecto */
        }

        .carrusel.activo {
            display: block; /* Solo se muestra el carrusel activo */
        }

        .galeria {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columnas */
            gap: 10px;
        }

        .publicacion {
            position: relative;
            width: 100%;
            height: 450px;
            overflow: hidden;
        }

        .publicacion img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: filter 0.3s ease;
        }

        /* Efecto de oscurecer imagen */
        .publicacion:hover img {
            filter: brightness(50%);
        }

        /* Capa de superposición con texto */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        /* Mostrar la capa al pasar el mouse */
        .publicacion:hover .overlay {
            opacity: 1;
        }

        /* Botones de navegación */
        .btn-anterior,
        .btn-siguiente {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            padding: 15px;
            cursor: pointer;
            font-size: 24px;
            z-index: 10;
        }

        .btn-anterior { left: 10px; }
        .btn-siguiente { right: 10px; }

        .btn-anterior:hover,
        .btn-siguiente:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body>

<div class="contenedor-galeria">
    <div class="carrusel activo">
        <div class="galeria">
            <div class="publicacion">
                <img src="imagenes_prueb/Adventure Time 50.jpeg" class="img-fluid" alt="">
                <div class="overlay">Adventure Time</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/descarga (2).jpeg" class="img-fluid" alt="">
                <div class="overlay">Imagen 2</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/descarga (3).jpeg" class="img-fluid" alt="">
                <div class="overlay">Imagen 3</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/descarga (4).jpeg" class="img-fluid" alt="">
                <div class="overlay">Imagen 4</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/descarga (5).jpeg" class="img-fluid" alt="">
                <div class="overlay">Imagen 5</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/descarga (6).jpeg" class="img-fluid" alt="">
                <div class="overlay">Imagen 6</div>
            </div>
        </div>
    </div>

    <div class="carrusel">
        <div class="galeria">
            <div class="publicacion">
                <img src="imagenes_prueb/descarga (7).jpeg" class="img-fluid" alt="">
                <div class="overlay">Imagen 7</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/Hidan e Kakuzo.jpeg" class="img-fluid" alt="">
                <div class="overlay">Hidan & Kakuzu</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/hunter x hunter.jpeg" class="img-fluid" alt="">
                <div class="overlay">Hunter x Hunter</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/imagen9.jpeg" class="img-fluid" alt="">
                <div class="overlay">Imagen 9</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/imagen10.jpeg" class="img-fluid" alt="">
                <div class="overlay">Imagen 10</div>
            </div>
            <div class="publicacion">
                <img src="imagenes_prueb/imagen11.jpeg" class="img-fluid" alt="">
                <div class="overlay">Imagen 11</div>
            </div>
        </div>
    </div>

    <button class="btn-anterior">&#10094;</button>
    <button class="btn-siguiente">&#10095;</button>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const carruseles = document.querySelectorAll(".carrusel");
    const btnAnterior = document.querySelector(".btn-anterior");
    const btnSiguiente = document.querySelector(".btn-siguiente");
    let indiceActual = 0;

    function mostrarCarrusel(indice) {
        carruseles.forEach((carrusel, i) => {
            carrusel.classList.toggle("activo", i === indice);
        });
    }

    btnSiguiente.addEventListener("click", () => {
        indiceActual = (indiceActual + 1) % carruseles.length;
        mostrarCarrusel(indiceActual);
    });

    btnAnterior.addEventListener("click", () => {
        indiceActual = (indiceActual - 1 + carruseles.length) % carruseles.length;
        mostrarCarrusel(indiceActual);
    });

    mostrarCarrusel(indiceActual);
});

</script>
</body>
</html>
