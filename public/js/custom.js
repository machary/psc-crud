$(function() {
    $( "#tanggal" ).datepicker();

    $("#datatables").dataTable({
        "bProcessing": true,
        "sAjaxSource": "cmos/response"
    });



});
