import axios from "axios";
import { Download } from "lucide-react";

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
            e.classList.add("bg-[#23272f]");
            e.classList.remove("bg-[#f8f9fa]");
        });
    } else {
        setIconTheme(false);
        document.body.classList.remove("dark");
        // document.body.classList.add("light");
        bgMode.forEach((e) => {
            e.classList.remove("bg-[#23272f]");
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
            e.classList.add("bg-[#23272f]");
            e.classList.remove("bg-[#f8f9fa]");
        });
    } else {
        document.body.classList.add("ligth");
        document.body.classList.remove("dark");

        bgMode.forEach((e) => {
            e.classList.add("bg-[#f8f9fa]");
            e.classList.remove("bg-[#23272f]");
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

// window.toggleSubmenu = function (header) {
//     const submenu = header.nextElementSibling;
//     const chevron = header.querySelector(".chevron");

//     if (!submenu || !chevron) return;

//     const isExpanded = submenu.classList.contains("max-h-40");
//     console.log(isExpanded);

//     // Collapse all submenus and reset chevrons and headers
//     document.querySelectorAll(".submenu").forEach((menu) => {
//         menu.classList.remove("max-h-40");
//         menu.classList.add("max-h-0");
//     });

//     document.querySelectorAll(".chevron").forEach((c) => {
//         c.classList.remove("rotate-180", "text-blue-600");
//         c.classList.add("text-gray-400");
//     });

//     document.querySelectorAll(".submenu-header").forEach((h) => {
//         h.classList.remove("text-blue-600", "bg-blue-200");
//         // h.querySelector("svg")?.classList.remove("text-blue-600");
//         h.querySelector("svg")?.classList.add("text-gray-400");
//     });

//     // Toggle current submenu
//     if (!isExpanded) {
//         submenu.classList.remove("max-h-0");
//         submenu.classList.add("max-h-40");

//         chevron.classList.add("rotate-180", "text-blue-600");

//         chevron.classList.remove("text-gray-400");

//         header.classList.add("text-blue-600", "bg-blue-200");
//     }
// };

window.toggleSubmenu = function (header) {
    const submenu = header.nextElementSibling;
    const chevron = header.querySelector(".chevron");

    if (!submenu || !chevron) return;

    const isExpanded = submenu.classList.contains("max-h-40");

    // Collapse all submenus and reset styles
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
        h.querySelector("svg")?.classList.remove("text-blue-600");
        h.querySelector("svg")?.classList.add("text-gray-400");
    });

    // Toggle current submenu
    if (!isExpanded) {
        submenu.classList.remove("max-h-0");
        submenu.classList.add("max-h-40");

        chevron.classList.add("rotate-180", "text-blue-600");
        chevron.classList.remove("text-gray-400");

        header.classList.add("text-blue-600", "bg-blue-200");

        // 🔐 Save the active submenu ID or index
        localStorage.setItem("activeSubmenu", header.getAttribute("data-id"));
    } else {
        localStorage.removeItem("activeSubmenu");
    }
};

document.addEventListener("DOMContentLoaded", function () {
    const savedId = localStorage.getItem("activeMenuItem");

    if (savedId) {
        const activeItem = document.querySelector(
            `.submenu-item[data-id="${savedId}"]`
        );

        if (activeItem) {
            activeItem.classList.add("active", "text-blue-600", "font-medium");
            activeItem.classList.remove("text-gray-700");
        }
    }

    const savedSubmenuId = localStorage.getItem("activeSubmenu");

    if (savedSubmenuId) {
        const header = document.querySelector(
            `.submenu-header[data-id="${savedSubmenuId}"]`
        );

        if (header) {
            const submenu = header.nextElementSibling;
            const chevron = header.querySelector(".chevron");

            submenu?.classList.remove("max-h-0");
            submenu?.classList.add("max-h-40");

            chevron?.classList.add("rotate-180", "text-blue-600");
            chevron?.classList.remove("text-gray-400");

            header.classList.add("text-blue-600", "bg-blue-200");
        }
    }
});

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
    localStorage.setItem("activeMenuItem", item.getAttribute("data-id"));
};

// Auto-expand the first menu on page load
document.addEventListener("DOMContentLoaded", () => {
    const firstHeader = document.querySelector(".menu-item .submenu-header");
    if (firstHeader) window.toggleSubmenu(firstHeader);
});

window.previewImg = (input) => {
    // console.log(item.classList.contains("preview"));
    // const url=document.g
    // const selectorFrm=document.querySelector(item);
    // const frmData=new FormData(form);
    // const url=form.getAttribute('data-url')
    // console.log(url);

    const file = input.files[0];
    const reader = new FileReader();
    // console.log(file);

    reader.onload = (e) => {
        const preview = document.getElementById("img-preview");

        console.log(preview);

        preview.src = e.target.result;
    };
    reader.readAsDataURL(file);

    // axios.post(url,frmData).then(response=>{
    //     console.log(response);

    // }).catch(error=>{
    //     console.log(error);

    // })
};

window.addEventListener("popstate", function (e) {
    if (e.state && e.state.url) {
        loadPage(e.state.url);
    }
});

// document.addEventListener("click", function (e) {
//     if (e.target.closest(".pagination a")) {
//         e.preventDefault();
//         const url = e.target.closest("a").getAttribute("href");
//         loadPage(url);
//         //     fetch(url, {
//         //         headers: { "X-Requested-With": "XMLHttpRequest" },
//         //     })
//         //         .then((response) => response.text())
//         //         .then((data) => {
//         //             document.getElementById("posts-container").innerHTML = data;

//         //         });
//     }
// });

// ✅ Handle browser back/forward buttons
// window.addEventListener("popstate", function (event) {
//     const state = event.state;
//     if (state && state.url) {
//         loadPage(state.url);
//     }
// });

// ✅ On first load: check if not homepage and auto-load
// document.addEventListener("DOMContentLoaded", function () {
//     const currentPath = window.location.pathname;

//     // Only load dynamically if not on the homepage
//     if (currentPath !== "/") {
//         loadPage(currentPath);
//     }
// });

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
                // dismissible: true,
            },
        ],
    });

    window.createCate = (selector) => {
        let frmSelector = document.querySelector(selector);
        let frmData = new FormData(frmSelector);

        if (!frmData.get("title") || frmData.get("title") === "") {
            notyf.open({
                type: "warning",
                message: "Empty field please enter it......!",
            });

            return;
        }

        const url = frmSelector.getAttribute("data-url");
        console.log(url);

        axios
            .post(url, frmData)
            .then((response) => {
                console.log(response);

                if (response.status === 200) {
                    // loadPage("/viewCourses");

                    notyf.success(response.data.message);
                    frmSelector.reset();
                }
            })
            .catch((error) => {
                console.log(error.response);

                if (error.status === 422) {
                    notyf.error(error.response.data.message);
                } else {
                    notyf.error("An unexpected error occurred");
                }
            });
    };

    window.deleteItem = (route, id) => {
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
                    .delete(`${route}${id}`)
                    .then((response) => {
                        const row = document.querySelector(
                            `.category-row-${id}`
                        );

                        if (row) {
                            row.remove();
                        }
                        if (route == "/delete-module/") {
                            console.log(10);
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

    window.edite = (edition, id) => {
        axios
            .get(`${edition}${id}`)
            .then((response) => {
                document.querySelector("#editFormContainer").innerHTML =
                    response.data;
                console.log(response.data);
            })
            .catch((error) => {
                console.log(error);
            });
    };
    window.udpateCate = (Selector) => {
        let frmSelector = document.querySelector(Selector);
        let frmData = new FormData(frmSelector);
        const url = frmSelector.getAttribute("data-url");
        // const valueTitlte = document.getElementById("ttlel_up");
        const files = frmSelector.querySelectorAll("input, select");

        for (const file of files) {
            if (!file.value.trim()) {
                notyf.open({
                    type: "warning",
                    message: "Empty field please enter it......!",
                });
                file.focus();
            }
        }
        axios
            .post(url, frmData, {
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((response) => {
                if (response.status == 200) {
                    // loadPage("/viewCourses");
                    notyf.success(response.data.message);
                }
                const files = frmSelector.querySelectorAll(
                    "input, select,textarea"
                );
                for (const file of files) {
                    file.value = "";
                }
                console.log(response.data.data);
                const row = document.querySelector(
                    `.category-row-${response.data.data.id}`
                );

                if (url == "/update-module") {
                    const txt = row?.querySelector(".txt-title");
                    txt.textContent = response.data.data.title;
                }
                // console.log(response.data.data);
            })
            .catch((error) => {
                console.log(error);

                if (error.status == 500) {
                    // notyf.success(response.data.message);
                    notyf.error("An unexpected error occurred");
                }
            });
    };
    window.searchBtn = (url, selector) => {
        const valueSearch = document.getElementById(selector).value;
        const tableBody = document.getElementById("tbl-body");

        let timerInterval;
        Swal.fire({
            title: "Auto close alert!",
            html: "I will close in <b></b> milliseconds.",
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });

        axios
            .post(url, { title: valueSearch })
            .then((response) => {
                var tr = "";
                console.log(response.data);

                if (response.data.html.length > 0) {
                    response.data.html.forEach((e, i) => {
                        tr += `
                      <tr id="category-row-{{$category->id}}" class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${
                                i + 1
                            }</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${
                                e["title"]
                            }</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                    <i class="fas fa-code text-gray-500 text-sm"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10-12-2024</td>
                            <td class="px-6 py-4 whitespace-nowrap flex space-x-2.5" colspan="2">
                                <button type="button" onclick="loadPage('{{ route('editCate', ${
                                    e["i"]
                                }) }}')"
                                    class="text-gray-100 hover:text-white bg-blue-500 p-2 rounded-md hover:bg-blue-700 flex px-3 gap-1.5 cursor-pointer duration-150">


                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen">
                                        <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path
                                            d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                    </svg>
                                    edit
                                </button>
                                <button onclick="deleteItem(${e["id"]})"
                                    class="text-gray-100 hover:text-white bg-rose-800 p-2 rounded-md hover:bg-rose-900 px-3 flex gap-1.5 cursor-pointer duration-150">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                    </svg>
                                    delete
                                </button>
                            </td>
                        </tr>
    
                    `;
                    });
                    tableBody.innerHTML = tr;
                } else {
                    Swal.fire({
                        title: "The Internet?",
                        text: "Not found ?",
                        icon: "question",
                    });
                    loadPage("/viewcategory");
                }
            })
            .catch((error) => {
                console.log(error);
            });
    };

    //courses
    window.createFrmCourses = (url) => {
        axios
            .get(url)
            .then((response) => {
                console.log(response);
            })
            .catch((error) => {
                console.log(error);
            });
    };

    window.handleAction = function (event) {
        // Hide all popups first
        document.querySelectorAll(".action-modal").forEach((modal) => {
            modal.classList.add("hidden");
            modal.classList.remove("opacity-100");
        });

        // Only handle if an .action button was clicked
        const actionBtn = event.target.closest(".action");
        if (actionBtn) {
            // Prevent the event from bubbling up and closing the modal immediately
            event.stopPropagation();

            // Find the modal next to the clicked button
            const modal = actionBtn.nextElementSibling;
            if (modal && modal.classList.contains("action-modal")) {
                modal.classList.remove("hidden");
                setTimeout(() => {
                    modal.classList.add("opacity-100");
                }, 10);
            }
        }
    };

    // Hide all popups when clicking anywhere else
    document.addEventListener("click", window.handleAction);

    // Prevent closing when clicking inside the popup
    document.querySelectorAll(".action-modal").forEach((modal) => {
        modal.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    });

    window.showModalModule = (id, title) => {
        const txt_title = document.querySelector(".update_module");
        const txt_id = document.querySelector(".id_module");
        txt_title.value = title;
        txt_id.value = id;
    };

    window.getModule = (id) => {
        console.log(id);

        axios
            .get(`/get-modules/${id}`)
            .then((response) => {
                // console.log(response.data);
                const courseSelect = document.getElementById("module");
                courseSelect.innerHTML =
                    '<option value="" hidden>Please select course</option>';
                response.data.data.forEach((module) => {
                    console.log(module);
                    const option = document.createElement("option");
                    option.value = module.id;
                    option.textContent = module.title;
                    courseSelect.appendChild(option);
                });
            })
            .catch((error) => {
                console.error("Error fetching module data:", error);
            });
    };

    window.view = (id) => {
        fetch(`/get-user/${id}`)
            .then((response) => response.json())
            .then((data) => {
                console.log(data);

                let tr = "";
                tr = `
                    <tr class=border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                               ${data["id"]}
                            </th>
                            <td class="px-6 py-4">
                               ${data["name"]}
                            </td>
                            <td class="px-6 py-4">
                                ${data["email"]}
                            </td>
                            <td class="px-6 py-4">
                             ${
                                 data["purchases"].length > 0
                                     ? data["purchases"].length
                                     : "No coures"
                             }
                            </td> <td class="px-6 py-4">
                               ${data["created_at"]}
                            </td>
                        </tr>
        
        `;
                document.getElementById("tbl_user").innerHTML = tr;
            });
    };

    window.addUserCourse = () => {
        let user = [];
        let cousers = [];
        const txtUser = document.getElementById("userName");
        const category = document.getElementById("category");

        axios
            .get("get-users-course")
            .then(function (response) {
                user = response["data"]["users"];
                user.forEach((user) => {
                    const option = document.createElement("option");

                    option.value = user["id"];
                    option.textContent = `${user["name"]} (${user["email"]})`;
                    txtUser.appendChild(option);
                });
                cousers = response["data"]["courses"];
                cousers.forEach((course) => {
                    const cateOption = document.createElement("option");
                    cateOption.value = course["id"];
                    cateOption.textContent = course["title"];
                    category.appendChild(cateOption);
                });
            })
            .catch((err) => {
                console.log(err);
            });
    };
});
