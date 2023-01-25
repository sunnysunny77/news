
let oldScrollY = window.scrollY;

const left = document.querySelectorAll("nav")[0];
const right = document.querySelectorAll("nav")[1];
const head = document.querySelector("header");

function nav() {
  
    if (oldScrollY < window.scrollY &&  window.scrollY > head.offsetHeight) {
      
        left.classList.remove("left");
        right.classList.remove("right");   
        left.classList.add("noneLeft");
        right.classList.add("noneRight");

    } else if (oldScrollY > window.scrollY &&  window.scrollY > head.offsetHeight){
        
        left.classList.add("left");
        right.classList.add("right");
        left.classList.remove("noneLeft");
        right.classList.remove("noneRight");
    } 
    oldScrollY = window.scrollY;
}

function events(obj, typ, callback, opts) {
    if (obj) {
        obj.addEventListener(typ, callback, opts);
    }
}

window.onload = function () {
    events(window, "scroll", nav, null);
}