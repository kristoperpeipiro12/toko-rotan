const decreaseButton = document.getElementById("decrease");
const increaseButton = document.getElementById("increase");
const quantityInput = document.getElementById("quantity");
const maxStock = 106; // Jumlah stok maksimal
const minStock = 1; // Nilai minimum
const colorCards = document.querySelectorAll(".card-protal-warna");
const localStorageKey = "selectedColor";

// Fungsi untuk memastikan nilai input tetap dalam rentang yang diizinkan
function validateInput() {
    let currentValue = parseInt(quantityInput.value, 10);

    // Jika nilai kosong, biarkan sementara
    if (isNaN(currentValue) || currentValue === "") {
        quantityInput.value = "";
        return;
    }

    // Pastikan nilai dalam batas yang diizinkan
    if (currentValue < minStock) {
        quantityInput.value = minStock;
    } else if (currentValue > maxStock) {
        quantityInput.value = maxStock;
    }
}

// Klik tombol decrease
decreaseButton.addEventListener("click", function () {
    let currentValue = parseInt(quantityInput.value, 10) || minStock;
    if (currentValue > minStock) {
        quantityInput.value = currentValue - 1;
    }
});

// Klik tombol increase
increaseButton.addEventListener("click", function () {
    let currentValue = parseInt(quantityInput.value, 10) || minStock;
    if (currentValue < maxStock) {
        quantityInput.value = currentValue + 1;
    }
});

// Ketika pengguna mengetik angka
quantityInput.addEventListener("input", function () {
    // Hapus karakter non-angka
    this.value = this.value.replace(/[^0-9]/g, "");
    validateInput();
});

// Validasi ketika input kehilangan fokus (blur)
quantityInput.addEventListener("blur", function () {
    validateInput();
    // Jika kosong, kembalikan ke nilai minimal
    if (this.value === "") {
        this.value = minStock;
    }
});

// portal warna
// Fungsi untuk memulihkan pilihan dari localStorage
document.addEventListener("DOMContentLoaded", () => {
    const selectedSlug = localStorage.getItem(localStorageKey);

    if (selectedSlug) {
        // Temukan elemen yang sesuai dengan slug yang disimpan
        const selectedCard = Array.from(colorCards).find(
            (card) => card.getAttribute("href") === selectedSlug
        );

        if (selectedCard) {
            selectedCard.classList.add("active"); // Berikan class 'active' ke elemen yang sesuai
        }
    }
});

// Tambahkan event listener pada setiap card
colorCards.forEach((card) => {
    card.addEventListener("click", function (e) {
        // Simpan slug yang dipilih ke localStorage
        const slug = this.getAttribute("href");
        localStorage.setItem(localStorageKey, slug);
    });
});
