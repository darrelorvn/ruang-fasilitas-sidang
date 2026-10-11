<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fasilitas Ruangan</title>

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
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
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

            <div class="judul">
                Fasilitas Proyektor/PC
            </div>

            <button class="button">
                + Tambah Fasilitas
            </button>

            <br><br>

            <table>

                <tr>
                    <th>ID</th>
                    <th>Ruang</th>
                    <th>Proyektor</th>
                    <th>PC</th>
                    <th>Aksi</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Ruang Sidang 1</td>
                    <td>Ada</td>
                    <td>Ada</td>
                    <td>
                        <button class="button">Edit</button>
                        <button class="button">Hapus</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Ruang Sidang 2</td>
                    <td>Ada</td>
                    <td>Tidak Ada</td>
                    <td>
                        <button class="button">Edit</button>
                        <button class="button">Hapus</button>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Ruang Sidang 3</td>
                    <td>Tidak Ada</td>
                    <td>Ada</td>
                    <td>
                        <button class="button">Edit</button>
                        <button class="button">Hapus</button>
                    </td>
                </tr>

            </table>

            <a href="Ruang dan Fasilitas Sidang.html" class="kembali">
                <button class="button">Kembali</button>
            </a>

        </div>

    </article>

</body>

</html>