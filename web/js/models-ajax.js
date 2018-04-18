
$( document ).ready(function() {
    if($('#models-list_brand_id').length > 0) {
        getModelsList($('#models-list-brand_id').val());
    }
});

$('#models-list-brand_id').on('change', function(){
    getModelsList($(this).val());
});

function getModelsList(brand_id) {

    $.get('/?r=model/get-brand-models', {brand_id: brand_id}, function (data) {

        var items = JSON.parse(data);
    
        $('.models-table tbody').empty();
        items.forEach(function(item) {

            var selected = '';

            if(item.id == $("#current_model_id").val()){
                selected = "selected"
            }

             $('.models-table tbody').append('<tr data-id="' + item.id + '"><td>' + item.id + '</td><td>' + item.name + '</td><td><button class="btn btn-danger delete-model" onclick="deleteModel(' + item.id + ')">Удалить</button></tr>');
        });
    });
}

function deleteModel(id){
    var question = "Вы действительно хотите удалить модель? Будут удалены все связанные объявления.";
    var model_row = $(this);
    if(confirm(question)) {
        $.get('/?r=model/destroy', {model_id:  id}, function (data) {
            responce = JSON.parse(data);
            if(responce == "success") {
                model_row.fadeOut(500); 
            }
        });
    }
}

$('.toggle-model-modal').click(function(){
    $('#add-model-modal').modal('show');
});

$('.submit-new-model').click(function(){
    $.get('/?r=model/create', {name: $('#new-model-name').val(), brand_id: $('#models-list-brand_id').val()}, function (data) {
        model = JSON.parse(data);
        $('.models-table tbody').append('<tr data-id="' + model.id + '"><td>' + model.id + '</td><td>' + model.name + '</td><td><button class="btn btn-danger delete-model" onclick="deleteModel(' + model.id + ')">Удалить</button></tr>');
        $('#new-model-name').val(null);
        $('#add-model-modal').modal('hide');
    });
});