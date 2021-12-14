const requireInputElements = document.querySelectorAll('.modal-body .form-control');
console.log(requireInputElements);

requireInputElements.forEach((element) => {
  element.addEventListener('blur', () => {
    if (!element.value) {
      element.style.border = '1px solid red';
    } else {
      element.style.border = '1px solid #ced4da';
    }
  })
})
