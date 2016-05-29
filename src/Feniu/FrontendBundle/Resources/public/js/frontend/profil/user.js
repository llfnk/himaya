

// Dropdown Menu
$(document).ready(function () {


    $("#drop1").click(function (e) {

        jQuery.ajax({
            type: 'post',
            url: Routing.generate('feniu_frontend_clear_notification'),
            success: function (dateback) {


            },
            complete: function () {


            }

        });

    });
    
    
    $(".nt-close").click(function (e) {
        
        var ntnr = $(this).attr("data-ntnr");
        console.log(ntnr);
        jQuery.ajax({
            type: 'post',
            url: Routing.generate('feniu_frontend_clear_one_notification'),
            data: {ntnr: ntnr},
            success: function (dateback) {


            },
            complete: function () {


            }

        });

    });
    
       

    
    







});

