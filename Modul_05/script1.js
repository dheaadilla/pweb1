$(document).ready(function() {
    //1.Dasar Selektor
    $('#header').css('text-align', 'center'); //menambahkan align text pada header
    $('li').css('margin', '5px'); //memberi margin pada semua <li>

    //2. Selektor Atribut
    $('img[alt="Alumni Photo 1"]').css('border', 'solid red'); //mengubah boder pada gambar dengan alt="Alumni Photo 1"

    //3. Selektor Hirarki
    $('#alumniList').css('font-size', '18px'); //mengubah font size pada semua <li> di dalam #alumniList

    //4. Selektor Filter
    $('li:even').css('color', 'blue'); //mengubah warna teks pada elemen <li> genap
    $('.featured').addClass('highlight'); //menambahkan class highlight pada elemen dengan class featured

    //Event Handling untuk Galeri Foto
    $('.gallery img').on('click', function() {
        var src= $(this).attr('src');
        if (src) {
        $('#modalImage').attr('src', src);
        $('#myModal').fadeIn();
        }
    });

    $('.modal .close').on('click', function() {
        $('#myModal').fadeOut();
    });

    $(window).on('click', function(event) {
        if ($(event.target).is('#myModal')) {
            $('#myModal').fadeOut();
        }
    });
});