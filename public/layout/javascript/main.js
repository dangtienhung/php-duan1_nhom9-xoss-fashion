const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
(function () {
   const openMegaMenu = $(".header__menu-responsive-btn");
   const megaMenu = $(".header__menu-responsive-list");
   if (openMegaMenu && megaMenu) {
      openMegaMenu.onclick = (e) => {
         e.preventDefault();
         megaMenu.classList.toggle("active");
      };
   }
})();
