$(document).ready(function(){
    $(".filter-button").click(function(){
            var action ='data';

            var floor = get_filter_text("floor");
            var startDate = document.getElementById("res_begin").value;
            var endDate = document.getElementById("res_end").value;
            
            $.ajax({
                
                    url: 'action.php',
                    method: 'POST',
                    data: {action:action, floor:floor, startDate:startDate, endDate:endDate},

                    success:function(response){
                            destroyCarousel();
                            $("#r_wrapper").html(response);
                            slickCarousel();	
                        }
                });
            
        });
    
        function get_filter_text(text_id){
                var filterData = [];
                $('#'+text_id+':checked').each(function(){
                        filterData.push($(this).val()); 
                    });
                return filterData;
        }

    }
);