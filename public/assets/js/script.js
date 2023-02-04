"use strict";
let burgerMenu = document.getElementById("burger-menu");
let overlay = document.getElementById("menu");
burgerMenu.addEventListener("click", function () {
  this.classList.toggle("close");
  overlay.classList.toggle("overlay");
});

let submit = document.getElementById("submit");
let validation = document.getElementById("validation");
submit.addEventListener("click", function () {
  validation.innerHTML("Vous avez bien été inscrit à notre Newsletter");
});

let boutonBraid = document.querySelector("#bouton-braid");
let blockLeft = document.querySelector(".container-left");
let braid = document.querySelector("#braid");
let bouton_retour = document.getElementById("button-retour");
boutonBraid.onclick = function () {
  blockLeft.style.display = "none";
  blockRight.style.display = "none";
  braid.style.display = "flex";
  // container.style.display = "flex";
  bouton_retour.style.display = "flex";
};
// console.dir(boutonBraid);
// console.dir(blockLeft);
// console.dir(braid);

let boutonLocks = document.querySelector("#bouton-locks");
let blockRight = document.querySelector(".container-right");
let locks = document.querySelector("#locks");
// let container = document.querySelector(".container-fluid");
boutonLocks.onclick = function () {
  blockRight.style.display = "none";
  blockLeft.style.display = "none";
  locks.style.display = "flex";
  // container.style.display = "flex";
  bouton_retour.style.display = "flex";
};

bouton_retour.onclick = function () {
  blockLeft.style.display = "block";
  blockRight.style.display = "block";
  braid.style.display = "none";
  locks.style.display = "none";
  // container.style.display = "none";
  bouton_retour.style.display = "none";
};
console.log(bouton_retour);
// console.dir(boutonBraid);
// console.dir(blockLeft);
// console.dir(braid);

bouton - retour;
let btn_fausses_locks = document.getElementById("btn_fausses_locks");
let form_fausses_locks = document.getElementById("form_fausses_locks");
btn_fausses_locks.onclick = function () {
  btn_fausses_locks.style.display = "none";
  form_fausses_locks.style.display = "block";
  // locks.style.display = "none";
};
console.log(btn_fausses_locks);

let btn_knotless = document.getElementById("btn_knotless");
let form_knotless = document.getElementById("form_knotless");
btn_knotless.onclick = function () {
  btn_knotless.style.display = "none";
  form_knotless.style.display = "block";
  bouton_retour.style.display = "block";
  // locks.style.display = "none";
};
console.log(btn_knotless);

let btn_passion_twist = document.getElementById("btn_passion_twist");
let form_passion_twist = document.getElementById("form_passion_twist");
btn_passion_twist.onclick = function () {
  btn_passion_twist.style.display = "none";
  form_passion_twist.style.display = "block";
  // locks.style.display = "none";
};
console.log(btn_passion_twist);

let btn_tresses = document.getElementById("btn_tresses");
let form_tresses = document.getElementById("form_tresses");
btn_tresses.onclick = function () {
  btn_tresses.style.display = "none";
  form_tresses.style.display = "block";
  // locks.style.display = "none";
};
console.log(btn_tresses);

let btn_entretien = document.getElementById("btn_entretien");
let form_entretien = document.getElementById("form_entretien");
btn_entretien.onclick = function () {
  btn_entretien.style.display = "none";
  form_entretien.style.display = "block";
  // locks.style.display = "none";
};
console.log(btn_entretien);

let btn_braid_locks = document.getElementById("btn_braid_locks");
let form_braid_locks = document.getElementById("form_braid_locks");
btn_braid_locks.onclick = function () {
  btn_braid_locks.style.display = "none";
  form_braid_locks.style.display = "block";
  // locks.style.display = "none";
};
console.log(btn_braid_locks);

let supAddress = document.getElementById("sup-address");
supAddress.onclick = function () {
  confirm("Vous êtes sûr de vouloir supprimer cette adresse ?");
};
console.log(supAddress);

window.addEventListener("load", function () {
  if (!localStorage.getItem("cookieConsent")) {
    document.body.innerHTML += `
      <div id="cookie-consent">
        Ce site utilise des cookies pour améliorer l'expérience utilisateur. 
        <button id="cookie-consent-agree">OK</button>
      </div>
    `;
    document
      .getElementById("cookie-consent-agree")
      .addEventListener("click", function () {
        localStorage.setItem("cookieConsent", true);
        document.getElementById("cookie-consent").style.display = "none";
      });
  }
});
