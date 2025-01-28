const openAccModalButtons = document.querySelectorAll("#openAccModal");
const modal = document.getElementById("formModal");
const closeModalButtons = [
    document.getElementById("closeModal1"),
    document.getElementById("closeModal2"),
    document.getElementById("closeModal3"),
];

if (openAccModalButtons) {
    openAccModalButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Ambil data-content dari elemen yang diklik
            const contentId = this.getAttribute("data-content");

            // Tampilkan modal
            modal.style.display = "block";

            // Sembunyikan semua konten di dalam modal
            const modalContents = document.querySelectorAll(".popup-ttl-pop");
            modalContents.forEach(
                (content) => (content.style.display = "none")
            );

            // Tampilkan konten yang sesuai
            const targetContent = document.getElementById(contentId);
            if (targetContent) {
                targetContent.style.display = "block";
            }
        });
    });
}

// Tombol untuk menutup modal
closeModalButtons.forEach((button) => {
    if (button) {
        button.addEventListener("click", function () {
            modal.style.display = "none";
        });
    }
});

// Number Only
const numberInput = document.getElementById("numberOnly");

if (numberInput) {
    numberInput.addEventListener("input", function () {
        // Hapus semua karakter non-angka, kecuali "+" di awal
        let value = this.value.replace(/[^0-9+]/g, "");

        // Pastikan "+" hanya di awal
        if (value.indexOf("+") > 0) {
            value = value.replace("+", "");
        }

        // Batasi panjang maksimal menjadi 14 karakter
        if (value.length > 14) {
            value = value.substring(0, 14);
        }

        this.value = value;
    });
}
