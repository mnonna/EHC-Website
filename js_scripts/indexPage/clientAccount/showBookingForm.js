$(document).on('click','.orderRoom',function() {

    $("#id_people_number").empty();
    $(".resInfoLabel").empty();

    var label = $(this).val();
    
    var lInput = document.getElementById("labelnumber");
    var cInput = document.getElementById("capnumber");

    var cap = $(this).attr("name");

    lInput.value = label;
    cInput.value = cap;

    var labelInfoString = '<h2 style="color: black; padding-top: 3px">Zamawiasz pokój numer: <span class="badge badge-success">'+label+'</span></h2>';
    var i = 0;
    var htmlString = '';

    while(i < cap){
        i++;
        htmlString += '<option value="'+i+'">'+i+'</option>';
    }

    $("#id_people_number").append(htmlString);
    $(".resInfoLabel").append(labelInfoString);
    $(resForm).show();
});