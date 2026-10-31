const form = document.getElementById("ce-questionnaire");
const allInputs = form.querySelectorAll(".question");
let total = form.elements["scoretotal"];
let floatingTotalScore = document.querySelector(".floating-total-score");
let allScoreComments = document.querySelectorAll(".total-score-heading-comments > div");

function updateResult() {
  let sum = 0;
  const data = new FormData(form);
  for (const entry of data) {
    sum = sum + parseInt(entry[1]);
  }
  total.value = sum;
  floatingTotalScore.textContent = sum;

  for (const comment of allScoreComments) {
    comment.style.display = "none";
  }
  for (const comment of allScoreComments) {
    if (sum <= parseInt(comment.getAttribute("data-threshold"))) {
      comment.style.display = "block";
      break;
    }
    // else {
    //   if (sum >= 42 && parseInt(comment.getAttribute("data-threshold")) >= 42) {
    //     comment.style.display = "block";
    //   }
    // }
  }
}
function updateMessage() {
  for (const question of allInputs) {
    let messageOutput = question.querySelector("output");
    let score = question.querySelector("input:checked").value;
    let allMessages = messageOutput.querySelectorAll("li");
    for (const message of allMessages) {
      message.style.display = "none";
    }
    let activeMessage;
    switch (score) {
      case "0":
        activeMessage = messageOutput.querySelector("li.score-0");
        activeMessage.style.display = "block";
        break;
      case "1":
        activeMessage = messageOutput.querySelector("li.score-1");
        activeMessage.style.display = "block";
        break;
      case "2":
        activeMessage = messageOutput.querySelector("li.score-2");
        activeMessage.style.display = "block";
        break;
      default:
        activeMessage = messageOutput.querySelector("li.score-0");
        activeMessage.style.display = "block";
    }
  }
}
form.addEventListener("input", updateMessage);
form.addEventListener("input", updateResult);

updateResult();
updateMessage();
