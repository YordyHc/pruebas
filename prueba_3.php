<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       .modal {
    display: none;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}
.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    width: 80%;
    max-width: 700px; /* Puedes ajustar el tamaño máximo */
    position: relative;
}
.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}
/* Asegurando que el bloque de Instagram sea 100% del ancho */
.instagram-media {
    width: 100% !important;
}
    </style>
</head>
<body>
    <button onclick="abrirModal()">Preione perro</button>

    <div class="modal" id="mymodal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <!-- Aquí se cargará el contenido de Instagram -->
        </div>
    </div>

    <script src="https://www.instagram.com/embed.js"></script>
    <script>
        var modal = document.getElementById("mymodal");

        function abrirModal() {
            // Mostrar el modal
            modal.style.display = "flex";
            var permalink = "https://www.instagram.com/p/Cpf8kXGu3Se/";
            // Cargar el contenido de Instagram
            const modalContent = document.querySelector('.modal-content');
            modalContent.innerHTML += `
                <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="${permalink}?utm_source=ig_embed&utm_campaign=loading" data-instgrm-version="14"></blockquote>
                <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CsUW_kIOB46/?utm_source=ig_embed&utm_campaign=loading" data-instgrm-version="14"></blockquote>
            `;

            // Procesar el contenido de Instagram
            window.instgrm.Embeds.process();
        }

        function cerrarModal() {
            // Ocultar el modal
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
