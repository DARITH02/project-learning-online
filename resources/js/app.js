import axios from "axios";
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

// Toggle button click logic
document.querySelectorAll(".bg-show-togle").forEach((btn) => {
    btn.addEventListener("click", () => {
        const listItem = btn.closest("li");
        const toggleContent = listItem?.querySelector(".togle-show");

        const isVisible =
            toggleContent && !toggleContent.classList.contains("hidden");

        // Hide all toggles and reset buttons
        document
            .querySelectorAll(".togle-show")
            .forEach((el) => el.classList.add("hidden"));
        document.querySelectorAll(".bg-show-togle").forEach((el) => {
            el.classList.remove(
                "border-blue-700",
                "border-l-3",
                "text-blue-700"
            );
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

    if (!submenu || !chevron) return;

    const isExpanded = submenu.classList.contains("max-h-40");
    console.log(isExpanded);

    // Collapse all submenus and reset chevrons and headers
    document.querySelectorAll(".submenu").forEach((menu) => {
        menu.classList.remove("max-h-40");
        menu.classList.add("max-h-0");
    });

    document.querySelectorAll(".chevron").forEach((c) => {
        c.classList.remove("rotate-180", "text-blue-600");
        c.classList.add("text-gray-400");
    });

    document.querySelectorAll(".submenu-header").forEach((h) => {
        h.classList.remove("text-blue-600", "bg-blue-200");
        // h.querySelector("svg")?.classList.remove("text-blue-600");
        h.querySelector("svg")?.classList.add("text-gray-400");
    });

    // Toggle current submenu
    if (!isExpanded) {
        submenu.classList.remove("max-h-0");
        submenu.classList.add("max-h-40");

        chevron.classList.add("rotate-180", "text-blue-600");

        chevron.classList.remove("text-gray-400");

        header.classList.add("text-blue-600", "bg-blue-200");
    } else {
        // header.classList.remove("text-blue-600",'bg-gray-700');
    }
};

// Set active submenu item
window.setActive = function (item) {
    document.querySelectorAll(".submenu-item").forEach((el) => {
        el.classList.remove(
            "active",
            "bg-blue-50",
            "text-blue-600",
            "font-medium"
        );
        // el.classList.add("text-white");
    });

    item.classList.add("active", "text-blue-600", "font-medium");
    item.classList.remove("text-gray-700");
};

// Auto-expand the first menu on page load
document.addEventListener("DOMContentLoaded", () => {
    const firstHeader = document.querySelector(".menu-item .submenu-header");
    if (firstHeader) window.toggleSubmenu(firstHeader);
});

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

//create data

document.addEventListener("DOMContentLoaded", () => {
    var notyf = new Notyf({
        duration: 2000,
        position: {
            x: "right",
            y: "top",
        },
        types: [
            {
                type: "warning",
                background: "orange",
                icon: {
                    className: "material-icons",
                    tagName: "i",
                    text: "warning",
                },
            },
            {
                type: "error",
                background: "indianred",
                duration: 2000,
                dismissible: true,
            },
        ],
    });

    window.createCate = (selector) => {
        let frmSelector = document.querySelector(selector);
        let frmData = new FormData(frmSelector);

        if (!frmData.get("title") || frmData.get("title") === "") {
            notyf.error("field empty data !!!!");
            return;
        }

        const url = frmSelector.getAttribute("data-url");
        axios
            .post(url, frmData)
            .then((response) => {
                if (response.status === 200) {
                    notyf.success(
                        response.data.data + " : " + response.data.message
                    );
                    frmSelector.reset();
                }
            })
            .catch((error) => {
                if (
                    error.response &&
                    error.response.data &&
                    error.response.data.message
                ) {
                    notyf.error(
                        error.response.data.data +
                            " : " +
                            error.response.data.message
                    );
                } else {
                    notyf.error("An unexpected error occurred");
                    notyf.error("An unexpected error occurred");
                }
            });
    };

    window.deleteItem = (id) => {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .delete(`/deleteCategory/${id}`)
                    .then((response) => {
                        const row = document.querySelector(
                            `#category-row-${id}`
                        );
                        if (row) {
                            row.remove();
                        }

                        if (response.status === 200) {
                            notyf.success(response.data.message);
                        }
                    })
                    .catch((error) => {
                        if (
                            error.response &&
                            error.response.data &&
                            error.response.data.message
                        ) {
                            notyf.error(error.response.data.message);
                        } else {
                            notyf.error("An unexpected error occurred.");
                        }
                    });
            }
        });
    };
});
