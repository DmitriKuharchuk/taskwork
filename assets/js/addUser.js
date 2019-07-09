$(document).ready(function(){
    var i=1;
    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="phone[]" placeholder="Телефон" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });



});


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
