

/**
 * Created by esaphp on 17.12.17.
 */

/*globals $:false*/
/*jslint devel: true*/

$(document).ready(function(){
    'use strict';

    $("#search_form").submit(function(event){
        var form = this;
        event.preventDefault();
        $.ajax({
            url : form.action,
            type : form.method,
            data : $(form).serialize(),
            success : function(html){
                $("#table_search_body").html(html);
            },
            error : function(error){
                console.log('error');
            }
        });
    });
});