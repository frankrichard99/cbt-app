
function showPopup(id, name, email, courses, tests, score) {
    document.getElementById('popupId').innerText = id;
    document.getElementById('popupName').innerText = name;
    document.getElementById('popupEmail').innerText = email;
    document.getElementById('popupCourses').innerText = courses;
    document.getElementById('popupTests').innerText = tests;
    document.getElementById('popupScore').innerText = score;
    document.getElementById('popupOverlay').style.display = 'flex';
}

function closePopup() {
    document.getElementById('popupOverlay').style.display = 'none';
}
