$(function(){
    $('.delete-modal-open').on('click', function () {
        $('.js-modal').fadeIn();
        var reserve_date = $(this).val();
        var reserve_part = $(this).text();
        $('.delete-modal-reserve-date').val(reserve_date);
        $('.delete-modal-reserve-part').val(reserve_part);
        return false;
    });
    $('.js-modal-close').on('click', function () {
        $('.js-modal').fadeOut();
        return false;
    });
});
