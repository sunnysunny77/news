function callback () {
    

}

function events (obj,typ,callback,opts) {
    if (obj) {
        obj.addEventListener(typ,callback,opts);
    }
}

window.onload = function () {
events(document.getElementById('tmp'),"click",callback,null);
}