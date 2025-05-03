let score = 0;
let answeredQuestions = 0;
const totalQuestions = 10;
let answersChecked = Array(totalQuestions).fill(false);

function selectAnswer(button, isCorrect, questionIndex) {
    if (answersChecked[questionIndex]) return;

    answersChecked[questionIndex] = true;
    answeredQuestions++;

    const buttons = button.parentElement.querySelectorAll('button');

    buttons.forEach(btn => {
        btn.disabled = true;
        const btnIsCorrect = btn.onclick.toString().includes("selectAnswer(this, 1,");
        if (btnIsCorrect) {
            btn.style.backgroundColor = 'green';
            btn.style.color = 'white';
        }
        if (btn === button && !btnIsCorrect) {
            btn.style.backgroundColor = 'red';
            btn.style.color = 'white';
        }
    });

    if (isCorrect) {
        score++;
    }

    console.log("Answered Questions:", answeredQuestions);
    console.log("Score:", score);

    updateProgressBar();
}

function calculateResult() {
    if (answeredQuestions < totalQuestions) {
        alert("Please answer all questions before seeing your result!");
        return;
    }

    const resultMessage = `
        <h2>🎯 Your Score : ${score*10} %</h2>
    `;

    const resultDiv = document.getElementById("result");
    if (!resultDiv) {
        console.error("Error: 'result' div not found in the HTML.");
        return;
    }

    resultDiv.innerHTML = resultMessage;
    resultDiv.style.display = "block";
}

function updateProgressBar() {
    const percentage = (answeredQuestions / totalQuestions) * 100;
    document.getElementById('progress-bar').style.width = percentage + '%';
}