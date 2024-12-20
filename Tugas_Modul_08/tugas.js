$(document).ready(function () {
    const alumniData = [];

    // Tambah Data Alumni
    $("#alumniForm").on("submit", function (e) {
        e.preventDefault();
        const nim = $("#nim").val();
        const name = $("#name").val();
        const major = $("#major").val();
        const year = $("#year").val();

        alumniData.push({ nim, name, major, year });
        updateTable();
        this.reset();
    });

    // Perbarui Tabel
    function updateTable() {
        const tableBody = $("#alumniTable");
        tableBody.empty();

        alumniData.forEach((alumni, index) => {
            const row = `
                <tr>
                    <td>${alumni.nim}</td>
                    <td>${alumni.name}</td>
                    <td>${alumni.major}</td>
                    <td>${alumni.year}</td>
                </tr>
            `;
            tableBody.append(row);
        });
    }

    // Cari Data Alumni
    $("#search").on("keyup", function () {
        const query = $(this).val().toLowerCase();
        $("#alumniTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
        });
    });
});