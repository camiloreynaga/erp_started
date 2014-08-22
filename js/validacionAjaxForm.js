/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
        
        
        
        //muestra errores del form luego de la validación
        function formErrors(data,form){
        var summary = '';
        summary="<p>Please solve following errors:</p>";

        $.each(data, function(key, val) {
        $(form+" #"+key+"_em_").html(val.toString());
        $(form+" #"+key+"_em_").show();

        $("#"+key).parent().addClass("form group");
        summary = summary + "<ul><li>" + val.toString() + "</li></ul>";
        });
        $(form+"_es_").html(summary.toString());
        $(form+"_es_").show();

        $("[id^='update-button']").show();
        $('#ajax-status').hide();//css({display:'none'});
        $('#ajax-status').text('');
        }
        
        //esconde los errores del form si la validación es correcta
        function hideFormErrors(form){
        //alert (form+"_es_");
        $(form+"_es_").html('');
        $(form+"_es_").hide();
        $("[id$='_em_']").html('');
        }
