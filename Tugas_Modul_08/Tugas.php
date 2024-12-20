<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .btn-delete {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Tracer Alumni</h1>

        <!-- Form Tambah Data -->
        <div class="card mb-4">
            <div class="card-body">
                <h4>Tambah Alumni</h4>
                <form id="alumniForm">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Jurusan:</label>
                        <input type="text" class="form-control" id="major" name="major" required>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun Kelulusan:</label>
                        <input type="text" class="form-control" id="year" name="year" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>

        <!-- Tabel Data Alumni -->
        <div class="card">
            <div class="card-body">
                <h4>Daftar Alumni</h4>
                <input type="text" id="search" class="form-control mb-3" placeholder="Cari Nama Alumni">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="alumniTable"></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Event: Submit Form Tambah Alumni
            $('#alumniForm').submit(function (e) {
                e.preventDefault();

                // Ambil data dari form
                const nim = $('#nim').val();
                const name = $('#name').val();
                const major = $('#major').val();
                const year = $('#year').val();

                // Tambahkan baris baru ke tabel
                $('#alumniTable').append(`
                    <tr>
                        <td>${nim}</td>
                        <td>${name}</td>
                        <td>${major}</td>
                        <td>${year}</td>
                        <td><button class="btn-delete">Hapus</button></td>
                    </tr>
                `);

                // Reset form
                this.reset();
            });

            // Event: Hapus Baris
            $('#alumniTable').on('click', '.btn-delete', function () {
                $(this).closest('tr').remove();
            });

            // Event: Pencarian Data
            $('#search').on('keyup', function () {
                const value = $(this).val().toLowerCase();
                $('#alumniTable tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</body>
</html>