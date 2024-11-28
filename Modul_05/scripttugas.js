$(document).ready(function () {
    // Pastikan gambar tidak tersembunyi sebelum fade-in
    $('.gallery img').css('opacity', 0); // Menyembunyikan gambar

    // 1. Fade-in semua gambar saat halaman dimuat
    $('.gallery img').each(function (index) {
        var $this = $(this); // Mengambil gambar
        // Menunggu gambar dimuat lalu menerapkan fade-in
        $this.on('load', function () {
            setTimeout(function () {
                $this.fadeTo(1500, 1); // Fade-in dengan durasi lebih lama
            }, index * 1000); // Penundaan setiap gambar berdasarkan index
        }).each(function () {
            if (this.complete) {
                $(this).trigger('load'); // Jika gambar sudah dimuat, trigger 'load'
            }
        });
    });
S
    // 2. Klik gambar untuk menampilkan modal dengan ukuran penuh
    $('.gallery img').on('click', function () {
        var src = $(this).attr('src'); // Ambil URL gambar
        $('#modalImage').attr('src', src); // Masukkan gambar ke dalam modal
        $('#myModal').fadeIn(); // Tampilkan modal
    });

    // 3. Tutup modal dengan tombol "Close"
    $('.close').on('click', function () {
        $('#myModal').fadeOut();
    });

    // 4. Tutup modal dengan mengklik area di luar gambar
    $('#myModal').on('click', function (e) {
        if ($(e.target).is('#myModal')) {
            $(this).fadeOut();
        }
    });
});
