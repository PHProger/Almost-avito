$('.toggle-brand-modal').click(function(){
    $('#add-brand-modal').modal('show');
});

$('.submit-new-brand').click(function(){
    $.get('/?r=brand/create', {name: $('#new-brand-name').val()}, function (data) {
        brand = JSON.parse(data);
        $('.brands-table tr:last').after('<tr data-id="' + brand.id + '"><td>' + brand.id + '</td><td>' + brand.name + '</td><td><button class="btn btn-danger delete-brand">Удалить</button></tr>');
        $('#new-brand-name').val(null);
        $('#add-brand-modal').modal('hide');
    });
});

$('.delete-brand').click(function(){
    var question = "Вы действительно хотите удалить Марку? Будут удалены все связанные модели и объявляения и объявления";
    var brand_row = $(this).closest('tr');
    if(confirm(question)) {
        $.get('/?r=brand/destroy', {brand_id:  brand_row.data('id')}, function (data) {
            responce = JSON.parse(data);
            if(responce == "success") {
                brand_row.fadeOut(500); 
            }
        });
    }
});