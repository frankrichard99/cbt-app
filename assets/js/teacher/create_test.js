// Open Pop-up
function openPopup() {
  document.getElementById("popup").classList.add("show");
  document.querySelector(".popup").classList.add("show");
}

// Close Pop-up
function closePopup() {
  document.getElementById("popup").classList.remove("show");
  document.querySelector(".popup").classList.remove("show");

  // Reset Form
  document.getElementById("testForm").reset();
}
