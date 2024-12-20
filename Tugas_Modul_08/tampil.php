// ambil_alumni.php
<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'username', 'password', 'database');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Ambil data alumni dari database
$sql = "SELECT * FROM alumni";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nim']}</td>
                <td>{$row['name']}</td>
                <td>{$row['major']}</td>
                <td>{$row['year']}</td>
                <td><button class='btn-delete'>Hapus</button></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
}

$conn->close();
?>
