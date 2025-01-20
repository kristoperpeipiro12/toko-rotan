// Ambil elemen modal dan tombol close
const modal = document.getElementById("formModal");
const closeModal = document.getElementById("closeModal");

// Fungsi untuk menutup modal
closeModal.addEventListener("click", function () {
    modal.style.display = "none";
});

// Menutup modal ketika klik di luar konten
window.addEventListener("click", function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

// Contoh untuk membuka modal (jika ada tombol buka)
const openTglModal = document.getElementById("openTglModal");
if (openTglModal) {
    openTglModal.addEventListener("click", function () {
        modal.style.display = "block";
    });
}
