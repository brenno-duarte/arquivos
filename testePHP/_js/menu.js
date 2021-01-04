/** MENU */

const toggle = document.querySelector(".toggle");
const menu = document.querySelector(".menu");
const items = document.querySelectorAll(".item");

/* Toggle mobile menu */
function toggleMenu() {
    if (menu.classList.contains("active")) {
        menu.classList.remove("active");
        toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";
    } else {
        menu.classList.add("active");
        toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
    }
}

/* Activate Submenu */
function toggleItem() {
    if (this.classList.contains("submenu-active")) {
        this.classList.remove("submenu-active");
    } else if (menu.querySelector(".submenu-active")) {
        menu.querySelector(".submenu-active").classList.remove("submenu-active");
        this.classList.add("submenu-active");
    } else {
        this.classList.add("submenu-active");
    }
}

/* Close Submenu From Anywhere */
function closeSubmenu(e) {
    let isClickInside = menu.contains(e.target);

    if (!isClickInside && menu.querySelector(".submenu-active")) {
        menu.querySelector(".submenu-active").classList.remove("submenu-active");
    }
}
/* Event Listeners */
toggle.addEventListener("click", toggleMenu, false);
for (let item of items) {
    if (item.querySelector(".submenu")) {
        item.addEventListener("click", toggleItem, false);
    }
    item.addEventListener("keypress", toggleItem, false);
}
document.addEventListener("click", closeSubmenu, false);

/** MODAL */

// Open modal
function openModal(url) {
    location.href = url
}

// Close modal
function closeModal(url) {
    location.href = url
}

/** SLIDER */

function sliderInit(sliderName, time = 4000) {
    // amount of images in the slider :
    var amountImg = 7;
    // width of one image (in pixels)
    var widthImg = 570;
    // waiting interval (in milliseconds)
    var waitTime = time;

    var deltaX = 0;
    var slider = document.querySelector('.' + sliderName);

    window.setInterval(doSlide, waitTime);

    function doSlide() {
        deltaX += widthImg;
        deltaX %= amountImg * widthImg;
        slider.querySelector('.slider-inner').style.marginLeft = '-' + deltaX + 'rem';
    }
}

/** BANNER */

document.querySelector(".banner-close").addEventListener("click", function () {
    this.closest(".banner").style.opacity = '0';
    this.closest(".banner").addEventListener('transitionend', () => this.closest(".banner").remove());
    this.closest(".banner").style.display = "none";
});

/** COLLAPSE */

let acc = document.querySelectorAll(".collapse-toggle");
let i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "rem";
        }
    });
}

/** SIDEBAR */

document.querySelectorAll('[data-toggle-sidebar]').forEach(toggle => {
    toggle.addEventListener('click', e => {
      const sidebarID = toggle.dataset.toggleSidebar;
      const sidebarElement = sidebarID ? document.getElementById(sidebarID) : undefined;
      if (sidebarElement) {
         let sidebarState = sidebarElement.getAttribute('aria-hidden');
         sidebarElement.setAttribute('aria-hidden', sidebarState == 'true' ? false : true); 
      }
    });
 });