var album={};
$(document).ready(function(){
    $('.modal-hall-form').submit(function(){return false;});
    $(document).delegate('.modal-hall__button','click',function(){
        var
            text=[
                $('#address-town').val(),
                $('#address-street').val(),
                $('#address-house').val(),
                $('#address-block').val()
            ];

        $.ajax({
            method:'GET',
            url:'http://geocode-maps.yandex.ru/1.x/',
            data:{
                format:'json',
                geocode:text.join(', ')
            }
        }).done(function(data){
            var pos =data.response.GeoObjectCollection.featureMember[0].GeoObject.Point.pos.split(' ');
            $('input[name="Hall[geocode]"]').val(JSON.stringify(pos));
            $('.modal-hall-form').submit();
        });

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
    },
    removeImage:function(obj){
        var index=$(obj).index(),
            hall=$('.modal-hall-form').attr('data-id');
        $.ajax({
            url:'/ajax/removeimage/'+index,
            data:{hall:hall}
        }).done(function(){
            $(obj).parent().remove();
        });

    },
    addImage:function(){
        album.add($('.modal-hall-form-params-album-content'));
    }
};

