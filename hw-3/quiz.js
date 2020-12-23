//Start Section

let start = document.querySelector("#start");
let playerName = document.querySelector("#name");
//Quide section

let guide = document.querySelector("#guide");
let exit = document.querySelector("#exit");
let continueBtn = document.querySelector("#continue");

//Quiz section

let quiz = document.querySelector("#quiz");
let time = document.querySelector("#time");

//Question section
let questionNo = document.querySelector("#questionNo");
let questionText = document.querySelector("#questionText");

//Answers
let option1 = document.querySelector("#option1");
let option2 = document.querySelector("#option2");
let option3 = document.querySelector("#option3");
let option4 = document.querySelector("#option4");

//Score and next question
let total_correct = document.querySelector("#total_correct");
let next_question = document.querySelector("#next_question");

//Result section
let result = document.querySelector("#result");
let points = document.querySelector("#points");
let quit = document.querySelector("#quit");
let startAgain = document.querySelector("#startAgain");

//Choices 
let choice_que = document.querySelectorAll(".choice_que");

let index = 0;
let timer = 0;
let interval = 0;

//Score
let correct = 0;

//Answer
let UserAns = undefined;

//SUBMIT BUTTON
start.addEventListener('click', ()=>{
    start.style.display = "none";
    playerName.style.display = "none";
    guide.style.display = "block";  
});

//EXIT BUTTON
exit.addEventListener('click', ()=>{
    start.style.display = "block";
    playerName.style.display = "block";
    guide.style.display = "none";
});

//TIMER
let countDown = ()=>{
    if(timer === 20){
        clearInterval(interval);
        next_question.click();
    }
    else{
        timer++;
        time.innerText = timer;
    }
}

//setInterval(countDown, 1000);

let loadData = ()=>{
    questionNo.innerText = index + 1 + ". ";
    questionText.innerText = MCQS[index].question;
    option1.innerText = MCQS[index].choice1;
    option2.innerText = MCQS[index].choice2;
    option3.innerText = MCQS[index].choice3;
    option4.innerText = MCQS[index].choice4;

    //start timer
    timer = 0;
}

loadData();

//CONTINUE BUTTON
continueBtn.addEventListener('click', ()=>{
    quiz.style.display = "block";
    guide.style.display = "none";
    interval = setInterval(countDown, 1000);
    loadData();
});

choice_que.forEach((choices, choiceNo) => {
   choices.addEventListener("click", ()=>{
       choices.classList.add("active");
       //check answer
       if(choiceNo === MCQSP[index].answer){
           correct++;
       }
       else{
           correct += 0;
       }

       //stop counter
       clearInterval(interval);
   }) 
});