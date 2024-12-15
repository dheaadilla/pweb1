function doGet(e) {
    var op= e.parameter.action;

    if(op == "read")
        return read();
}

function read() {
    var wb= SpreadsheetApp.getActiveSpreadsheet();
    var ws= wb.getSheetByName('BukuTamu');
    var data= [];

    var sh= ws.getRange(1,1,1, ws.getLastColumn()).getValues()[0];
    var dt= ws.getRange(2,1, ws.getLastRow()-1, ws.getLastColumn()).getValues();

    for(var r=0; r<dt.length; r++) {
        var row= dt[r],
        record= {};
        for(var p in sh) {
            record[sh[p]]= row[p];
        }
        data.push(record);
    }
    Logger.log(data);
    return ContentService.createTextOutput(JSON.stringify(data)).setMimeType(ContentService.MimeType.JSON);
}