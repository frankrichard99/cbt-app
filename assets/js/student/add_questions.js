
function openPopup(id, question_id) {
  document.getElementById(id).style.display = 'flex';
  document.getElementById('del-id').value= question_id;
}

function closePopup(id) {
  document.getElementById(id).style.display = 'none';
}

// Populate modify popup with values
function populateModify(id, question, opt1, opt2, opt3, correct) {
  document.getElementById('hide-id').value = id;
  document.getElementById('mod-question').value = question;
  document.getElementById('mod-option1').value = opt1;
  document.getElementById('mod-option2').value = opt2;
  document.getElementById('mod-option3').value = opt3;
  document.getElementById('mod-correct').value = correct;

  openPopup('modifyQuestionPopup');
}
