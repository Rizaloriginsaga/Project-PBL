$(document).ready(function() {
    $('#tingkatPrestasi').change(function() {
        var selectedOption = $(this).val();
        filterTabel(selectedOption);
    });

    $('#datepicker').datetimepicker({
        format: 'L',
    });

    $('#datepicker').on('change.datetimepicker', function(e) {
        var selectedDate = e.date.format('L');
        filterByDate(selectedDate);
    });
});

function filterTabel(selectedOption) {
    var rows = $('#example1').find('tr');
    rows.slice(1).each(function() {
        var row = $(this);
        var tingkatPrestasi = row.find('td:nth-child(7)').text();
        if (selectedOption === 'Semua' || tingkatPrestasi === selectedOption) {
            row.show();
        } else {
            row.hide();
        }
    });
}

function filterByDate(selectedDate) {
var rows = $('#example1').find('tr');
rows.slice(1).each(function() {
    var row = $(this);
    var tanggalPrestasi = row.find('td:nth-child(8)').text();
    if (selectedDate === 'Semua' || tanggalPrestasi === selectedDate) {
        row.show();
    } else {
        row.hide();
    }
});
}