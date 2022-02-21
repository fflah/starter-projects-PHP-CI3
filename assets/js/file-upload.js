(function($) {
  'use strict';
  $(function() {
    $('.file-upload-default').on('change', function() {
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  });
})(jQuery);