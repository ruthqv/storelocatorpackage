    $(document).ready(function() {


        $('#display').click(function() {
        $('#verti').removeClass('none').css('background','black');
        $('#bh-sl-map').css('height','auto');
        $(this).hide();
        $('#hide').removeClass('hide');
        });

        $('#hide').click(function() { 
        $('#verti').addClass('none');
        $('#bh-sl-map').css('height','530px');
        $('#display').show();
        $('#hide').removeClass('display');
        $('#hide').addClass('hide');

         });



    });