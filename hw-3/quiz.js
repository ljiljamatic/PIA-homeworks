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
let inputAnswer = document.querySelector("#inputAnswer");

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
let btnn = document.querySelector(".btnn");

let i = 0;
let index = 0;
let timer = 0;
let interval = 0;

//Score
let correct = 0;

//BTN INPUT ANSWER
btnn.addEventListener('click', ()=>{
    next_question.style.display = "none";
    let ia = inputAnswer.value.toLowerCase();
    console.log(questions2[i-1].answer);
    console.log(ia);
    if(questions2[i-1].answer == ia){
        correct++;
    }
    else{
        correct += 0;
    }

    if(index >= MCQS.length-1 && index < 9 ){
        option1.style.display = "none";
        option2.style.display = "none";
        option3.style.display = "none";
        option4.style.display = "none";
        index++;

        questionText.innerText = questions2[i].question;
        inputAnswer.style.display = "block";

        timer = 0;
        clearInterval(interval);
        interval = setInterval(countDown, 1000);
        i++;
    }

    else{
        index = 0;

        //result section
        clearInterval(interval);
        quiz.style.display= "none";
        result.style.display = "block";
        points.innerText = correct;
    }
})


//Answer
let UserAns = undefined;

//SUBMIT BUTTON
start.addEventListener('click', ()=>{
    btnn.style.display = "none";
    console.log(playerName.value);
    console.log(correct);
    start.style.display = "none";
    playerName.style.display = "none";
    guide.style.display = "block";  
});

//EXIT BUTTON
exit.addEventListener('click', ()=>{
    quiz.style.display = "none";
    result.style.display = "block";
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

    choice_que.forEach(removActive=>{
        removActive.classList.remove("active");
    })
});

choice_que.forEach( (choices, choiceNo) => {
   choices.addEventListener("click", ()=>{
       choices.classList.add("active");
       //check answer
       if(choiceNo === MCQS[index].answer){
           correct++;
       }
       else{
           correct += 0;
       }
       console.log(correct);
       //stop counter
       clearInterval(interval);

       //disable other choices when the answer is selected
       for(let i = 0; i <=3; i++){
           choice_que[i].classList.add("disabled");
       }
   }) 
});

next_question.addEventListener("click", ()=>{
    if(index < MCQS.length-1){
        index++;
        choice_que.forEach(removActive=>{
            removActive.classList.remove("active");
        })

        loadData();
        clearInterval(interval);
        interval = setInterval(countDown, 1000);
    }
    else if(index >= MCQS.length-1 && index < 9 ){
        btnn.style.display = "block";
        next_question.style.display = "none";
        option1.style.display = "none";
        option2.style.display = "none";
        option3.style.display = "none";
        option4.style.display = "none";
        index++;

        questionText.innerText = questions2[i].question;
        inputAnswer.style.display = "block";

        /*timer = 0;*/
        clearInterval(interval);
        interval = setInterval(countDown, 1000);
        i++;
    }

    else{
        index = 0;

        //result section
        clearInterval(interval);
        quiz.style.display= "none";
        result.style.display = "block";
        points.innerText = correct;
    }

    for(let i = 0; i <=3; i++){
        choice_que[i].classList.remove("disabled");
    }
})


quit.addEventListener("click", ()=>{
    result.style.display = "none";
    correct = 0;
    playerName.value = undefined;
})

startAgain.addEventListener("click", ()=>{
    btnn.style.display = "none";
    result.style.display = "none";
    start.style.display = "block";
    playerName.style.display = "block";
    correct = 0;
    index = 0;
    i = 0;
    next_question.style.display = "block";
    option1.style.display = "block";
    option2.style.display = "block";
    option3.style.display = "block";
    option4.style.display = "block";
    inputAnswer.style.display = "none";
})
