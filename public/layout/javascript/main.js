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

(function () {
   const headerContainer = $(".header__container");
   if (headerContainer) {
      let prevScrollpos = window.pageYOffset;
      window.onscroll = () => {
         let currentScroll = window.pageYOffset;
         if (prevScrollpos > currentScroll) {
            headerContainer.style.top = "0";
         } else {
            headerContainer.style.top = "-200px";
         }
         prevScrollpos = currentScroll;
      };
   }
});
