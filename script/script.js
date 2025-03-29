// Obtener el modal, el iframe, y el botón de cerrar
var modal = document.getElementById("videoModal");
var iframe = document.getElementById("videoIframe");
var modalIframe = document.getElementById("modalIframe");
var span = document.getElementById("closeModal");

// Al hacer clic en el iframe, abrir el modal
iframe.onclick = function () {
  var videoSrc = iframe.src; // Obtener el src del iframe
  modalIframe.src = videoSrc; // Establecer el src del iframe dentro del modal
  modal.style.display = "block"; // Mostrar el modal
};

// Al hacer clic en la X (cerrar), ocultar el modal y detener el video
span.onclick = function () {
  modal.style.display = "none"; // Ocultar el modal
  modalIframe.src = ""; // Detener la reproducción del video
};

// Si se hace clic fuera del modal, también se cierra el modal
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none"; // Ocultar el modal
    modalIframe.src = ""; // Detener la reproducción del video
  }
};
