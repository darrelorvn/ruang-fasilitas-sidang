<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruang</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .profil {
            width: 700px;
            min-height: 300px;

            border: 20px solid #491d1d;
            border-radius: 20px;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);

            margin: 30px ;
            padding: 25px;

            box-sizing: border-box;

            background-color: white;
        }

        .judul {
            font-size: 20px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th,
        td {
            border: 3px solid #ddd;
            padding: 2px;
            text-align: center;
        
        }

        th {
            background-color: #f5f5f5;
        }

        .button {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 20px;
            background-color: white;
            color: black;
            border-radius: 8px;
            text-decoration: none;
        }

        .kembali {
            display: inline-block;

            margin-top: 15px;

            color: black;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <article>
        <div class="profil">
            <p>Tambah Ruang</p>
            <form>
                <label for="N.Ruang">Nama Ruang:</label><br>
                <input type="text" id="N.Ruang" name="N.Ruang"><br>
                <label for="GD">Gedung:</label><br>
                <input type="text" id="GD" name="GD">
            </form>

               <a href="Ruang dan Fasilitas Sidang.html" class="kembali">
                <button class="button">Kembali</button>
            </a>
        </div>

    </article>
</body>

</html>