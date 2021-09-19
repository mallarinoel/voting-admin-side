const frm = document.querySelector(".form form");
const input = document.querySelector("form .form-group input[type='password']");
const save = document.querySelector(".submit button");
const bgerror = document.querySelector(".notification");
const error = document.querySelector(".error");

//Password Validation//
const indicator = document.querySelector("form .indicator");
const weak = document.querySelector("form .weak");
const medium = document.querySelector("form .medium");
const strong = document.querySelector("form .strong");
let passWeak = /[a-z]/;
let passMedium = /\d+/;
let passStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;

frm.onsubmit = (e)=> {
  e.preventDefault();
}

function password() {
  if (input.value != "") {
    indicator.style.display = "block";
    indicator.style.display = "flex";
    if (input.value.length <= 4 && (input.value.match(passWeak) || input.value.match(passMedium) || input.value.match(passStrong)))progress = 1;
    if (input.value.length >= 8 && ((input.value.match(passWeak) && input.value.match(passMedium)) || (input.value.match(passMedium) && input.value.match(passStrong)) || (input.value.match(passWeak) && input.value.match(passStrong))))progress = 2;
    if (input.value.length >= 8 &&  input.value.match(passWeak) && input.value.match(passMedium) && input.value.match(passStrong))progress = 3;
    if (progress == 1) {
      weak.classList.add("active");
    }
    if (progress == 2) {
      medium.classList.add("active");
    } else {
      medium.classList.remove("active");
    }
    if (progress == 3) {
      weak.classList.add("active");
      medium.classList.add("active");
      strong.classList.add("active");
    } else {
      strong.classList.remove("active");
    }
  } else {
    indicator.style.display = "none";
  }
}

save.onclick = ()=> {
  let hr = new XMLHttpRequest();
  hr.open("POST", "php/add.php", true);
  hr.onload = ()=> {
    if (hr.readyState === XMLHttpRequest.DONE) {
      if (hr.status === 200) {
        let data = hr.response;
        if (data != "Success") {
          bgerror.style.display = "block";
          error.textContent = data;
        } else {
          window.location.href = "login.php";
        }
      }
    }
  }
  let frmData = new FormData(frm);
  hr.send(frmData);
}