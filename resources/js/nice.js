/*global $*/
/*global liquor*/
/*global nice*/

$(function ()
{
  var nice = $('.nice');
  var Liquor;
  nice.on('click', function ()
  {
    var $this = $(this);
    Liquor = $this.data('liquor');
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: 'nice/${liquor}',
      type: "POST",
      data:{  'liquor': Liquor },
    })
      .done(function (data, status, xhr) {
        console.log(data);
      })
      .fail(function (xhr, status, error) {
        console.log();
      });
   });
});