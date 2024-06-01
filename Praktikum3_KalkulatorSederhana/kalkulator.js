function appendNumber(number) {
    const resultInput = document.getElementById("result");
    resultInput.value += number;
}

  function clearResult() {
    const resultInput = document.getElementById("result");
    resultInput.value = "";
}

function calculate() {
    var result = eval (document.getElementById("result").value);
    const resultInput = document.getElementById("result");
    resultInput.value = result;
  }
