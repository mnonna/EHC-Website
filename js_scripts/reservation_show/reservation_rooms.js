$(document).ready(function(){
    $("#select_label").on('change',function(){
      var label = $(this).val();
      
      $.ajax({
          url: 'get_room_reservations.php',
          method: 'POST',
          data: 'request='+label,

          success: function(data){
              $("#room_reservations_body").html(data);  
          },
      });
    });  
  });