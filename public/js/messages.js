var messageSuccess = document.getElementById("success");
var messageUnsuccess = document.getElementById("unsuccess");

if (messageSuccess !== null) {
  setTimeout(function () {
    messageSuccess.style.display = "none";
  }, 3000);
}

if (messageUnsuccess !== null) {
  setTimeout(function () {
    messageUnsuccess.style.display = "none";
  }, 3000);
}
