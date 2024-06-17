document.addEventListener("DOMContentLoaded", function () {
  const dateElement = document.getElementById("current-date");
  const options = { year: "numeric", month: "long", day: "numeric" };
  const today = new Date().toLocaleDateString("es-ES", options);
  dateElement.textContent = today;
});
