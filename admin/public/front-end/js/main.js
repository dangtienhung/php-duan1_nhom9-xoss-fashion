const $ = document.querySelector.bind("document");
const $$ = document.querySelectorAll.bind("document");

const closeBtnMenu = document.querySelector(".sidebar__mobile-container");
const openBtnMenu = document.querySelector(".header .icon");
const menuMobile = document.querySelector(".sidebar__mobile");
const modalOverlay = document.querySelector(".sidebar__mobile-container");

if (closeBtnMenu) {
    closeBtnMenu.onclick = (e) => {
        if (menuMobile && modalOverlay) {
            menuMobile.classList.toggle("active");
            modalOverlay.classList.toggle("active");
        }
    };
}

if (openBtnMenu) {
    openBtnMenu.onclick = (e) => {
        if (menuMobile && modalOverlay) {
            menuMobile.classList.toggle("active");
            modalOverlay.classList.toggle("active");
        }
    };
}
