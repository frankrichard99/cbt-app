

let numbers = document.querySelectorAll(".question-box");

numbers.forEach((number) => {
  number.addEventListener('click', () => {
    saveAnswer();
    let num = number.textContent;
    num = num - 1;
    displayQuestion(num);
  })
})


let structured_questions = question_record.map((q_array) => {
  const [text, option_1, option_2,option_3, correct_option] = q_array;
  let options = [option_1, option_2, option_3, correct_option];

  options = options.sort(()=> Math.random() - 0.5);

  return{
    question: text,
    options: options,
    correct: correct_option
  }

});
console.log(structured_questions);

let answers = new Array(structured_questions.length).fill(null); 

let currentIndex;
//show question based on index
function displayQuestion(index) {

  const q = structured_questions[index];
  const selected = answers[index];

  currentIndex = index;
 
  let html = `<p class="question-text">${q.question}</p> <div class="options">`;

  q.options.forEach((opt, i) => {
      const isChecked = (selected === opt) ? 'checked' : '';
      html += `
          <label>
            <input type="radio" name="option" value="${opt}" ${isChecked}>
            ${opt}
          </label>`;
  });
  html+= `</div>`;
  document.querySelector(".question-section").innerHTML = html;

  if(index == 0){
    document.querySelector('.prev-btn').style = "visibility:hidden";
  }
  else{
    document.querySelector('.prev-btn').style = "visibility: visible";
  }

  if(index >= structured_questions.length - 1){
    document.querySelector('.next-btn').style = "visibility:hidden";
  }
  else{
    document.querySelector('.next-btn').style = "visibility: visible";
  }


  for(let i = 0; i < numbers.length; i++){
    numbers[i].classList.remove('active');
  }

  numbers[currentIndex].classList.add('active');


}

//store answer
function saveAnswer() {
  const selected = document.querySelector('input[name="option"]:checked');
  if (selected) {
      answers[currentIndex] = selected.value;

      
      numbers[currentIndex].classList.add('answered');
  }

}

//spin up next question
function nextQuestion() {
  saveAnswer();
  if (currentIndex < structured_questions.length - 1) {
      currentIndex++;
      

      //numbers[currentIndex - 1].classList.remove('active');
      displayQuestion(currentIndex);
  }
  else{
    
  }

}

//spin up previous question
function prevQuestion() {
  saveAnswer();
  if (currentIndex > 0) {
      currentIndex--;
      
      //numbers[currentIndex + 1].classList.remove('active');
  
      displayQuestion(currentIndex);
  }
  else{
    document.querySelector('.next-btn').style = "display:block";
  }
}

//submit
function finishTest() {
  saveAnswer();
  const results = structured_questions.map((q, i) => {
      return {
          question: q.question,
          selected: answers[i],
          correct: q.correct,
          isCorrect: answers[i] === q.correct
      };
  });


  //let resultArray = results;

  


// Create a hidden form
let form = document.createElement("form");
form.method = "POST";
form.action = "submit_test.php";
form.style.display = "none";



// Create input to hold the result array
let input = document.createElement("input");
input.type = "hidden";
input.name = "results"; // PHP will access this via $_POST['results']
input.value = JSON.stringify(results);

// Append input to form
form.appendChild(input);

// Append form to body
document.body.appendChild(form);


form.submit();



setTimeout(() => {
  
document.querySelector(".main").innerHTML = `
<p class="error-p">
    TEST COMPLETED
</p>
`;
}, 500);


  

}

window.addEventListener("DOMContentLoaded", (event) =>{
  window.alert("Encrypted");
  displayQuestion(0);
});




let timeDisplay = document.querySelector('#time-left');

let timeRemaining = duration * 60; // Convert to seconds

// Function to update the timer
function updateTimer() {
  // Calculate minutes and seconds
  let minutes = Math.floor(timeRemaining / 60);
  let seconds = timeRemaining % 60;

  minutes = minutes.toString().padStart(2, '0');
  seconds = seconds.toString().padStart(2, '0');
  
  // Display the timer
  document.querySelector('.min').textContent = minutes;
  document.querySelector('.sec').textContent = seconds;
  
  if(minutes < 5){
    timeDisplay.style = "color: red";
  }

  // Decrease the time remaining by one second
  if (timeRemaining > 0) {
    timeRemaining--;
  } 
  else {
    clearInterval(timerInterval); // Stop the timer when it reaches 0
    alert("Time's up!");
    finishTest();
  }
}

// Start the timer
let timerInterval = setInterval(updateTimer, 1000); // Update every second





