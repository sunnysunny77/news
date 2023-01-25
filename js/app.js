const ul0 = document.querySelectorAll("ul")[0];
const ul1 = document.querySelectorAll("ul")[1];
const nav = document.querySelector("nav");

function callback () {
  
    nav.classList.toggle("color")

    if(nav.classList.contains("color")) {

        ul0.classList.add("disp");
        ul1.classList.add("disp");
        ul0.classList.remove("menuout");
        ul1.classList.remove("menuout");
      } else if (!nav.classList.contains("color")) {
    
        ul0.classList.remove("disp");
        ul1.classList.remove("disp");
        ul0.classList.add("menuout");
        ul1.classList.add("menuout");
      } 
}

function events (obj,typ,callback,opts) {
    if (obj) {
        obj.addEventListener(typ,callback,opts);
    }
}

window.onload = function () {
events(nav,"click",callback,null);
}