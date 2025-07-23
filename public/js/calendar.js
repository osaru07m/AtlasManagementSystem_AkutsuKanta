$(function(){
    $('.delete-modal-open').on('click', function () {
        $('.js-modal').fadeIn();
        var id = $(this).data('id');
        var reserve_date = $(this).val();
        var reserve_part = $(this).text();

        $('.delete-modal-reserve-id').val(id);
        $('.delete-modal-reserve-date').val(reserve_date);
        $('.delete-modal-reserve-part').val(reserve_part);
        return false;
    });
    $('.js-modal-close').on('click', function () {
        $('.js-modal').fadeOut();
        return false;
    });
});
