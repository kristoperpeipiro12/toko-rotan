<div class="con-tlg-popup" id="formModal">
    <div class="card-tgl-popup">
        <div class="container-ttl-pop">
            <div class="popup-ttl-pop">
                <div class="wrap-head-pop">
                    <h2 class="title-ttl-pop">Tambah Tanggal Lahir</h2>
                    <div class="x-rotate" id="closeModal">
                        <i class='bx bx-x x-popup'></i>
                    </div>
                </div>
                <p class="description-ttl-pop">Kamu hanya dapat mengatur tanggal lahir satu kali. Pastikan tanggal
                    lahir sudah benar.</p>

                <div class="dropdown-container-ttl-pop">
                    <select class="dropdown-ttl-pop" name="fd">
                        <option>Tanggal</option>
                        @for ($i = 1; $i < 32; $i++)
                            <option value="">{{ $i }}</option>
                        @endfor
                    </select>
                    <select class="dropdown-ttl-pop">
                        <option>Bulan</option>
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option>September</option>
                        <option>Oktober</option>
                        <option>November</option>
                        <option>Desember</option>
                    </select>
                    <select class="dropdown-ttl-pop">
                        <option>Tahun</option>
                        <script>
                            let yearSelect = document.currentScript.parentElement;
                            let currentYear = new Date().getFullYear();
                            for (let i = currentYear; i >= 1900; i--) {
                                let option = document.createElement("option");
                                option.textContent = i;
                                option.value = i;
                                yearSelect.appendChild(option);
                            }
                        </script>
                    </select>
                </div>

                <button class="button-ttl-pop">Simpan</button>
            </div>
        </div>
    </div>
</div>
