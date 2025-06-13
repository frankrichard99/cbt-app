let hamburger = document.getElementById("hamburger");
let sideBar = document.querySelector(".sidebar");

let hamburger_svg = `<!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>`;
let x_svg = `<svg height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><polygon fill-rule="evenodd" points="8 9.414 3.707 13.707 2.293 12.293 6.586 8 2.293 3.707 3.707 2.293 8 6.586 12.293 2.293 13.707 3.707 9.414 8 13.707 12.293 12.293 13.707 8 9.414"/></svg>`;

hamburger.addEventListener("click", () => {
    if (sideBar.classList.contains("active")) {
        sideBar.style.maxHeight = "0"; // Hide smoothly
        sideBar.classList.remove("active");
        hamburger.innerHTML = hamburger_svg;
    } else {
        sideBar.style.maxHeight = sideBar.scrollHeight + "px"; // Show smoothly
        sideBar.classList.add("active");
        hamburger.innerHTML = x_svg;
    }
});

// Ensure sidebar resets correctly on screen resize
window.addEventListener("resize", function () {
    if (window.innerWidth > 769) {
        sideBar.style.maxHeight = "100vh"; // Keep sidebar visible on desktop
        sideBar.classList.add("active");
    } else {
        sideBar.style.maxHeight = "0"; // Hide on smaller screens
        sideBar.classList.remove("active");
    }
});

// ACCOUNT NAME DROPDOWN
const dropbtn = document.getElementById('dropbtn');
const dropdownContent = document.getElementById('dropdown-content');

// Toggle dropdown when button is clicked
dropbtn.addEventListener('click', function (event) {
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    event.stopPropagation(); // Prevent click from reaching document
});

// Close dropdown when clicking outside
document.addEventListener('click', function (event) {
    if (!dropdownContent.contains(event.target) && event.target !== dropbtn) {
        dropdownContent.style.display = 'none';
    }
});

let chevron_svg = `<svg fill="var(--light-blue-gray)" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><polygon fill-rule="evenodd" points="13.293 4.293 14.707 5.707 8 12.414 1.293 5.707 2.707 4.293 8 9.586"/></svg>`;

// SIDEBAR SUBMENUS (Smooth Expand/Collapse)
function toggleSubMenu(menuId, iconId) {
    let submenu = document.getElementById(menuId);
    let icon = document.getElementById(iconId);

    if (submenu.classList.contains("open")) {
        submenu.style.maxHeight = null; // Collapse submenu
        submenu.classList.remove("open");
        icon.innerHTML = chevron_svg;
    } else {
        submenu.style.maxHeight = submenu.scrollHeight + "px"; // Expand submenu
        submenu.classList.add("open");
        icon.textContent = "-";

        // Ensure sidebar expands fully to accommodate submenu
        let sidebar = document.querySelector(".sidebar");
        if (window.innerWidth <= 770) {
            sidebar.style.maxHeight = sidebar.scrollHeight + submenu.scrollHeight + "px";
        }
    }
}

