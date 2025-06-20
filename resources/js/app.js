import "./bootstrap";
lucide.createIcons();

const bgMode = document.querySelectorAll(".bg-mode");
const themeIcon = document.getElementById("theme-icon");

const setIconTheme = (isTheme) => {
    themeIcon.innerHTML = isTheme
        ? `
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon-icon lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
      `
        : `
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun-moon-icon lucide-sun-moon"><path d="M12 8a2.83 2.83 0 0 0 4 4 4 4 0 1 1-4-4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.9 4.9 1.4 1.4"/><path d="m17.7 17.7 1.4 1.4"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.3 17.7-1.4 1.4"/><path d="m19.1 4.9-1.4 1.4"/></svg>
     `;
};

document.addEventListener("DOMContentLoaded", () => {
    const theme = localStorage.getItem("theme");
    if (theme === "dark") {
        document.body.classList.add("dark");
        document.body.classList.remove("light");

        setIconTheme(true);
        bgMode.forEach((e) => {
            e.classList.add("bg-[#212529]");
            e.classList.remove("bg-[#f8f9fa]");
        });
    } else {
        setIconTheme(false);
        document.body.classList.remove("dark");
        // document.body.classList.add("light");
        bgMode.forEach((e) => {
            e.classList.remove("bg-[#212529]");
            e.classList.add("bg-[#f8f9fa]");
        });
    }
});

// Toggle theme on button click
document.getElementById("toggle-theme").addEventListener("click", () => {
    const isDark = document.body.classList.toggle("dark");

    localStorage.setItem("theme", isDark ? "dark" : "light");
    setIconTheme(isDark);

    if (isDark) {
        document.body.classList.add("dark");
        document.body.classList.remove("light");

        bgMode.forEach((e) => {
            e.classList.add("bg-[#212529]");
            e.classList.remove("bg-[#f8f9fa]");
        });
    } else {
        document.body.classList.add("ligth");
        document.body.classList.remove("dark");

        bgMode.forEach((e) => {
            e.classList.add("bg-[#f8f9fa]");
            e.classList.remove("bg-[#212529]");
        });
    }
});

// const btnShowTogle = document.querySelectorAll(".bg-show-togle");
// btnShowTogle.forEach((e,i) => {
//     e.addEventListener("click", (el) => {
//         console.log(el.target.classList.value);

//         const togle = document.querySelector(".togle-show");
//         const showTogle = togle.classList.contains("hidden");
//         if (showTogle) {
//             togle.classList.remove("hidden");
//         } else {
//             togle.classList.add("hidden");
//         }
//     });
// });
// Toggle button click logic
document.querySelectorAll(".bg-show-togle").forEach((btn) => {
    btn.addEventListener("click", () => {
        const listItem = btn.closest("li");
        const toggleContent = listItem?.querySelector(".togle-show");

        const isVisible = toggleContent && !toggleContent.classList.contains("hidden");

        // Hide all toggles and reset buttons
        document.querySelectorAll(".togle-show").forEach((el) => el.classList.add("hidden"));
        document.querySelectorAll(".bg-show-togle").forEach((el) => {
            el.classList.remove("border-blue-700", "border-l-3", "text-blue-700");
        });

        // Show the clicked toggle and style the button if it was hidden
        if (!isVisible && toggleContent) {
            toggleContent.classList.remove("hidden");
            btn.classList.add("border-blue-700", "border-l-3", "text-blue-700");
        }
    });
});

// Toggle submenu
window.toggleSubmenu = function (header) {
    const submenu = header.nextElementSibling;
    const chevron = header.querySelector(".chevron");

    // Collapse all other submenus and reset all headers & chevrons
    document.querySelectorAll(".submenu").forEach((menu) => {
        if (menu !== submenu) {
            menu.classList.remove("max-h-40");
            menu.classList.add("max-h-0");
        }
    });

    document.querySelectorAll(".chevron").forEach((c) => {
        if (c !== chevron) {
            c.classList.remove("rotate-180");
            c.classList.remove("text-blue-600");
            c.classList.add("text-gray-400");
        }
    });

    document.querySelectorAll(".submenu-header").forEach((h) => {
        if (h !== header) {
            h.classList.remove("text-blue-600");
            h.querySelector("svg")?.classList.remove("text-blue-600");
            h.querySelector("svg")?.classList.add("text-gray-400");
        }else{

        }
    });

    // Toggle current submenu
    const isExpanded = submenu.classList.contains("max-h-40");
    submenu.classList.toggle("max-h-0", isExpanded);
    submenu.classList.toggle("max-h-40", !isExpanded);

    // Toggle chevron and header color
    chevron.classList.toggle("rotate-180");
    chevron.classList.add("text-blue-600");
    chevron.classList.remove("text-gray-400");

    header.classList.toggle("text-blue-600");
};

// Set active submenu item
window.setActive = function (item) {
    document.querySelectorAll(".submenu-item").forEach((el) => {
        el.classList.remove("active", "bg-blue-50", "text-blue-600", "font-medium");
        el.classList.add("text-gray-700");
    });

    item.classList.add("active", "bg-blue-50", "text-blue-600", "font-medium");
    item.classList.remove("text-gray-700");
};

// Auto-expand first menu on load
document.addEventListener("DOMContentLoaded", () => {
    const firstHeader = document.querySelector(".menu-item .flex");
    if (firstHeader) toggleSubmenu(firstHeader);
});
// window.loadPage = function (url) {

//     fetch(url)
//     // console.log(url);

//         .then((response) => {
//             if (!response.ok) throw new Error("Failed to load");
//             return response.text();
//         })
//         .then((html) => {
//             const container = document.getElementById("main-content");
//             // document.getElementById("main-content").innerHTML = html;
//             if(container){
//                   container.innerHTML = html;
//                  window.history.pushState(null, '', url);
//             }
//         })
//         .catch((error) => {
//             console.error("Error loading page:", error);
//         });
// };
window.loadPage = function (url) {
    fetch(url, {
        headers: {
            "X-Requested-With": "XMLHttpRequest", // Let Laravel know this is an AJAX request
        },
    })
        .then((response) => response.text())
        .then((html) => {
            const container = document.getElementById("main-content");

            if (container) {
                container.innerHTML = html;
                const theme = localStorage.getItem("theme") || "light";
                const bgMode = document.querySelectorAll(".bg-mode");

                bgMode.forEach((el) => {
                    // Remove any existing theme classes
                    // el.classList.remove("bg-blue-500", "bg-[#f8f9fa]");  

                    if (theme === "dark") {
                        el.classList.add("bg-[#212529]");
                        el.classList.remove("bg-[#f8f9fa]");
                        // el.classList.add("bg-blue-500"); // dark theme color
                    } else {
                        el.classList.add("bg-[#f8f9fa]"); // light theme color
                        el.classList.remove("bg-[#212529]");

                    }
                });
                // bgMode.forEach((el) => {
                //     const bgMode = document.querySelectorAll(".bg-mode");
                //     // e.classList.remove("bg-[#f8f9fa]");

                //     // el.classList.remove("bg-blue-500", "bg-[#f8f9fa]");

                //     if (theme === "dark") {
                //     el.classList.add("bg-[#f8f9fa]");
                //         // el.classList.add("bg-[#f8f9fa]"); // dark theme color
                //     } else {
                //         el.classList.add("bg-[#f8f9fa]"); // light theme color
                //     }
                // });

                // ✅ Update browser URL without reloading
                history.pushState({ url: url }, "", url);
            } else {
                // const bgMode = document.querySelectorAll(".bg-mode");

                // bgMode.forEach((e) => {
                //     e.classList.remove("bg-[#212529]");
                //     e.classList.add("bg-[#f8f9fa]");
                // });
                console.error("#main-content container not found.");
            }
        })
        .catch((error) => {
            console.error("Error loading page:", error);
        });
};

// ✅ Handle browser back/forward buttons
window.addEventListener("popstate", function (event) {
    const state = event.state;
    if (state && state.url) {
        loadPage(state.url);
    }
});

// ✅ On first load: check if not homepage and auto-load
document.addEventListener("DOMContentLoaded", function () {
    const currentPath = window.location.pathname;

    // Only load dynamically if not on the homepage
    if (currentPath !== "/") {
        loadPage(currentPath);
    }
});
