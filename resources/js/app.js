import "./bootstrap";
lucide.createIcons();


      const bgMode=  document.querySelectorAll(".bg-mode")

document.addEventListener("DOMContentLoaded", () => {
    const theme = localStorage.getItem("theme");
    if (theme === "dark") {
        document.body.classList.add("dark");
        
    } else {
        
        document.body.classList.remove("dark");
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
    } else {
        document.body.classList.add("ligth");
    }
});
