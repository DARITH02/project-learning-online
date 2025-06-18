import "./bootstrap";
lucide.createIcons();

const bgMode = document.querySelectorAll(".bg-mode");

document.addEventListener("DOMContentLoaded", () => {
    const theme = localStorage.getItem("theme");
    if (theme === "dark") {
        document.body.classList.add("dark");
        bgMode.forEach((e) => {
            e.classList.add("bg-[#212529]");
            e.classList.remove("bg-[#dee2e6]");
        });
    } else {
        document.body.classList.remove("dark");
        bgMode.forEach((e) => {
            e.classList.remove("bg-[#212529]");
            e.classList.add("bg-[#dee2e6]");
        });
    }
});

// Toggle theme on button click
document.getElementById("toggle-theme").addEventListener("click", () => {
    const isDark = document.body.classList.toggle("dark");

    console.log(isDark);

    localStorage.setItem("theme", isDark ? "dark" : "light");

    console.log(isDark);
    if (isDark) {
        document.body.classList.add("dark");
        bgMode.forEach((e) => {
            e.classList.add("bg-[#212529]");
            e.classList.remove("bg-[#dee2e6]");
        });
    } else {
        document.body.classList.add("ligth");
        bgMode.forEach((e) => {
            e.classList.remove("bg-[#212529]");
            e.classList.add("bg-[#dee2e6]");
        });
    }
});
