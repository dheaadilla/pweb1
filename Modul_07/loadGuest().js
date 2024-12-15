//Handle form submit for create/update
$('#guestForm').on('submit', function(event) {
    event.preventDefault();
    const kode= $('#guestKode').val();
    const nama= $('#guestNama').val();
    const email= $('#guestEmail').val();
    const pesan= $('#guestPesan').val();

    $.ajax({
        url: script_url,
        type: "GET",
        dataType: "jsonp",
        data: {kode: kode, nama: nama, email: email, pesan: pesan, action:'insert'},
        success: function(response) {
            alert(response.result);
            loadGuests();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Request failed:", textStatus, errorThrown);
        }
    });
});