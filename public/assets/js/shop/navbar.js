if (document.querySelector(".btn-dropdown-cus-1")) {
    // Ambil elemen tombol dan dropdown
    const dropdownToggle = document.querySelector(".btn-dropdown-cus-1");
    const dropdownMenu = document.querySelector("#dd-cus");

    // Tambahkan event listener pada tombol dropdown
    dropdownToggle.addEventListener("click", (event) => {
        event.preventDefault(); // Mencegah default link behavior (jika href ada)

        // Toggle class 'active' untuk dropdown
        dropdownMenu.classList.toggle("active");
    });

    // Event listener untuk menutup dropdown saat klik di luar
    document.addEventListener("click", (event) => {
        if (
            !dropdownMenu.contains(event.target) &&
            !dropdownToggle.contains(event.target)
        ) {
            dropdownMenu.classList.remove("active");
        }
    });
}

if (document.querySelector(".nav-cus-1")) {
    const dropdownMenu = document.querySelector("#dd-cus");
    let lastScroll = 0;
    const navbar = document.querySelector(".nav-cus-1");

    const humMenu = document.querySelector("#hum-menu-cus");
    const navMenu = document.querySelector("#nav-hide-cus");

    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll <= 0) {
            navbar.classList.remove("hidden");
            return;
        }

        if (
            currentScroll > lastScroll &&
            !navbar.classList.contains("hidden")
        ) {
            navbar.classList.add("hidden");
            dropdownMenu.classList.remove("active");
            if (navMenu.classList.contains("show")) {
                navMenu.classList.remove("show");
            }
        } else if (
            currentScroll < lastScroll &&
            navbar.classList.contains("hidden")
        ) {
            navbar.classList.remove("hidden");
        }
        lastScroll = currentScroll;
    });
}

if (document.querySelector("#hum-menu-cus")) {
    const humMenu = document.querySelector("#hum-menu-cus");
    const navMenu = document.querySelector("#nav-hide-cus");
    // Tambahkan event listener untuk toggle menu
    humMenu.addEventListener("click", () => {
        navMenu.classList.toggle("show");
    });
}
