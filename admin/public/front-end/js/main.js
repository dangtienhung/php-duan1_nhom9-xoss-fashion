const $ = document.querySelector.bind("document");
const $$ = document.querySelectorAll.bind("document");

const openBtnMenu = document.querySelector(".sidebar__mobile-container");
const menuMobile = document.querySelector(".sidebar__mobile");

if (openBtnMenu) {
    openBtnMenu.onclick = (e) => {
        console.log(123);
        if (menuMobile) {
            console.log(menuMobile);
            menuMobile.classList.toggle("active");
        }
    };
}
