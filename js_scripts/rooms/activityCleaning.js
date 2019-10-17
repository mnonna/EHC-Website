function cleanRoom(val){
    var roomLabel = val;
    var action = 'data';

    $.ajax({
        
        url: 'mark_room_cleaned.php',
        method: 'POST',
        data: {action:action, roomLabel:roomLabel},

        success:function(){
                alert("Room "+roomLabel+" cleaned.");
                window.location.reload();	
            }
    });
}