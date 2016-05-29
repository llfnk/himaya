var $border_color = "#efefef";
var $grid_color = "#ddd";
var $default_black = "#666";
var $red = "#eb4343";
var $blue = "#5da4cd";
var $green = "#abd14f";
var $yellow = "#ffaa3a";
var $yellow_one = "#FFF844";
var $grey = "#999999";
var $blue_one = "#74b1d4";
var $blue_two = "#84bad9";
var $blue_three = "#9bc7e0";
var $blue_four = "#afd2e6";
var $blue_five = "#badff2";


var $default_grey = "#ccc";
var $primary_color = "#428bca";
var $go_green = "#93caa3";
var $jet_blue = "#70aacf";
var $lemon_yellow = "#ffe38a";
var $nagpur_orange = "#fc965f";
var $ruby_red = "#fa9c9b";


//Data Tables
$(document).ready(function () {
  $('#data-table2').dataTable({
    "sPaginationType": "full_numbers",
     "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "search":         "Szukaj:",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
  });
  $("#data-table_length").css("display","none")
  
  
    $('#data-table').dataTable( {
        "info":           "AAAAShowing _START_ to _END_ of _TOTAL_ entries",
        "search":         "Searchaa:",
        
        
        "language": {
            "lengthMenu": "Zisplay _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "AAShowing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
  
  
  
  
  
});
