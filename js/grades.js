let termButtons = document.querySelectorAll(".add-grades button");

for (let i = 0; i < termButtons.length; i++) {
  termButtons[i].addEventListener("click", function () {
    for (let i = 0; i < termButtons.length; i++) {
      termButtons[i].classList.remove("button-selected");
    }
    this.classList.add("button-selected");
  });
}
