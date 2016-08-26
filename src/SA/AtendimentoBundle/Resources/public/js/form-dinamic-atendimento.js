
var $tipoAtendimento = $('#tb_atendimento_taCodigo');
// When sport gets selected ...
$tipoAtendimento.change(function() {

    //var $form = $(this).closest('form');
    var url = $("#link").attr('href');

    //alert(url);

    // alert('Change: ' + $form.attr('action') + $form.attr('method'));
    // ... retrieve the corresponding form.

    // Simulate form data, but only include the selected sport value.
    var data = {};
    data = $tipoAtendimento.serialize();
    // Submit data via AJAX to the form's action path.
    $.ajax({
        url : url,
        type: 'POST',
        data : data,
        success: function(html) {

            //$("#load").html(html);
            // Replace current position field ...
            $('#tb_atendimento_tipoResposta').replaceWith(
                // ... with the returned one from the AJAX response.
                $(html).find('#tb_atendimento_tipoResposta')
            );
            // Position field now displays the appropriate positions.
        },
        error: function(err){
            $("#loader").html(err);
        }
    });

});


$('body').on('change',"#tb_atendimento_tipoResposta",function(){

    $("#tb_atendimento_atDescricao").html($('#tb_atendimento_tipoResposta :selected').text());
    //alert($(this).text());

});