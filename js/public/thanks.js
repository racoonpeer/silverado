/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    $("#order").on('click', ".print", function(e){
        e.preventDefault();
        $("#order").print({
            //Use Global styles
            globalStyles : true,
            //Print in a hidden iframe
            iframe : false,
            //Don't print this
            noPrintSelector : ".non-print",
            //Add this at top
            prepend : $("#order").data("order-info"),
            //Add this on bottom
            append : $("#order").data("date-info")
        });
    });
});