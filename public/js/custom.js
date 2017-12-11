 
 //  Tage / Categories view 
$(document).ready(function()
    {
        // hide edit button and show save and cancel button + input form for new name Tag of form update name of Tag 
        $('.edit').on('click', function() {
            var id = $(this).attr('edit-button');
            $(this).addClass('hidden');
            $('#edit' + id).removeClass('hidden');
            $('#name' + id).addClass('hidden');
        });
        
    // hide cancel button and save + input form for new name Tag. Show Edit button
        $('.cancel').on('click', function() {
            var id = $(this).attr('cancel-button');
            $('#edit' + id).addClass('hidden');
            $('a[edit-button="'+id+'"]').removeClass('hidden');
             $('#name'+id).removeClass('hidden');
        });
        
        $('a[ href="#name/email"]').on('click', function() {
        $('a[ href="#name/email"], .show').addClass('hidden');
        $('.change , .button , .button-email-name ').removeClass('hidden');

        });

        $('a[ href="#password"]').on('click', function() {
            $('a[ href="#password"] , .show , .showlable').addClass('hidden');
            $('.password , .button-password').removeClass('hidden');
        });
        
    });