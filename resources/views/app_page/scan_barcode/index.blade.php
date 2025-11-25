<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Scanner</title>
    <meta name="robots" content="noindex, nofollow">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        main {
            width: 100%;
            max-width: 500px;
            background: #ffffff;
            /* border-radius: 12px; */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        header {
            background: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header h1 {
            font-size: 1.8rem;
            margin: 0;
        }

        .content {
            padding: 0px 20px;
        }

        #reader {
            width: 100%;
            max-width: 400px;
            margin: 20px auto;
        }

        #result {
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #28a745;
            font-weight: bold;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-size: 1rem;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: all 0.3s;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .card {
            padding: 15px 20px;
        }

        .btn {
            width: 100%;
            padding: 12px 20px;
            font-size: 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn:active {
            background-color: #004494;
            transform: scale(0.98);
        }

        footer {
            text-align: center;
            padding: 15px;
            font-size: 0.9rem;
            color: #777;
            background: #f1f1f1;
        }

        /* Responsif untuk layar kecil */
        @media screen and (max-width: 600px) {
            header h1 {
                font-size: 1.5rem;
            }

            input[type="text"] {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <main>
        <header>
            <h1>Barcode Scanner</h1>
        </header>
        <div class="content">
            <div id="reader"></div>
            <div class="card">
                <div id="result">Data Mobil Get-In Get-Out</div>
                <label for="NoPolTextbox">No Polisi</label>
                <input style="95%" type="text" id="NoPolTextbox" name="NoPolTextbox"
                    placeholder="Masukkan No Polisi">
                <label for="PerusahaanTextbox">Perusahaan</label>
                <input style="95%" type="text" id="PerusahaanTextbox" name="PerusahaanTextbox"
                    placeholder="Nama Perusahaan">
                <button type="button" class="btn" id="button_simpan" onclick="simpan()">Simpan</button>
            </div>
        </div>

    </main>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
    integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const scanner = new Html5QrcodeScanner('reader', {
        qrbox: {
            width: 250,
            height: 250,
        },
        fps: 20,
    });

    scanner.render(success, error);

    function success(result) {
        document.getElementById('result').innerText = result;

        const barcodeValue = result;
        document.getElementById('scanResultTextbox').value = barcodeValue;

        var url = '{{ url('app/administrator/admin/barcode_scan/get_armada_details') }}' + '/' + barcodeValue;
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: url,
            success: function(response) {
                $('#NoPolTextbox').val(response.no_polisi);
                $('#PerusahaanTextbox').val(response.nama_pemilik);
            },
            error: function(error) {
                console.error(error);
            }
        });

        scanner.clear();
    }

    function error(err) {
        console.error(err);
    }

    function simpan() {
        let no_pol = document.getElementById('NoPolTextbox').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route('admin.barcode_scan/store.store') }}",
            data: {
                no_pol: no_pol,
            },
            success: function(response) {
                if (response.status === true) {
                    document.getElementById('NoPolTextbox').value = '';
                    document.getElementById('PerusahaanTextbox').value = '';
                    alert('Sukses, Data Berhasil disimpan...');
                }
            }
        });
    }
</script>
