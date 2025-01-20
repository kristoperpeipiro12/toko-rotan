const tabs = document.querySelectorAll(".nav-tab-cus-cn1");
const contents = document.querySelectorAll(".card-content-cus-cn1");

tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
        // Remove active class from all tabs and contents
        tabs.forEach((t) => t.classList.remove("active-cus-cn1"));
        contents.forEach((c) => c.classList.remove("active-cus-cn1"));

        // Add active class to the clicked tab and its content
        tab.classList.add("active-cus-cn1");
        document
            .getElementById(tab.dataset.target)
            .classList.add("active-cus-cn1");
    });
});
