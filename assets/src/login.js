const requireInputElements = document.querySelectorAll(
  ".modal-body .form-control"
);
const checkboxBtnElements = document.querySelectorAll(".gender-checkbox");

requireInputElements.forEach((element) => {
  element.addEventListener("blur", () => {
    if (!element.value) {
      element.style.border = "1px solid red";
    } else {
      element.style.border = "1px solid #ced4da";
    }
  });
});

checkboxBtnElements.forEach((element) => {
  element.addEventListener("click", (e) => {
    if (e.target.localName === "div") e.target.lastElementChild.checked = true;
  });
});
