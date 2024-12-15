//fungsi untuk menambah data
function insert_value(request) {
    var wb= SpreadsheetApp.getActiveSpreadsheet();
    var ws= wb.getSheetByName('Buku Tamu');

    var kode= request.parameter.kode;
    var nama= request.parameter.nama;
    var email= request.parameter.email;
    var pesan= request.parameter.pesan;

    //add new row with received parameter from client
    var rowData= ws.appendRow([kode, nama, email, pesan]);
    var result= "Insert successful";

    result= JSON.stringify({
        "result": result
    });

    return ContentService
    .createTextOutput(request.parameter.callback + "(" + result + ")")
    .setMimeType(ContentService.MimeType.JAVASCRIPT);
}