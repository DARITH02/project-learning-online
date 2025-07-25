window.loadPage = function (url) {
    fetch(url, {
        headers: {
            "X-Requested-With": "XMLHttpRequest", // Let Laravel know this is
        },
    })
        .then((response) => response.text())
        .then((html) => {
            const container = document.getElementById("main-content");
            const title = document.querySelector("title");

            if (container) {
                // window.location.replace(url)
                container.innerHTML = html;
                // title.innerText=response.title;
                //                 document.addEventListener("click", function (e) {
                //     if (e.target.closest(".pagination a")) {
                //         e.preventDefault();
                //         //   console.log("Pagination link clicked:", e.target.closest("a").href);
                //         // const url = e.target.closest("a").getAttribute("href");
                //         const url = e.target.closest("a").href;

                //     }
                // });

                const tempDom = document.createElement("html");
                tempDom.innerHTML = html;
                const newTitle = tempDom.querySelector("title")?.innerText;
                if (newTitle) {
                    document.title = newTitle;
                }

                const theme = localStorage.getItem("theme") || "light";
                const bgMode = document.querySelectorAll(".bg-mode");

                // bgMode.forEach((el) => {
                //     // Remove any existing theme classes
                //     // el.classList.remove("bg-blue-500", "bg-[#f8f9fa]");

                //     if (theme === "dark") {
                //         el.classList.add("bg-[#212529]");
                //         el.classList.remove("bg-[#f8f9fa]");
                //         // el.classList.add("bg-blue-500"); // dark theme color
                //     } else {
                //         el.classList.add("bg-[#f8f9fa]"); // light theme color
                //         el.classList.remove("bg-[#212529]");
                //     }
                // });

                // ✅ Update browser URL without reloading
                history.pushState({ url: url }, "", url);
            } else {
                console.error("#main-content container not found.");
            }
        })
        .catch((error) => {
            console.error("Error loading page:", error);
        });
};