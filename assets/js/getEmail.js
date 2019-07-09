var json= null;
$(document).ready(function() {

    $.ajax({
         async: false,
        'global': false,
        'url': '/getEmails.json',
        'dataType': "json",
        'success': function (refs) {
            json= refs;

        }
    });
});




    function checkEmail() {

        var emailValue = document.getElementById('email').value;
        for (index = 0; index < json[0].length; index++){
                if((json[0][index].email == emailValue)){
                    event.preventDefault();
                    jQuery('#textEmail').html('<p>Данный email('+emailValue+') - занят  </p>');
                   break;
                }
        }
    }
