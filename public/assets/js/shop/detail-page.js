const decreaseButton = document.getElementById("decrease");
const increaseButton = document.getElementById("increase");
const quantityInput = document.getElementById("quantity");
const maxStock = 106; // Jumlah stok maksimal
const minStock = 1; // Nilai minimum

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
const selectedPortalWarna = document.querySelectorAll("#selected-portal-warna");

selectedPortalWarna.forEach((element) => {
    element.addEventListener("click", function () {
        element.classList.add("active");
    });
});
