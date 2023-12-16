$(document).ready(function() {
    $('#tingkatPrestasi, #tingkatLomba').change(function() {
        var selectedOption = $(this).val();
        filterTabel(selectedOption);
    });
});

function filterTabel(selectedOption) {
    var rows = $('#example1, #tableLomba').find('tr');
    rows.slice(1).each(function() {
        var row = $(this);
        var tingkatPrestasi = row.find('td:nth-child(4)').text();
        var tingkatLomba = row.find('td:nth-child(7)').text();
        if (selectedOption === 'Semua' || tingkatPrestasi === selectedOption || tingkatLomba === selectedOption) {
            row.show();
        } else {
            row.hide();
        }
    });
}