var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

var coll2 = document.getElementsByClassName("admin-account");
var j;

for (j = 0; j < coll2.length; j++) {
  coll2[j].addEventListener("click", function() {
    this.classList.toggle("active");
    var log_out = this.nextElementSibling;
    if (log_out.style.display === "none") {
      log_out.style.display = "flex";   
    } else {
      log_out.style.display = "none";
    }
  });
}

var coll3 = document.getElementsByClassName("reported-posts");
var k;

for (k = 0; k < coll3.length; k++) {
  coll3[k].addEventListener("click", function() {
    this.classList.toggle("active");
    var report_post = this.nextElementSibling;
    if (report_post.style.display === "none") {
        report_post.style.display = "flex";   
    } else {
        report_post.style.display = "none";
    }
  });
}

var coll4 = document.getElementsByClassName("search-result-item");
var l;

for (l = 0; l < coll4.length; l++) {
  coll4[l].addEventListener("click", function() {
    this.classList.toggle("active");
    var ban_user = this.nextElementSibling;
    if (ban_user.style.display === "none") {
        ban_user.style.display = "flex";   
    } else {
        ban_user.style.display = "none";
    }
  });
}