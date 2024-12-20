// simpan_alumni.php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Koneksi ke database
    $conn = new mysqli('localhost', 'username', 'password', 'database');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Ambil data dari request POST
    $nim = $_POST['nim'];
    $name = $_POST['name'];
    $major = $_POST['major'];
    $year = $_POST['year'];

    // Query untuk menyimpan data ke tabel alumni
    $sql = "INSERT INTO alumni (nim, name, major, year) VALUES ('$nim', '$name', '$major', '$year')";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
