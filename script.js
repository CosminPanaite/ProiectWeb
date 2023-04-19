$(document).ready(function() {
    $('.shirt-image').click(function() {
      var year = $(this).data('year');
      var price = $(this).data('price');
      var detailsHtml = '<ul class="shirt-details"><li>Year: ' + year + '</li><li>Price: $' + price + '</li></ul>';
      $(this).parent().append(detailsHtml);
      $(this).siblings('.shirt-details').slideDown();
    });
  });
  