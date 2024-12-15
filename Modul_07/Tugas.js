function doGet(e) {
    var action = e.parameter.action;
  
    if (action === "read") {
      return getJobs();
    } else if (action === "insert") {
      return addJob(e);
    } else if (action === "edit") {
      return editJob(e);
    } else if (action === "delete") {
      return deleteJob(e);
    }
  
    return ContentService.createTextOutput("Action not recognized");
  }
  
  // Fungsi untuk membaca data dari spreadsheet
  function getJobs() {
    var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName("Lowongan");
    var data = sheet.getDataRange().getValues();
  
    var jobs = [];
    for (var i = 1; i < data.length; i++) {
      var row = data[i];
      jobs.push({
        Kode: row[0],
        Posisi: row[1],
        Perusahaan: row[2],
        Lokasi: row[3],
        Status: row[4],
        Deskripsi: row[5],
      });
    }
  
    return ContentService.createTextOutput(JSON.stringify(jobs)).setMimeType(ContentService.MimeType.JSON);
  }
  
  // Fungsi untuk menambahkan data baru
  function addJob(e) {
    var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName("Lowongan");
    var kode = e.parameter.kode;
    var posisi = e.parameter.posisi;
    var perusahaan = e.parameter.perusahaan;
    var lokasi = e.parameter.lokasi;
    var status = e.parameter.status;
    var deskripsi = e.parameter.deskripsi;
  
    sheet.appendRow([kode, posisi, perusahaan, lokasi, status, deskripsi]);
  
    return ContentService.createTextOutput(JSON.stringify({ result: "Data berhasil ditambahkan" })).setMimeType(ContentService.MimeType.JSON);
  }
  
  // Fungsi untuk mengedit data berdasarkan Kode
  function editJob(e) {
    var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName("Lowongan");
    var data = sheet.getDataRange().getValues();
    var kode = e.parameter.kode;
  
    // Mencari data berdasarkan Kode yang dimasukkan
    for (var i = 1; i < data.length; i++) {
      if (data[i][0] == kode) {
        // Mengupdate data berdasarkan kolom yang sesuai
        sheet.getRange(i + 1, 2).setValue(e.parameter.posisi);       // Kolom Posisi
        sheet.getRange(i + 1, 3).setValue(e.parameter.perusahaan);  // Kolom Perusahaan
        sheet.getRange(i + 1, 4).setValue(e.parameter.lokasi);      // Kolom Lokasi
        sheet.getRange(i + 1, 5).setValue(e.parameter.status);      // Kolom Status
        sheet.getRange(i + 1, 6).setValue(e.parameter.deskripsi);   // Kolom Deskripsi
        break; // Keluar dari loop setelah data ditemukan dan diperbarui
      }
    }
  
    return ContentService.createTextOutput(JSON.stringify({ result: "Data berhasil diperbarui" })).setMimeType(ContentService.MimeType.JSON);
  }
  
  // Fungsi untuk menghapus data berdasarkan Kode
  function deleteJob(e) {
    var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName("Lowongan");
    var data = sheet.getDataRange().getValues();
    var kode = e.parameter.kode;
  
    for (var i = 1; i < data.length; i++) {
      if (data[i][0] == kode) {
        sheet.deleteRow(i + 1); // Menghapus baris yang sesuai dengan Kode
        break;
      }
    }
  
    return ContentService.createTextOutput(JSON.stringify({ result: "Data berhasil dihapus" })).setMimeType(ContentService.MimeType.JSON);
  }
  