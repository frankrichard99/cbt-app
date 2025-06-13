document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".progress-circle").forEach(circle => {
      let percent = circle.getAttribute("data-percent");
      circle.style.background = `conic-gradient(#3498db 0% ${percent}%, #ddd ${percent}% 100%)`;
      circle.querySelector(".progress-text").innerText = percent + "%";
  });
});
