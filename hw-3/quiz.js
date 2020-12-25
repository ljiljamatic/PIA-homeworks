/*var questionsJSON = undefined;
fetch('fajl.json').then(function(response){
    return response.json();
}).then(function(data){
    questionsJSON = data;
});

var questions2;
fetch('questionss1.json').then(function (response) {
			return response.json()
		}).then(function (data) {
            questions2 = data;
		});
questionsJSON = JSON.parse(questionsJSON);*/

//Start Section

let start = document.querySelector("#start");
let playerName = document.querySelector("#name");
let nameScore = document.querySelector("#nameScore");
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
let prompt = document.querySelector("#prompt");
let naslov = document.querySelector("#naslov");

let i = 0;
let index = 0;
let timer = 0;
let interval = 0;

//Score
let correct = 0;

//BTN INPUT ANSWER
btnn.addEventListener('click', ()=>{
    let ia = inputAnswer.value.toLowerCase();
    if(questions2[i-1].answer == ia){
        correct++;
        prompt.innerHTML = "TRUE!!";
    }
    else{
        correct += 0;
        prompt.innerHTML = "FALSE!!" + " Correct: " + questions2[i-1].answer ;
    }

    timer = 0;
    clearInterval(interval);
    interval = setInterval(changeTime, 1000);
})


//Answer
let UserAns = undefined;
let username;

//SUBMIT BUTTON
start.addEventListener('click', ()=>{
    btnn.style.display = "none";
    console.log(playerName.value);
    console.log(correct);
    username = playerName.value;
    start.style.display = "none";
    playerName.style.display = "none";
    guide.style.display = "block";  
});

//EXIT BUTTON
exit.addEventListener('click', ()=>{
    quiz.style.display = "none";
    result.style.display = "block";
});

let changeTime = ()=>{
    if (timer === 3){
        clearInterval(interval);
        next_question.click();
    }
    else{
        timer++;
        time.innerHTML = timer;
    }
}

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
    questionText.innerText = questionsJSON[index].question;
    option1.innerText = questionsJSON[index].choice1;
    option2.innerText = questionsJSON[index].choice2;
    option3.innerText = questionsJSON[index].choice3;
    option4.innerText = questionsJSON[index].choice4;

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
       if(choiceNo === questionsJSON[index].answer){
           correct++;
           naslov.innerHTML = "TRUE!!";
           timer = 0;
           clearInterval(interval);
           interval = setInterval(changeTime, 1000);
       }
       else{
           correct += 0;
           let ch = questionsJSON[index].answer + 1;
           naslov.innerHTML = "FALSE!!" + " Correct choice " + ch + ".";
           timer = 0;
           clearInterval(interval);
           interval = setInterval(changeTime, 1000);
       }

       //disable other choices when the answer is selected
       for(let i = 0; i <=3; i++){
           choice_que[i].classList.add("disabled");
       }
   }) 
});

next_question.addEventListener("click", ()=>{
    naslov.innerHTML = "";
    if(index < questionsJSON.length-1){
        index++;
        choice_que.forEach(removActive=>{
            removActive.classList.remove("active");
        })

        loadData();
        clearInterval(interval);
        interval = setInterval(countDown, 1000);
    }
    else if(index >= questionsJSON.length-1 && index < 9 ){
        btnn.style.display = "block";
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
        prompt.innerHTML = "";    
        inputAnswer.value = "";
    }

    else{
        index = 0;

        //result section
        clearInterval(interval);
        quiz.style.display= "none";
        result.style.display = "block";
        points.innerText = correct;
        loadResults();
        showResults();
        document.getElementById("bestResults").style.display = "";

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

startAgain.addEventListener("click", ()=> {
    window.location.href = "quiz.html";
})

let loadResults = () =>{
    let names = JSON.parse(localStorage.getItem("names"));
    let points = JSON.parse(localStorage.getItem("points"));
    if(points==null){
        points = [];
        names = [];
        names.push(username);
        points.push(correct);
    }
    else{
        var x;
        var y;
        for(var i=0;i<names.length;i++){
            if(points[i]<correct){
                x = names[i];
                y = points[i]
                names[i] = username;
                points[i] = correct;
                username = x;
                correct = y;
            }
            else if(points[i]==correct){
                if(names[i]>username){
                    x = names[i];
                    y = points[i]
                    names[i] = username;
                    points[i] = correct;
                    username = x;
                    correct = y;
                }
            }
        }
        names.push(username);
        points.push(correct);
    }
    if(points.length<11){
        localStorage.setItem("names", JSON.stringify(names));
        localStorage.setItem("points", JSON.stringify(points));
    }
}


//tabela
let showResults = () =>{
    let names = JSON.parse(localStorage.getItem("names"));
    let points = JSON.parse(localStorage.getItem("points"));
    for(var i=0;i<points.length;i++){
        console.log("player"+(i+1).toString())
        document.getElementById("player"+(i+1).toString()).innerHTML = names[i];
        document.getElementById("result"+(i+1).toString()).innerHTML = points[i];
    }
}