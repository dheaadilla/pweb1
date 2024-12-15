let wb = SpreadsheetApp.getActiveSpreadsheet();
let ws = wb.getSheetByName("BukuTamu");

function doGet(e) {
var op = e.parameter.action;
if (op == "read")
return read();
else if(op == "insert")
return insert_value(e);
}

function read(){
  let sh = ws.getRange(1,1,1,ws.getLastColumn()).getValues()[0];
  let dt = ws.getRange(2,1,ws.getLastRow()-1,ws.getLastColumn()).getValues();
  let data=[];

for (var r = 0; r < dt.length; r++) {
  var row = dt[r],
    record = {};
    for (var p in sh) {
      record[sh[p]] = row[p];
    }
  data.push(record);
}
return ContentService.createTextOutput(JSON.stringify(data))
.setMimeType(ContentService.MimeType.JSON);
}

//fungsi untuk menambah data
function insert_value(request) {
var kode = request.parameter.kode;
var nama = request.parameter.nama;
var email = request.parameter.email;
var pesan = request.parameter.pesan;
//add new row with received parameter from client
var rowData = ws.appendRow([kode, nama, email, pesan]);
var result = "Insert successful";
result = JSON.stringify({
"result": result
});
return ContentService
.createTextOutput(request.parameter.callback + "(" + result + ")")
.setMimeType(ContentService.MimeType.JAVASCRIPT);
}