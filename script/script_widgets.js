(function () {
  // Aseguramos que el script se ejecute solo después de que la página esté cargada
  window.addEventListener("load", function () {
    // Función para crear e insertar la galería de YouTube en la página
    function createYouTubeGallery(videoIds, containerId) {
      const container = document.getElementById(containerId);
      if (!container) {
        console.error("Contenedor no encontrado");
        return;
      }

      // Limpiar contenido previo (si existe)
      container.innerHTML = "";

      // Crear una cuadrícula para los videos
      const gallery = document.createElement("div");
      gallery.style.display = "grid";
      gallery.style.gridTemplateColumns =
        "repeat(auto-fill, minmax(300px, 1fr))";
      gallery.style.gap = "20px";
      gallery.style.marginTop = "20px";

      // Crear un iframe para cada video
      videoIds.forEach(function (id) {
        const iframe = document.createElement("iframe");
        iframe.src = `https://www.youtube.com/embed/${id}`;
        iframe.width = "100%";
        iframe.height = "200px";
        iframe.style.border = "none";
        iframe.style.borderRadius = "8px";
        iframe.style.boxShadow = "0 4px 10px rgba(0, 0, 0, 0.1)";
        gallery.appendChild(iframe);
      });

      // Agregar la galería al contenedor
      container.appendChild(gallery);
    }

    // Asegurarse de que el script se ejecute solo en páginas donde el contenedor existe
    const videoIds = ["dQw4w9WgXcQ", "KxGRrM0T0hQ", "YbJOTdZBX1g"]; // IDs de los videos
    const containerId = "youtube-gallery"; // ID del contenedor en el HTML donde se insertarán los videos

    // Llamar a la función para crear la galería
    createYouTubeGallery(videoIds, containerId);
  });
})();
