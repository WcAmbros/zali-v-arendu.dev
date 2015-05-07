var button={
    close:function(el){
        $(el).hide();
    },
    show:function(el){
        $(el).show();
    }

};

$(document).ready(function(){

    $(".add-hall-form-col__address").suggestions({
        serviceUrl: "https://dadata.ru/api/v2",
        token: "17d4c30316e5c06e8c5798f8587a898066205a7d",
        type: "ADDRESS",
        /* Вызывается, когда пользователь выбирает одну из подсказок */
        onSelect: function(suggestion) {
            var obj =suggestion.data,
                hall={};

            hall={
                name:'Hall',
                params:{
                    town:obj.city,
                    street:obj.street,
                    house:obj.house,
                    block:obj.block
                }
            };
            for(var key in hall.params ){
                $('input[name="'+hall.name+'['+key+']"]').val(hall.params[key]);
            }
        }
    });

    $('.add-hall__button').click(function(){

    });
});