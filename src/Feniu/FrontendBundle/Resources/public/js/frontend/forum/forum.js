

// Dropdown Menu
$(document).ready(function () {


    $(document).ready(function () {
        $('.summernote').summernote({height: 360});
    });








    $("#add_post").click(function (e) {
        e.preventDefault();
//        var data;
        var topicnr = $("#add_post").attr("data-topic-number");
        var editable = document.getElementsByClassName("note-editable");
//        var arrive = $(".note-editable").attr("value");
        var htmltext = editable[0].innerHTML;
        console.log(topicnr);
        console.log(htmltext);
//
        jQuery.ajax({
            type: 'post',
            url: Routing.generate('feniu_frontend_forum_post_add'),
            data: {topicnr: topicnr, htmltext: htmltext},
            success: function (dateback) {


            },
            complete: function () {
            document.location.reload(); 


            }

        });

    });
    
        $(".add_topic_more").click(function (e) {
        e.preventDefault();
        $( "#add_topic_body" ).slideToggle();
        $( ".add_topic_more" ).slideToggle();

    });
    
    
            $(".add_topic").click(function (e) {
        e.preventDefault();
        var data;
        var categorynr = $("#add_topic").attr("data-category-number");
        var topicname = $("#topic_name").val();
        var editable = document.getElementsByClassName("note-editable");
//        var arrive = $(".note-editable").attr("value");
        var htmltext = editable[0].innerHTML;
        
//        console.log(categorynr);
//        console.log(topicname);
//        console.log(htmltext);

        jQuery.ajax({
            type: 'post',
            url: Routing.generate('feniu_frontend_forum_topic_add'),
            data: {categorynr: categorynr, htmltext: htmltext, topicname: topicname},
            success: function (dateback) {


            },
            complete: function () {
//            document.location.reload(); 


            }

        });

    });
    
    
    







});

