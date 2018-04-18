$('.delete-car').click(function(){
    var question = "Вы действительно хотите удалить Объявление? Оно будет удалено безвозвратно.";
    var car_row = $(this).closest('tr');
    if(confirm(question)) {
        $.get('/?r=car/destroy', {car_id:  car_row.data('id')}, function (data) {
            responce = JSON.parse(data);
            if(responce == "success") {
                car_row.fadeOut(500); 
            }
        });
    }
});