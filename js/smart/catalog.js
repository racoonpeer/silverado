/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    $(".filters").on("click", ".more", function (e) {
        e.preventDefault();
        $(this).toggleClass("expand");
        $(this).prev("ul").children(".hidable").toggleClass("hidden");
    });
});