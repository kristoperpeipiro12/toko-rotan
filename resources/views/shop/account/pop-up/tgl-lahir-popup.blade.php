<div class="con-tlg-popup">
    <div class="card-tgl-popup">
        <div class="container-ttl-pop">
            <div class="popup-ttl-pop">
                <div class="wrap-head-pop">
                    <h2 class="title-ttl-pop">Tambah Tanggal Lahir</h2>
                    <div class="x-rotate">
                        <i class='bx bx-x x-popup'></i>
                    </div>
                </div>
                <p class="description-ttl-pop">Kamu hanya dapat mengatur tanggal lahir satu kali. Pastikan tanggal
                    lahir sudah benar.</p>

                <div class="dropdown-container-ttl-pop">
                    <select class="dropdown-ttl-pop">
                        <option>Tanggal</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
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
