<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - Dhea Adilla Noviandasyiam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?> <!-- Header menggunakan PHP -->

    <div class="container mt-5">
        <h2>Halo! I'm Dhea,</h2>
        <p>seorang mahasiswi semester 3 Prodi Sistem Informasi, Fakultas Ilmu Komputer 
            di Universitas Kuningan. Saat ini aku menjabat sebagai Bendahara Divisi BEM Fakultas, 
            di mana aku bertanggung jawab mengelola keuangan kegiatan mahasiswa fakultas untuk 
            memastikan transparansi dan efisiensi anggaran. Aku juga menjabat sebagai Bendahara 
            Umum PIK-R Askara Harsa Ciporang, berperan dalam mengatur seluruh administrasi keuangan 
            program yang berfokus pada kesehatan reproduksi remaja dan merangkap sebagai Pendidik 
            Sebaya di wilayah Kelurahan Ciporang hingga Kota Kuningan. Selain itu, aku dipercaya sebagai 
            Duta Genre Kabupaten Kuningan 2024, yang memberikan kesempatan bagiku untuk mengedukasi generasi muda tentang 
            perencanaan kehidupan berkeluarga serta isu-isu sosial yang relevan.</p>

        <ul>
            <li><strong>Pendidikan:</strong> Mahasiswi Fakultas Ilmu Komputer, Universitas Kuningan.</li>
            <li><strong>Keterampilan:</strong> Manajemen Keuangan, Kepemimpinan, dan Public Speaking.</li>
            <li><strong>Tujuan Karir:</strong> Berinovasi solusi yang menjembatani pendidikan dan teknologi.</li>
        </ul>

        <!-- Tambahan untuk Visi dan Motivasi -->
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Visi</h3>
                        <p class="card-text">
                            <?php
                            echo "Membangun generasi yang berkualitas melalui pendidikan, literasi, dan inovasi 
                            teknologi untuk menciptakan individu yang berdaya saing, tangguh, serta mampu berkontribusi 
                            dalam perubahan positif bagi masyarakat global.";
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Motivasi</h3>
                        <p class="card-text">
                            <?php
                            echo "Seize every challenge with passion and purpose, turning obstacles into opportunities 
                            to grow, inspire, and make a meaningful impact in the world!.";
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?> <!-- Footer menggunakan PHP -->
</body>
</html>
