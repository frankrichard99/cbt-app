        function openPopup(name, id, email, phone) {
            document.getElementById('editName').value = name;
            document.getElementById('editId').value = id;
            document.getElementById('editEmail').value = email;
            document.getElementById('editPhone').value = phone;
            document.getElementById("editProfilePopup").style.display = "flex";
        }
        
        function closePopup() {
            document.getElementById("editProfilePopup").style.display = "none";
        }
    