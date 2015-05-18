var button={
        close:function(el){
            $(el).hide();
        },
        show:function(el){
            $(el).show();
        }

    },
    album={};

$(document).ready(function(){

    $(".add-hall-form-col__address").suggestions({
        serviceUrl: "https://dadata.ru/api/v2",
        token: "17d4c30316e5c06e8c5798f8587a898066205a7d",
        type: "ADDRESS",
        /* Вызывается, когда пользователь выбирает одну из подсказок */
        onSelect: function(suggestion) {
            var obj =suggestion.data,
                hall={},
                geo_results=null;

            hall={
                name:'Address',
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

            $('input[name="Hall[geocode]"]').val(JSON.stringify([obj.geo_lat,obj.geo_lon]));

            geocode_maps({
                geocode:obj.geo_lon+','+obj.geo_lat,
                kind:'district'
            });
            geocode_maps({
                geocode:obj.geo_lon+','+obj.geo_lat,
                kind:'metro',
                results:3
            });


        }
    });


    geocode_maps=function(data){

        var options={
                format:'json'
            },
            kind=data.kind;
        data=$.extend(options,data);
        $.ajax({
            dataType:'jsonp',
            url:'http://geocode-maps.yandex.ru/1.x',
            data:data
        }).done(function(data){
            geocode_results(data,kind);
        });
    };

    geocode_results=function(data,kind){
        var collection=data.response.GeoObjectCollection.featureMember,
            length=collection.length,
            name='';
        $('#'+kind).html('');
        for(var i= 0;i<length;i++){
            name=collection[i].GeoObject.name;
            name=geocode_replace(name,kind);
            $('#'+kind).append('<option>'+name+'</option>');
        }
        $('input[name="Address['+kind+']"]').val(name);
    };

    geocode_replace=function(name,kind){
        if(kind=='metro')
            name=name.replace('метро','');
        if(kind=='district')
            name=name.replace('район','');
        return name
    };


    $('.add-hall-form-params-album-button').click(function(){
        album.add($('.add-hall-form-params-album-content'));
    });


});
album={
    max:9,
    count:1,
    add:function(obj){
        if(this.count<this.max){
            obj.append(template.image);
            this.count++;
        }
    },
    remove:function(obj){
        $(obj).parent().remove();
        this.count--;
    }
}
var template={
    image:'<div class="add-hall-form-params-album-content-item">'+
    '<label><input class="add-hall-form-params-album-content__input" type="file" name="Hall[images][]"></label>'+
    '<span class="add-hall-form-params-album-content-item_remove i-icons i-close_black" onclick="album.remove(this)"></span>'+
    '</div>'
};
