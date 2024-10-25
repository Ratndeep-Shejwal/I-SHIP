$(document).ready(function() {


    // Previous Status
    $('.update-status-pre').click(function() {
        var button = $(this);
        var id = button.data('id');
        var change = -1;
        // alert(id); 
        $.ajax({
            url: 'vehicle-updatestatus.php',
            type: 'POST',
            dataType: 'json',
            data: { id: id ,change:change},
            success: function(response) {
                if (response.success) {

                    var $span = $('span[data-vin="' + id + '"]');
                    $span.text(response["message"]);

                    // Was Maxed but moved Back
                    if(response.current == 5){
                        var class_button = ".update-next-" + id;
                        $(class_button).removeClass('d-none');
                    }
                    // Cannot Move Back
                    if (response.new_status == 0){
                        var class_button = "#update-pre-" + id;
                        $(class_button).addClass('d-none');
                    }

                } else {
                    // Handle error
                    alert(response);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });

    // Next Status
    $('.update-status-next').click(function() {
        var button = $(this);
        var id = button.data('id');
        var change=1;

        $.ajax({
            url: 'vehicle-updatestatus.php',
            type: 'POST',
            dataType: 'json',
            data: { id: id , change:change},
            success: function(response) {
                if (response) {

                    var $span = $('span[data-vin="' + id + '"]');
                    $span.text(response["message"]);

                    if(response.current == 0){
                        var class_button = ".update-pre-" + id;
                        console.log(class_button);
                        $(class_button).removeClass('d-none');
                    }

                    // Cannot Move Forward
                    if (response.new_status == 5){
                        var class_button = "#update-next-" + id;
                        $(class_button).addClass('d-none');
                    }
                    
                } else {
                    // Handle error
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });
});