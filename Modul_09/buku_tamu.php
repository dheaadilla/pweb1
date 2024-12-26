<div class="container mt-5">
    <h2 class="mb-4">Buku Tamu</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

    <?php
    include 'Latihan_09_config.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $pesan = $_POST['pesan'];

        $sql = "INSERT INTO buku_tamu (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Pesan Anda telah disimpan. Terima kasih!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
        }
    }

    $sql = "SELECT * FROM buku_tamu ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3 class='mt-5'>Daftar Buku Tamu</h3>";
        echo "<table class='table table-bordered mt-3'><thead><tr><th>Nama</th><th>Email</th><th>Pesan</th></tr></thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['nama']}</td><td>{$row['email']}</td><td>{$row['pesan']}</td></tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='mt-5'>Belum ada pesan di buku tamu.</p>";
    }
    $conn->close();
    ?>
</div>
