
function openEditPopup(name, email, matric, department) {

    document.getElementById('name').value = name;
    document.getElementById('email').value = email;
    document.getElementById('matric').value = matric;
    document.getElementById('hide-id').value = matric;
    document.getElementById('department').value = department;
    document.getElementById('editProfilePopup').style.display = 'flex';
}
function closeEditPopup() {
    document.getElementById('editProfilePopup').style.display = 'none';
}
