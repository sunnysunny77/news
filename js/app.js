
let oldScrollY = window.scrollY;

function nav() {

    if (oldScrollY > window.scrollY) {
        document.querySelectorAll("nav")[0].classList.add("left");
        document.querySelectorAll("nav")[1].classList.add("right");
        document.querySelectorAll("nav")[0].classList.remove("noneLeft");
        document.querySelectorAll("nav")[1].classList.remove("noneRight");
    } else {
        document.querySelectorAll("nav")[0].classList.remove("left");
        document.querySelectorAll("nav")[1].classList.remove("right");
        document.querySelectorAll("nav")[0].classList.add("noneLeft");
        document.querySelectorAll("nav")[1].classList.add("noneRight");
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