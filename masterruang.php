<?php
require_once "koneksi.php";

// Proses tambah ruang
if (isset($_POST['tambah'])) {
    $nama_ruang = trim($_POST['nama_ruang']);
    $gedung = trim($_POST['gedung']);

    if ($nama_ruang !== "" && $gedung !== "") {
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO master_ruang (nama_ruang, gedung) VALUES (?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "ss", $nama_ruang, $gedung);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: masterruang.php");
        exit;
    }
}

// Proses edit ruang
if (isset($_POST['edit'])) {
    $id = (int) $_POST['id'];
    $nama_ruang = trim($_POST['nama_ruang']);
    $gedung = trim($_POST['gedung']);

    if ($id > 0 && $nama_ruang !== "" && $gedung !== "") {
        $stmt = mysqli_prepare(
            $conn,
            "UPDATE master_ruang SET nama_ruang = ?, gedung = ? WHERE id = ?"
        );

        mysqli_stmt_bind_param($stmt, "ssi", $nama_ruang, $gedung, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: masterruang.php");
        exit;
    }
}

// Proses hapus ruang
if (isset($_POST['hapus'])) {
    $id = (int) $_POST['id'];

    if ($id > 0) {
        $stmt = mysqli_prepare(
            $conn,
            "DELETE FROM master_ruang WHERE id = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    header("Location: masterruang.php");
    exit;
}

// Ambil data ruang untuk diedit
$data_edit = null;

if (isset($_GET['edit'])) {
    $id_edit = (int) $_GET['edit'];

    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM master_ruang WHERE id = ?"
    );

    mysqli_stmt_bind_param($stmt, "i", $id_edit);
    mysqli_stmt_execute($stmt);

    $hasil_edit = mysqli_stmt_get_result($stmt);
    $data_edit = mysqli_fetch_assoc($hasil_edit);

    mysqli_stmt_close($stmt);
}

// Ambil seluruh data ruang
$data_ruang = mysqli_query(
    $conn,
    "SELECT * FROM master_ruang ORDER BY id ASC"
);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Master Ruang Ujian/Sidang</title>

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
            margin: 30px auto;
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

        th, td {
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
            border: 1px solid #ccc;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .kembali {
            display: inline-block;
            margin-top: 15px;
            color: black;
            text-decoration: none;
        }

        .form-ruang {
            width: 90%;
            margin: 15px auto;
        }

        .form-ruang input {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px;
            box-sizing: border-box;
        }

        @media (max-width: 760px) {
            .profil {
                width: 95%;
                padding: 15px;
                border-width: 10px;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <article>
        <div class="profil">

            <div class="judul">
                Master Ruang Ujian/Sidang
            </div>

            <a href="masterruang.php?mode=tambah" class="button">
                + Tambah Ruang
            </a>

            <?php if (isset($_GET['mode']) && $_GET['mode'] === 'tambah') { ?>
                <div class="form-ruang">
                    <h3>Tambah Ruang</h3>

                    <form method="POST" action="masterruang.php">
                        <label>Nama Ruang</label>
                        <input type="text" name="nama_ruang" required>

                        <label>Gedung</label>
                        <input type="text" name="gedung" required>

                        <button type="submit" name="tambah" class="button">
                            Simpan
                        </button>

                        <a href="masterruang.php" class="button">
                            Batal
                        </a>
                    </form>
                </div>
            <?php } ?>

            <?php if (isset($_GET['edit'])) { ?>
                <?php if ($data_edit) { ?>
                    <div class="form-ruang">
                        <h3>Edit Ruang</h3>

                        <form method="POST" action="masterruang.php">
                            <input
                                type="hidden"
                                name="id"
                                value="<?= (int) $data_edit['id'] ?>"
                            >

                            <label>Nama Ruang</label>
                            <input
                                type="text"
                                name="nama_ruang"
                                value="<?= htmlspecialchars($data_edit['nama_ruang']) ?>"
                                required
                            >

                            <label>Gedung</label>
                            <input
                                type="text"
                                name="gedung"
                                value="<?= htmlspecialchars($data_edit['gedung']) ?>"
                                required
                            >

                            <button type="submit" name="edit" class="button">
                                Simpan Perubahan
                            </button>

                            <a href="masterruang.php" class="button">
                                Batal
                            </a>
                        </form>
                    </div>
                <?php } else { ?>
                    <p>Data ruang tidak ditemukan.</p>
                <?php } ?>
            <?php } ?>

            <br><br>

            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Ruang</th>
                    <th>Gedung</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;

                if ($data_ruang && mysqli_num_rows($data_ruang) > 0) {
                    while ($row = mysqli_fetch_assoc($data_ruang)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>

                        <td>
                            <?= htmlspecialchars($row['nama_ruang']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['gedung']) ?>
                        </td>

                        <td>
                            <a
                                href="masterruang.php?edit=<?= (int) $row['id'] ?>"
                                class="button"
                            >Edit</a>

                            <form
                                method="POST"
                                action="masterruang.php"
                                style="display:inline"
                                onsubmit="return confirm('Yakin ingin menghapus ruang ini?');"
                            >
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= (int) $row['id'] ?>"
                                >

                                <button
                                    type="submit"
                                    name="hapus"
                                    class="button"
                                >Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="4">Belum ada data ruang.</td>
                    </tr>
                <?php } ?>
            </table>

            <a href="Ruang dan Fasilitas Sidang.php" class="kembali">
                <button type="button" class="button">Kembali</button>
            </a>

        </div>
    </article>

</body>
</html>