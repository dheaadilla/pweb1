<?php 
$conn = new mysqli("localhost", "root", "", "portofolio");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    // Kirim email notifikasi (opsional)
    $to = "your_email@example.com";
    $subject = "Pesan Baru dari $name";
    $body = "Nama: $name\nEmail: $email\nPesan:\n$message";
    $headers = "From: $email";

    mail($to, $subject, $body, $headers);

    echo "
    <!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Pesan Terkirim</title>
        <link href='https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='container text-center mt-5'>
            <h2 class='text-success'>Pesan berhasil dikirim!</h2>
            <a href='contact.php' class='btn btn-primary mt-3'>Kembali</a>
        </div>
    </body>
    </html>";
} else {
    echo "
    <!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Akses Ditolak</title>
        <link href='https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='container text-center mt-5'>
            <h2 class='text-danger'>Akses tidak valid!</h2>
            <a href='contact.php' class='btn btn-warning mt-3'>Kembali</a>
        </div>
    </body>
    </html>";
}
?>
