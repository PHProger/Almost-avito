$('.toggle-option-modal').click(function(){
    $('#add-option-modal').modal('show');
});

$('.submit-new-option').click(function(){
    $.get('/?r=option/create', {name: $('#new-option-name').val()}, function (data) {
        option = JSON.parse(data);
        $('.options-table tr:last').after('<tr data-id="' + option.id + '"><td>' + option.id + '</td><td>' + option.name + '</td><td><button class="btn btn-danger delete-option">Удалить</button></tr>');
        $('#new-option-name').val(null);
        $('#add-option-modal').modal('hide');
    });
});

$('.delete-option').click(function(){
    var question = "Вы действительно хотите удалить бренд? Будут удалены все связанные марки и объявления?";
    var option_row = $(this).closest('tr');
    if(confirm(question)) {
        $.get('/?r=option/destroy', {option_id:  option_row.data('id')}, function (data) {
            responce = JSON.parse(data);
            if(responce == "success") {
                option_row.fadeOut(500); 
            }
        });
    }
});