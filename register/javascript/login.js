const frm = document.querySelector(".form form");
const login = document.querySelector(".submit button");
const bgerror = document.querySelector(".notification");
const error = document.querySelector(".error");
const btn = document.querySelector(".form form .form-submit");

frm.onsubmit = (e) => {
  e.preventDefault();
}

login.onclick = () => {
  let hr = new XMLHttpRequest();
  hr.open("POST", "php/login.php", true);
  hr.onload = () => {
    if (hr.readyState === XMLHttpRequest.DONE) {
      if (hr.status === 200) {
        let data = hr.response;
        if (data != "Success") {
          bgerror.style.display = "block";
          error.textContent = data;
        } else {
          window.location.href = "dashboard.php";
        }
      }
    }
  }
  let frmData = new FormData(frm);
  hr.send(frmData);
}