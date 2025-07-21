$(function () {
  $('.search_conditions').click(function () {
    $(this).find('i').toggleClass('active');
    $('.search_conditions_inner').slideToggle();
  });

  $('.subject_edit_btn').click(function () {
    $(this).find('i').toggleClass('active');
    $('.subject_inner').slideToggle();
  });
});
