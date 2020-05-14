<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Gaming Quiz</title>

    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="index_quiz.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">

<body>
  <section>
  <header>
  <h1 class="title">Gaming Quiz</h1>
  <p style="text-align:center; color:#fff;">Answer all the questions and submit your answers</p>
</header>

<div class="form">
  <form action="" id="formQuiz" class="form-quiz">
  </form>
  <div class="quiz-score">
  <div class="bio"> 
  <p class="text-moving2"><span class="red">C</span><span class="blue">o</span>n<span class="purple">g</span><span class="green">r</span>a<span class="red">t</span>u<span class="blue">l</span>a<span class="purple">t</span>i<span class="green">o</span><span class="red">n</span><span class="blue">s</span></p> 
  </div>
    <p class="quiz-score-number" style="font-size:30px; font-weight:bold;"></p>
  </div>
  <div class="container">
    <a href="#" class="form-quiz-prev">Previous</a>
    <a href="#" class="form-quiz-next">Next</a>
  </div>
</div>
<!-- --> 
</section>
<script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
/*
 - add validation
 - modify score message to reflect the score
 - fix the previous button bug
 - add a question number to each question
*/

var questions = [{
    question: '<span style="color:#fff;">In what year was Sega Genesis released in North America?</span>',
    choices: ["1989", "1999", "1975", "1991"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">Which of the following video games takes place in a dystopian underwater city called Rapture?</span>',
    choices: ["Bioshock", "Half-Life", "God Of War", "Fallout 3"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">What Nintendo system was released after the N64 and before the Wii?</span>',
    choices: ["Gamecube", "Nintendo 128", "Virtual Boy", "Super Nintendo"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">Honda, Dhalsim and Chun Li are all characters from what video game series?</span>',
    choices: ["Street Fighter", "Teenage Mutant Ninja Turtles", "Battletoads", "Mortal Kombat"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">What color is the ring of death on an XBOX that signifies a hardware failure?</span>',
    choices: ["Red", "Blue", "Yellow", "Green"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">What classic beat-em-up game featured brothers Billy Lee and Jimmy (also nicknamed Spike and Hammer)?</span>',
    choices: ["Double Dragon", "Smash Brothers", "Ninja Gaiden", "Snow Brothers"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">How many bits was the Super Nintendo Entertainment System?</span>',
    choices: ["16", "8", "128", "64"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">What character do you play as in The Legend Of Zelda?</span>',
    choices: ["Link", "Gandolf", "Chimmy", "Peter"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">What 64-bit Sega system was a predecessor to the PlayStation and Nintendo 64?</span>',
    choices: ["Saturn", "Dreamcast", "Commodore 128", "3D0"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">The game Grand Theft Auto was released primarily for what gaming system?</span>',
    choices: ["Playstation", "Dreamcast", "XBOX", "NES"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">Which James Bond film was made into a game for the Nintendo 64 console and later for the Wii console?</span>',
    choices: ["Goldeneye", "Thunderball", "Moonraker", "Goldfinger"],
    correct: 0
  }, {
    question: '<span style="color:#fff;">Which popular video game features an ex-Special Forces operator named Jack Carver, who is stranded in Micronesia?</span>',
    choices: ["Far Cry", "Halo 2", "Left 4 Dead", "Max Payne"],
    correct: 0
  }];

function main() {

  $('.quiz-score').hide();
  populate();
  
  $('.form-quiz-next').click(function() {
     
    var currentQuestion = $('.active-group');
    var nextQuestion = currentQuestion.next();
    
    // get all the correct answers
    var correctAnswers = [];
           
    for (var i = 0; i < questions.length; i++) {
      correctAnswers[i] = questions[i].choices[0];
    }
    
    
    if (nextQuestion.length === 0) {
      
      var score = 0;
      
      // get all the choices and store them
      var allChoices = $('.form-quiz-group-option');
            
      // get the question length
      var questionsLength = questions.length;
             
      // get all selected answers
      var selectedAnswers = [];
      
      for (var j = 0; j < allChoices.length; j++) { // loop through all choices
        if (allChoices[j].checked) { // if a choice is checked
          for (var k = 0; k < questionsLength; k++) { // add it to the arr
            selectedAnswers[k] = allChoices[j].value;
            
            if (selectedAnswers[k] === correctAnswers[k]) { // check it against saved answers
              score += 1;
            }
          }
        }
      }
            
      $('.form-quiz-next').hide();
      $('.form-quiz-prev').hide();
      $('#formQuiz').hide();
      
      $('.quiz-score').show();
      $('.quiz-score-number').text('Your score is ' + score);
    }

    currentQuestion.removeClass('active-group').fadeOut(100);
    nextQuestion.addClass('active-group').fadeIn(200);
  });
  
  $('.form-quiz-prev').click(function(){
    var currentQuestion = $('.active-group');
    var previousQuestion = currentQuestion.prev();
    
    if (previousQuestion === 0) {
      $('.form-quiz-prev').hide();
    }
    
    currentQuestion.removeClass('active-group').fadeOut(50);
    previousQuestion.addClass('active-group').fadeIn(50);
  });

  var allChoices = $('.form-quiz-group-option');
  
  for (var index = 0; index < allChoices; index++) {
    if (allChoices[index].checked) {
      score += 1;
    }
  }

}

function populate() {

  var theForm = document.getElementById("formQuiz");
  var choices;

  // loop through all the questions to print each in their own container
  for (var index = 0; index < questions.length; index++) {

    choices = questions[index].choices;

    // create a container, question and the choice box
    var container = document.createElement('div');
    container.className = "form-quiz-group";

    var question = document.createElement('p');
    question.className = "form-quiz-group-question";
    question.innerHTML = questions[index].question;

    var choiceBox = document.createElement('div');
    choiceBox.className = "form-quiz-group-choices-q" + index;

    var choice, label, randId;

    theForm.appendChild(container);
    container.appendChild(question);
    container.appendChild(choiceBox);

    for (var j = 0; j < choices.length; j++) {
      randId = Math.random() * 50;   
      
      label = document.createElement('label');
      label.setAttribute('for', 'choice' + randId);
      label.innerHTML = choices[j] + '<br>';
      
      choice = document.createElement('input');
      choice.className = "form-quiz-group-option";
      choice.setAttribute('type', 'radio');
      choice.setAttribute('name', 'choices' + index);
      choice.setAttribute('value', choices[j])
      choice.setAttribute('id', 'choice' + randId);
      
      choiceBox.appendChild(choice);
      choiceBox.appendChild(label);
    }
  }
  
  $('.form-quiz-group:first-child').addClass('active-group');
  
}

// validate the selection
function validateSelection () {
  
}

$(document).ready(main);


  </script>

</body>
</html>