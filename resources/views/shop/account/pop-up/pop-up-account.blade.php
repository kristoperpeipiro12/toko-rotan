<div class="con-tlg-popup" id="formModal">
    <div class="card-tgl-popup">
        <div class="container-ttl-pop">
            <div class="popup-ttl-pop" id="content-1">
                <div class="wrap-head-pop">
                    <h2 class="title-ttl-pop">Tambah Tanggal Lahir</h2>
                    <div class="x-rotate" id="closeModal1">
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

            <div class="popup-ttl-pop" id="content-2">
                <div class="wrap-head-pop">
                    <h2 class="title-ttl-pop">Tambah Jenis Kelamin</h2>
                    <div class="x-rotate" id="closeModal2">
                        <i class='bx bx-x x-popup'></i>
                    </div>
                </div>
                <p class="description-ttl-pop">Kamu hanya dapat mengatur jenis kelamin satu kali. Pastikan jenis kelamin
                    sudah benar.</p>

                <div class="dropdown-container-ttl-pop">
                    <select class="dropdown-ttl-pop">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>

                <button class="button-ttl-pop">Simpan</button>
            </div>

            <div class="popup-ttl-pop" id="content-3">
                <div class="wrap-head-pop">
                    <h2 class="title-ttl-pop">Ubah Alamat</h2>
                    <div class="x-rotate" id="closeModal3">
                        <i class='bx bx-x x-popup'></i>
                    </div>
                </div>

                <div class="dropdown-container-ttl-pop almt-con">
                    <select class="dropdown-ttl-pop">
                        <option>Rumah</option>
                        <option>Kantor</option>
                    </select>

                    <div class="wrap-input-almt">
                        <label for="alamatPenerima">Alamat</label>
                        <input id="alamatPenerima" type="text" class="input-txt-almt" placeholder="Jl/Komp/No.Rumah">
                    </div>

                    <div class="wrap-input-almt">
                        <label for="nama">Nama Penerima</label>
                        <input id="nama" type="text" class="input-txt-almt" placeholder="nama">
                    </div>

                    <div class="wrap-input-almt">
                        <label for="numberOnly">Nomor HP</label>
                        <input id="numberOnly" type="text" class="input-txt-almt" placeholder="+ 62">
                    </div>
                </div>

                <button class="button-ttl-pop">Simpan</button>
            </div>

        </div>
    </div>
</div>
