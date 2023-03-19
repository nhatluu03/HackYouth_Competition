let closeVerNavIc = document.querySelector('.close-ver-nav-ic');
let openVerNavIc = document.querySelector('.open-ver-nav-ic');
const currentVerNavStatus = localStorage.getItem("ver_nav_status");

if (!currentVerNavStatus) {
    openVerNav();
}
if (currentVerNavStatus == "open") {
    openVerNav();
} else if (currentVerNavStatus == "closed") {
    closeVerNav();
}
function openVerNav() {
    closeVerNavIc.classList.remove('hide');
    openVerNavIc.classList.add('hide');
    document.querySelector('.main').style.margin = "100px 60px 80px 320px";
    // document.querySelector('.ver-nav-container').style.transform = "translateX(-200px)";
    document.querySelector('.ver-nav-container').style['width'] = "250px";
    document.querySelectorAll('.ver-nav-item').forEach(item => {
        item.classList.remove('close-ver-nav');
        // item.style['width'] = "250px";
        item.querySelectorAll('span').forEach(spanItem => {
            // console.log(spanItem);
            spanItem.style.display = "inline-block";
        })
    })
    localStorage.setItem("ver_nav_status", "open");
}

function closeVerNav() {
    closeVerNavIc.classList.add('hide');
    openVerNavIc.classList.remove('hide');
    document.querySelector('.main').style.margin = "100px 80px 80px 160px";
    // document.querySelector('.main').style.transition = "0s";
    document.querySelector('.ver-nav-container').style['width'] = "100px";
    // document.querySelector('.ver-nav-container').style.transition = "0s";
    document.querySelectorAll('.ver-nav-item').forEach(item => {
        item.classList.add('close-ver-nav');
        item.querySelectorAll('span').forEach(spanItem => {
            // console.log(spanItem);
            spanItem.style.display = "none";
        })
        // item.querySelector('span').style.display = "none";
    })
    localStorage.setItem("ver_nav_status", "closed");
}

closeVerNavIc.onclick = closeVerNav;
openVerNavIc.onclick = openVerNav;