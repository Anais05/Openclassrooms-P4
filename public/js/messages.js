var messageSuccess = document.getElementById("success");

if (messageSuccess !== null) {
  setTimeout(function () {
    console.log("hello");
    messageSuccess.style.display = "none";
  }, 3000);
}
