$(document).ready(function () {
    $("#alumniForm").on("submit", function (e) {
        e.preventDefault();
        
        const nim = $("#nim").val();
        const name = $("#name").val();
        const major = $("#major").val();
        const year = $("#year").val();

        // Kirim data ke PHP
        $.ajax({
            url: 'simpan_alumni.php',
            type: 'POST',
            data: {
                nim: nim,
                name: name,
                major: major,
                year: year
            },
            success: function(response) {
                alert(response);
                // Perbarui tabel (gunakan PHP untuk mengambil data terbaru jika perlu)
            }
        });
    });
});
