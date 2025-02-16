document.addEventListener("DOMContentLoaded", function () {
    const wrapPopupAlamat = document.getElementById("wrap-popup-co");
    const wrapPopupUbah = document.getElementById("wrap-popup-ubah");
    const wrapPopupKeluar = document.getElementById("wrap-popup-keluar");

    const gantiAlamat = document.getElementById("ganti-alamat");
    const ubahAlamat = document.getElementById("ubah-alamat");
    const keluar = document.getElementById("keluar");

    const closeUbah = document.getElementById("close-ubah");
    const closeAlamat = document.getElementById("close-alamat");
    const batal = document.getElementById("batal");

    gantiAlamat.addEventListener("click", function () {
        wrapPopupAlamat.classList.add("active");
    });

    ubahAlamat.addEventListener("click", function () {
        wrapPopupUbah.classList.add("active");
    });

    closeUbah.addEventListener("click", function () {
        wrapPopupUbah.classList.remove("active");
    });

    closeAlamat.addEventListener("click", function () {
        wrapPopupAlamat.classList.remove("active");
    });

    keluar.addEventListener("click", function () {
        wrapPopupKeluar.classList.add("active");
    });

    batal.addEventListener("click", function () {
        wrapPopupKeluar.classList.remove("active");
    });
});
