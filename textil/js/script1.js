document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".btn");

  buttons.forEach((button) => {
    button.addEventListener("mouseover", () => {
      button.style.transform = "scale(1.05)";
    });

    button.addEventListener("mouseout", () => {
      button.style.transform = "scale(1)";
    });

    button.addEventListener("click", () => {
      button.style.transform = "scale(0.95)";
    });
  });
});
