 $(document).ready(function(){

         $('.dropd').click(function(){
            var $form = $(this).next();
            console.log();

            var menuID = $(this).parent().data('id');

            $('.render-forms').html("").hide();

                if($form.hasClass('active')){
                    $form.removeClass('active');
                    $form.html('').slideUp();
                    return false;
                } 

            $.get('/menuitems/'+ menuID +'/edit', function(data){
                $form.addClass('active');
                $form.html( data ).slideDown();

                update_menus();
                reload_delete();
                if ($("ol .int_link").is(":checked")){
                    $('ol .internal').removeAttr('disabled');
                    $("ol .external").hide().attr("disabled", "disabled");
                    $('ol .internal').show();
                }
                else{
                    $('ol .external').removeAttr("disabled");
                    $("ol .internal").hide().attr("disabled", "disabled");
                    $("ol .external").show();
                }


            });            
        });

    });