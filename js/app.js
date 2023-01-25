

function callback () {
    document.querySelectorAll("ul")[0].classList.toggle("disp");
    document.querySelectorAll("ul")[1].classList.toggle("disp");
    document.querySelector("nav").classList.toggle("color");
}

function events (obj,typ,callback,opts) {
    if (obj) {
        obj.addEventListener(typ,callback,opts);
    }
}

window.onload = function () {
events(document.querySelector("nav"),"click",callback,null);
}