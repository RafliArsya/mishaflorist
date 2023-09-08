function getLastPart(url) {
    const parts = url.split('/');
    return parts.at(-1);
}

const header = document.getElementById("header");
const headername = document.getElementById("header-name");

/*window.addEventListener("scroll", () => {
    let url_splited = getLastPart(document.URL);
    if (window.scrollY > 0) {
        if (url_splited == "home"){
            header.classList.add("header-scroll");
            headername.classList.remove("hidden-add");
        } 
    } else {
        if (url_splited == "home"){
            header.classList.remove("header-scroll");
            headername.classList.add("hidden-add");
        }
    }
});*/

document.getScroll = function() {
    if (window.ScrollY != undefined) {
        return [ScrollX, ScrollY];
    } else {
        var sx, sy, d = document,
            r = d.documentElement,
            b = d.body;
        sx = r.scrollLeft || b.scrollLeft || 0;
        sy = r.scrollTop || b.scrollTop || 0;
        return [sx, sy];
    }
}
if (getLastPart(document.URL)=="home"){
    if (document.getScroll()[1]==0){
        header.classList.remove("header-scroll");
        headername.classList.add("hidden-add");
    }else{
        header.classList.add("header-scroll");
        headername.classList.remove("hidden-add");
    }
}
