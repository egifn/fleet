<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 10mm;
            width: 210mm;
            min-height: 297mm;
            box-sizing: border-box;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 5mm;
        }

        .form {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 5mm;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .logo {
            width: 50px;
            margin-right: 10px;
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 70px;
            height: auto;
            margin-left: -10px;
        }

        .title {
            flex-grow: 1;
        }

        .title h2 {
            margin: 0;
            font-size: 14px;
            color: #087c9c;
        }

        .title h3 {
            margin: 0;
            font-size: 28px;
            color: #087c9c;
        }

        .address {
            font-size: 9px;
            text-align: center;
            margin: 0;
        }

        .form-group {
            margin-bottom: 8px;
            font-size: 12px;
        }

        .form-group label {
            display: inline-block;
            width: 100px;
        }

        .form-group input {
            border: none;
            border-bottom: 1px solid #000;
            width: calc(100% - 110px);
        }

        .note {
            font-size: 10px;
            font-style: italic;
            margin: 10px 0;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            font-size: 10px;
            margin-top: 10px;
        }

        @media print {
            body {
                width: 210mm;
                height: 297mm;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <template id="form-template">
            <div class="form">
                <div class="header">
                    <div class="logo">
                        <img src="/public/images/logokopprint.jpeg" alt="PT Lokon Prima Logo" />
                    </div>
                    <div class="title">
                        <h2>SURAT PENGANTAR PENGISIAN BBM</h2>
                        <h3>PT. LOKON PRIMA</h3>
                        <p class="address">
                            JL. RAYA PEMDA NOS KMP. DARUSSALAM, DESA PASIR
                            JAMBU<br />KEC. SUKARAJA KAB. BOGOR
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label>Kepada Yth:</label>
                    <input type="text" value="SPBU" readonly />
                </div>
                <div class="form-group">
                    <label>Nomor:</label>
                    <input type="text" />
                </div>
                <div class="form-group">
                    <p>Mohon di isi Solar / Pertalite / Dexlite*</p>
                </div>
                <div class="form-group">
                    <label>No. Kendaraan:</label>
                    <input type="text" />
                </div>
                <div class="form-group">
                    <label>Driver:</label>
                    <input type="text" />
                </div>
                <div class="form-group">
                    <label>Km. Kendaraan:</label>
                    <input type="text" />
                </div>
                <div class="form-group">
                    <label>Liter:</label>
                    <input type="text" />
                </div>
                <div class="form-group">
                    <label>Total/Rupiah:</label>
                    <input type="text" />
                </div>
                <div class="note">*coret yang tidak perlu</div>
                <div class="footer">
                    <span></span>
                    <span>(SPV / Ka. Depo / KPJ / Ka. Ops.)</span>
                </div>
            </div>
        </template>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.querySelector(".container");
            const template = document.querySelector("#form-template");

            // Create 6 forms
            for (let i = 0; i < 6; i++) {
                const clone = template.content.cloneNode(true);
                container.appendChild(clone);
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.querySelector(".container");
            const template = document.querySelector("#form-template");

            // Assuming $items is passed from the controller
            @foreach ($items as $item)
                const clone = template.content.cloneNode(true);

                // Populate the form fields
                clone.querySelector('input[placeholder="SPBU"]').value = "{{ $item->perusahaan }}";
                clone.querySelector('input[name="no_kendaraan"]').value = "{{ $item->no_polisi }}";
                clone.querySelector('input[name="driver"]').value = "{{ $item->salesman }}";
                clone.querySelector('input[name="km_kendaraan"]').value = "{{ $item->kilometer }}";
                clone.querySelector('input[name="liter"]').value = "{{ $item->liter_qty }}";
                clone.querySelector('input[name="total_rupiah"]').value = "{{ $item->biaya_bbm }}";

                container.appendChild(clone);
            @endforeach
        });
    </script>
</body>

</html>
