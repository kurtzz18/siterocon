$(document).ready(function () {
    
    $('#pai').children('div').hide();
    
    $('#select').on('change', function () {

        var selectValor = '#' + $(this).val();
        
        $('#pai').children('div').hide();
        $('#pai').children(selectValor).show();

    });

});
