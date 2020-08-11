const add = document.querySelector(".add");
const gradeInputs = document.querySelector(".grade-inputs");
const subjInputs = document.querySelector(".subj-inputs");
const reset = document.querySelector(".reset");

let inputNumber = 2;

// ------------------------------------------------------
// CLICK LISTENERS
// ------------------------------------------------------

// Click listener for add button
add.addEventListener("click", function () {
  addGradeInput();
  addUnitInput();
  addSubjInput();
});

// Click listener for reset button
reset.addEventListener("click", function () {});


// ------------------------------------------------------
// FUNCTIONS
// ------------------------------------------------------

// Add more grades inputs
function addGradeInput() {
    // Add grades inputs
    const input = document.createElement("input");
    input.type = "number";
    input.name = "grades[]";
    input.id = "grade";
    input.min = 0;
    input.max = 5;
    input.step = 0.01;
    gradeInputs.appendChild(input); // put it into the DOM
}

// Subj
function addSubjInput() {
  // Add subj inputs
  const input = document.createElement("input");
  input.type = "text";
  input.name = "subj[]";
  input.id = "subj";
  subjInputs.appendChild(input); // put it into the DOM
}


// Add more number of units inputs
function addUnitInput() {

  // Add unit inputs
  const select = document.createElement("select");
  document.querySelector(".unit-inputs").appendChild(select);

  // Set name for select tag
  select.setAttribute("name", "units[]");
  select.setAttribute("id", "units");
  inputNumber++;

  // Create 1-6 options
  for (let i = 1; i <= 6; i++) {

    // Create an option element
    const option = document.createElement("option");

    // Create text
    const text = document.createTextNode(i);
    option.appendChild(text);

    // Set value to
    option.setAttribute("value", i);
    select.appendChild(option);

  }
}


// Get DOM Elements
const modal = document.querySelector('#my-modal');
const modalBtn = document.querySelector('#modal-btn');
const closeBtn = document.querySelector('.close');

// Events
modalBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', outsideClick);

// Open
function openModal() {
  modal.style.display = 'block';
}

// Close
function closeModal() {
  modal.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}
