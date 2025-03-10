

// ubah alamat //
document.addEventListener("DOMContentLoaded", function() {
    const modalUbah = document.getElementById("wrap-popup-ubah");
    const closeUbah = document.getElementById("close-ubah");
    const formUpdate = document.getElementById("updateAlamatForm");

    if (!modalUbah || !closeUbah || !formUpdate) {
        console.error("❌ ERROR: Elemen form/modal tidak ditemukan!");
        return;
    }

    // ✅ Event Listener Tombol "Ubah Alamat"
    document.querySelectorAll(".btn-ubah-alamat").forEach(button => {
        button.addEventListener("click", function() {
            const idPenerima = this.getAttribute("data-id");
            const lokasi = this.getAttribute("data-lokasi");
            const alamat = this.getAttribute("data-alamat");
            const namaPenerima = this.getAttribute("data-nama");
            const noHpPenerima = this.getAttribute("data-nohp");

            // Isi form dengan data yang dipilih
            document.getElementById("id_penerima").value = idPenerima;
            document.getElementById("lokasi").value = lokasi;
            document.getElementById("alamat").value = alamat;
            document.getElementById("nama_penerima").value = namaPenerima;
            document.getElementById("nohp_penerima").value = noHpPenerima;

            // Tampilkan modal
            modalUbah.style.display = "flex";
        });
    });

    // ✅ Event Listener Tombol "Tutup Modal"
    closeUbah.addEventListener("click", function() {
        modalUbah.style.display = "none";
    });

    // ✅ Event Listener Submit Form (AJAX tanpa Reload)
    formUpdate.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(formUpdate);
        formData.append("_method", "PUT");

        fetch(formUpdate.action, {
                method: "POST", // Gunakan POST karena FormData tidak mendukung PUT
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                },
                body: formData
            })
            .then(response => response.json()) // Pastikan server mengembalikan JSON
            .then(data => {
                if (data.success) {
                    // ✅ Tutup modal setelah sukses update
                    modalUbah.style.display = "none";

                    let radioAlamat = document.querySelector(
                        `input[name='pilih_alamat'][value='${data.penerima.id_penerima}']`);
                    if (radioAlamat) {
                        radioAlamat.setAttribute("data-lokasi", data.penerima.lokasi);
                        radioAlamat.setAttribute("data-alamat", data.penerima.alamat);
                        radioAlamat.setAttribute("data-nama", data.penerima.nama_penerima);
                        radioAlamat.setAttribute("data-nohp", data.penerima.nohp_penerima);

                        // Update teks di dalam daftar alamat
                        let containerAlamat = radioAlamat.closest(".container-alamat");
                        if (containerAlamat) {
                            containerAlamat.querySelector(".header-alamat").textContent = data
                                .penerima.lokasi;
                            let contentAlamat = containerAlamat.querySelector(
                                ".content-alamat");
                            contentAlamat.innerHTML = `
                        <span>Nama : ${data.penerima.nama_penerima}</span>
                        <span>Alamat : ${data.penerima.alamat}</span>
                        <span>No. Handphone : ${data.penerima.nohp_penerima}</span>
                    `;
                        }
                    }

                    // ✅ Jika alamat yang diubah adalah yang sedang dipilih, update tampilan utama
                    let selectedRadio = document.querySelector(
                        `input[name="pilih_alamat"]:checked`);
                    if (selectedRadio && selectedRadio.value === data.penerima.id_penerima) {
                        document.getElementById("alamat-lokasi").textContent =
                            `${data.penerima.lokasi} • ${data.penerima.nama_penerima}`;
                        document.getElementById("alamat-detail").textContent =
                            `${data.penerima.alamat}, ${data.penerima.nohp_penerima}`;
                    }

                    // ✅ Rebind event listener setelah update
                    rebindPilihAlamatEvent();
                } else {
                    console.error("❌ Gagal memperbarui alamat!");
                }
            })
            .catch(error => {
                console.error("❌ ERROR:", error);
            });
    });

    // ✅ Fungsi untuk mengikat ulang event listener setelah update
    function rebindPilihAlamatEvent() {
        document.querySelectorAll('input[name="pilih_alamat"]').forEach((radio) => {
            radio.addEventListener("change", function() {
                let lokasi = this.dataset.lokasi;
                let nama = this.dataset.nama;
                let alamat = this.dataset.alamat;
                let nohp = this.dataset.nohp;

                // Update tampilan alamat
                document.getElementById("alamat-lokasi").innerHTML = `${lokasi} • ${nama}`;
                document.getElementById("alamat-detail").innerHTML = `${alamat}, ${nohp}`;

                let alamatKosong = document.getElementById("alamat-kosong");
                if (alamatKosong) {
                    alamatKosong.style.display = "none";
                }

                document.getElementById("wrap-popup-co").style.display = "none";
            });
        });
    }
});
