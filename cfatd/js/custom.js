$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
	
	// Select All checkbox
	$('.chk-head').click(function () {
		if ($('.chk-head').is(':checked')) {
			$('.chk-present').prop('checked', true);
		}
		else {
			$('.chk-present').prop('checked', false);
		}
	});
	
});

   

      $(document).ready(function() {
      $('#did').change(function() {
      var did = $(this).val();
      
        $.ajax({
          url:"http://localhost:8080/cfatd/modules/fetch_subjects.php",
          method:"POST",
          data:{dep_id:did},
          dataType:"text",
          success:function(data) {
            
            $('#subject').html(data);
          }
        });
      
        });
      });
