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
const btnShowToggles = document.querySelectorAll(".bg-show-togle");

btnShowToggles.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        const thisLi = btn.closest("li");
        const thisToggle = thisLi?.querySelector(".togle-show");

        //   thisToggle.classList.add("");

        // Check if this one is visible
        const isVisible =
            thisToggle && !thisToggle.classList.contains("hidden");
        if (isVisible) {
            // btn.classList.remove("border-blue-700","border-l-3","text-blue-700")
        }

        // Hide all other toggles
        document.querySelectorAll(".togle-show").forEach((el) => {
            el.classList.add("hidden");
            btn.classList.remove(
                "border-blue-700",
                "border-l-3",
                "text-blue-700"
            );
            //    if (el.classList.contains("hidden")){
            //     console.log(el);

            //     }
        });

        // Toggle this one (if it was hidden, show it; if visible, hide it)
        if (!isVisible && thisToggle) {
            thisToggle.classList.remove("hidden");
            // btn.classList.remove(
            //     "border-blue-700",
            //     "border-l-3",
            //     "text-blue-700"
            // );
            btn.classList.add("border-blue-700", "border-l-3", "text-blue-700");
        }
        //  if(thisToggle.classList.contains("hidden")){
        //     btn.classList.remove("border-blue-700","border-l-3","text-blue-700")
        // }
    });
});
