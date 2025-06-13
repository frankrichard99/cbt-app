
    function openDeletePopup(id , courseName) {
        document.getElementById("hide-id").value = id;
        document.getElementById("deleteMessage").innerText = `Are you sure you want to delete ${courseName}?`;
        document.getElementById("deletePopup").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("deletePopup").style.display = "none";
    }



    //MODIFY

    function openModifyCoursePopup(id,courseCode, courseName, numQuestions, timeLimit) {

        document.getElementById("hide-mod").value = id;
        document.getElementById("CourseId").value = courseCode;
        document.getElementById("CourseName").value = courseName;
        document.getElementById("NumQuestions").value = numQuestions;
        document.getElementById("TimeLimit").value = timeLimit;
        
        document.getElementById("modifyPopup").classList.add("show");
        document.getElementById("popup-box").classList.add("show");
    }

    function closeModifyCoursePopup() {
        document.getElementById("modifyPopup").classList.remove("show");
        document.getElementById("popup-box").classList.remove("show");
  

    }

    function saveModifyCourse() {
       

        closeModifyCoursePopup();
    }

