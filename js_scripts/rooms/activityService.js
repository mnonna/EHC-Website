function serviceRoom(val){
    var roomLabel = val;
    var action = 'data';

    $.ajax({
        
        url: 'mark_room_serviced.php',
        method: 'POST',
        data: {action:action, roomLabel:roomLabel},

        success:function(){
                alert("Room "+roomLabel+" serviced.");
                window.location.reload();	
            }
    });
}