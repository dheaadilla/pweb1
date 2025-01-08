<?php
$conn = new mysqli("localhost", "root", "", "portofolio");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $reply = htmlspecialchars($_POST['reply']);

    $stmt = $conn->prepare("UPDATE contacts SET reply = ? WHERE id = ?");
    $stmt->bind_param("si", $reply, $id);
    $stmt->execute();

    echo "<h2>Pesan berhasil dibalas!</h2>";
    echo "<a href='contact.php'>Kembali</a>";
} else {
    echo "<h2>Akses tidak valid!</h2>";
}
?>
