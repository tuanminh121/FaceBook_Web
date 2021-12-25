/* var input = document.getElementById("comment-input");
var form = document.getElementById("comment-form");
//thực hiện khi nhấn rồi thả tay
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) { //13 là nút Enter
   event.preventDefault();
   document.getElementById("send-comment").click();
   form.reset();
  }
});

var btn = document.getElementById("send-comment");

btn.addEventListener("click", function(){
    form.reset();
}); */
/* 
function submitForm() {
  document.comment-form.submit();
  document.comment-form.reset();
  } */
  
/* var option = document.getElementById('option-comment');
var option_item = document.getElementsByClassName('option-comment-item');

option.addEventListener("click", function(){
  option_item.display
}); */


/* function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} */

/* function myFunction() {
  var x = document.getElementById("form-edit-comment");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} */

/* var input = document.getElementById("btn-edit");
var form = document.getElementById("form-edit-comment");
//thực hiện khi nhấn rồi thả tay
input.addEventListener("click", function(event) {
  if (form.style.display === "none") {
    form.style.display = "block";
  }
  else {
  form.style.display = "none";
  }
}); */

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "none") {
      content.style.display = "block";
    }
    else {
      content.style.display = "none";
    }
  });
}

var coll2 = document.getElementsByClassName("collapsibleOption");
var j;

for (j = 0; j < coll.length; j++) {
  coll2[j].addEventListener("click", function() {
    this.classList.toggle("active");
    var contentOption = this.nextElementSibling;
    if (contentOption.style.display === "none") {
      contentOption.style.display = "block";
    }
    else {
      contentOption.style.display = "none";
    }
  });
}