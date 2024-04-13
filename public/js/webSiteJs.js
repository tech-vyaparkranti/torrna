$(document).ready(function(){
    loadMenu();
});
let windowUrl = window.location.hostname;
function loadMenu(){
    $.ajax({
        url:'/getmenu-items',
        type:'GET',
        accept:'json',
        success:function(data){
             
            if( typeof(data.menu_html.top) != "undefined" && data.menu_html.top !== null){
                $("#top_menu").html(data.menu_html.top);
            }
        }
    });
}