$(document).ready(function() {
    // Table One Design
    var table = $("#account").DataTable({
        responsive: true,
    });
    table
        .order([4, 'asc'], [5, 'asc'])
        .draw();

    // Table Two Design
    var table = $("#rapat").DataTable({
        responsive: true,
    });
        table
        .order([4, 'asc'], [5, 'asc'])
        .draw();
});