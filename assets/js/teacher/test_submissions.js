function openPopup(name, id, score, date, ans) {

  document.getElementById("popupStudent").textContent = name;
  document.getElementById("popupTest").textContent = id;
  document.getElementById("popupScore").textContent = score;
  document.getElementById("popupDate").textContent = date;
  document.getElementById("popupCorrect").textContent = ans;
  document.getElementById("submissionPopup").style.display = "flex";
}
function closePopup() {
  document.getElementById("submissionPopup").style.display = "none";
}