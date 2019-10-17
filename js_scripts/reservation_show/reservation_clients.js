$(document).ready(function(){
    $("#select_client").on('change',function(){
      var clientID = $(this).val();
      
      $.ajax({
          url: 'get_clients_reservations.php',
          method: 'POST',
          data: 'request='+clientID,

          success: function(data){
              $("#clients_reservations_body").html(data);  
          },
      });
    });  
  });