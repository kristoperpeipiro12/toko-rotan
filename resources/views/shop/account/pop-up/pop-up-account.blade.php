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
                <p class="description-ttl-pop">Kamu hanya dapat mengatur tanggal lahir satu kali. Pastikan tanggal lahir
                    sudah benar.</p>

                <form action="{{ route('cs.tgl_lahir') }}" method="POST">
                    @csrf
                    <div class="dropdown-container-ttl-pop">
                        <select class="dropdown-ttl-pop" name="tanggal" required>
                            <option value="">Tanggal</option>
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <select class="dropdown-ttl-pop" name="bulan" required>
                            <option value="">Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <select class="dropdown-ttl-pop" name="tahun" required>
                            <option value="">Tahun</option>
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

                    <button type="submit" class="button-ttl-pop">Simpan</button>
                </form>
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

                <form action="{{ route('cs.jk') }}" method="POST">
                    @csrf
                    <div class="dropdown-container-ttl-pop">
                        <select name="jenis_kelamin" class="dropdown-ttl-pop" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <button type="submit" class="button-ttl-pop">Simpan</button>
                </form>
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
