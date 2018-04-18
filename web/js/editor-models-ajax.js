
$( document ).ready(function() {
    if($('#models-brand_id').length > 0) {
        getModels($('#models-brand_id').val());
    }
});

$('#models-brand_id').on('change', function(){
    getModels($(this).val());
});
function getModels(brand_id) {

    $.get('/?r=model/get-brand-models', {brand_id: brand_id}, function (data) {

        var items = JSON.parse(data);
        $models_list = $('#cars-model_id');
        $models_list.empty();
        items.forEach(function(item) {

            var selected = '';

            if(item.id == $("#current_model_id").val()){
                selected = "selected"
            }

            $models_list.append($("<option " + selected +"></option>")
                .attr("value", item.id).text(item.name))
        });
    });
}

$('#cars-model_id').on('change', function(){
    $("#current_model_id").val($(this).val());
});