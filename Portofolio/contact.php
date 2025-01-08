<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Dhea Adilla Noviandasyiam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?> <!-- Header -->

    <div class="container mt-5">
        <h2>Contact Me</h2>
        <form action="process_contact.php" method="post"> <!-- Form -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tulis pesan Anda di sini" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>

        <hr class="my-5">

        <h3>Pesan Masuk</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Balasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Tampilkan data dari database
                $conn = new mysqli("localhost", "root", "", "portofolio");
                $result = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['message']}</td>
                            <td>{$row['reply']}</td>
                            <td>
                                <form action='reply_contact.php' method='post'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <textarea name='reply' class='form-control mb-2' rows='2' placeholder='Tulis balasan'></textarea>
                                    <button type='submit' class='btn btn-success btn-sm'>Balas</button>
                                </form>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include 'footer.php'; ?> <!-- Footer -->
</body>
</html>
