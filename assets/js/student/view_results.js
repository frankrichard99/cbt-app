
function openResultModal(title, code, score, status, date) {
  document.getElementById('modal-title').innerText = title;
  document.getElementById('modal-code').innerText = code;
  document.getElementById('modal-score').innerText = score;
  document.getElementById('modal-status').innerText = status;
  document.getElementById('modal-date').innerText = date;
  document.getElementById('resultModal').style.display = 'flex';
}

function closeModal() {
  document.getElementById('resultModal').style.display = 'none';
}


document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('search');
  const tableRows = document.querySelectorAll('.results-table tbody tr');

  searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.toLowerCase();

    tableRows.forEach(row => {
      const courseTitle = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
      const testId = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
      const dateTaken = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
      let rowMatch = courseTitle.includes(searchTerm) || testId.includes(searchTerm) || dateTaken.includes(searchTerm);

      if (rowMatch) {
        row.style.display = ''; // Show the row
      } else {
        row.style.display = 'none'; // Hide the row
      }
    });
  });
});