var template={
    metro:'',
    district:'',
    checkBoxList:'',
    image:'<div class="modal-hall-form-params-album-content-item">'+
    '<label><input class="modal-hall-form-params-album-content__input" type="file" name="Hall[images][]"></label>'+
    '<span class="modal-hall-form-params-album-content-item_remove i-icons i-close_black" onclick="album.remove(this)"></span>'+
    '</div>'
};
$(document).ready(function(){
    $('.hall-content-slider-thumbnails-link').fancybox();
    $('.hall-content-contact-link').click(function(){
        var obj=$(this);
        $.get(
            '/ajax/phone/'+obj.attr('rel'),
            function(data){
                obj.parent().html('<span class="hall-content-contact__phone"><span class="i-icons i-phone"></span>'+data.response.phone+'</span>');
            },
            'json'
        )
    });

    $(document).on('change','.main-find-form',function(){
        $(this).find('button').focus();
    });

    $(document).on('change','.result-find',function(){
        $(this).find('button').focus();
    });
    changeMetro=function(el,that){
        var district =$(el);
        if($(that).val()===''){
            district.html(template.district);
        }else{
            $.get(
                '/ajax/list',
                {
                    type:'district',
                    name:$(that).val()
                },
                function(data){
                    if(data.length>0){
                        district.find('option').each(function(index){
                            if($(this).attr('value')==data[0].name){
                                $(this).attr('selected',true)
                            }
                        });
                    }
                    //district.append('<option value="">Не выбран</option>');
                },
                'json'
            )
        }
    };
    changeDistrict=function(el,that){
        var metro =$(el);
        if($(that).val()===''){
            metro.html(template.metro);
        }else{
            $.get(
                '/ajax/list',
                {
                    type:'metro',
                    name:$(that).val()
                },
                function(data){
                    if(data.length>0){
                        metro.html('<option value="">Не выбран</option>').attr('disabled',false);
                        for(var i=0;i<data.length;i++){
                            metro.append('<option value="'+data[i].name+'">'+data[i].name+'</option>');
                        }
                    }else{
                        metro.html('<option value="">-</option>').attr('disabled',true);
                    }

                },
                'json'
            )
        }
    };
    $('select[name="Search[district]"]').change(function(){
        changeDistrict('select[name="Search[metro]"]',this);
    });
    $(document).delegate('#address-district','change',function(){
        changeDistrict('#address-metro',this);
    });
    $('select[name="Search[metro]"]').change(function(){
       changeMetro('select[name="Search[district]"]',this);
    });
    $(document).delegate('#address-metro','change',function(){
        changeMetro('#address-district',this);
    });

    $(document).delegate('.modal-hall-form-params__select','change',function(){
        var checkBoxList =$('.modal-hall-form-checklist');
        if($(this).val()===$(this).find('option[selected=""]').val()){
            checkBoxList.html(template.checkBoxList);
        }else{
            $.get(
                '/ajax/list',
                {
                    type:'options',
                    name:$(this).val()
                },
                function(data){
                    checkBoxList.html('');
                    for(var i=0;i<data.length;i++){
                        checkBoxList.append(
                            '<label class="modal-hall-form-checklist-item">'+
                            '<input type="checkbox" value="'+data[i].id+'" name="Options[]">'+data[i].name+
                        '</label>'
                        );
                    }
                },
                'json'
            )
        }

    });

    $('.result-content-sort__list li').on('click',function(){
        var text = $(this).text(),
            name= $(this).attr('name'),
            order= 'asc',
            obj=null;

        $('.result-content-sort__value').html($(this).text());
        obj=$('#order_'+name);

        if(obj.length>0){
            if(obj.attr('value')=='asc'){
                order='desc';
            }else{
                order='asc';
            }
            obj.attr('name','Order['+name+']').attr('value',order);
        }else{
            $('#order_'+$('.result-content-sort__value').attr('order')).remove();
            $('.result-find').prepend("<input type='hidden' id='order_"+name+"' name='Order["+name+"]' value='"+order+"'>");
        }
        $('.result-find').submit();
    });

    $('.search-halls').click(function(event){
        event.preventDefault();
        var url=$(this).attr('href'),
            //data={_csrf:$('input[name="_csrf"]')};
            data={};
            $('.result-find-location-item__select').each(function(index){
                data[$(this).attr('name')]='';
                if($(this).attr('name')=='Search[category]'){
                    data[$(this).attr('name')]=$(this).val()
                }

            });
            data[$(this).attr('data-name')]=$(this).attr('data-value');
            data['Search[category]']=$(this).attr('data-value');

        $.post(
            url,
            data,
            function(data){
                location.href=url;
            }
        );
    });
    var init = function(){
        var obj=$('.result-content-sort__value'),
            name=obj.attr('order'),
            value="",
            parent=obj.parent();
        if($('#order_'+name).length>0){
            value=parent.find('li[name="'+name+'"]').text();
        }
        obj.html(value);
        template.metro=$('select[name="Search[metro]"]').html();
        template.district=$('select[name="Search[district]"]').html();

    };
    init();
});

ymaps.ready(function  () {

    var myMap;

    $('.ymap').fancybox({
        height:600,
        afterShow : function() {
        var id=$(this.element).attr('href'),
            geocode= $.parseJSON($(this.element).attr('geocode')),
            geoname=$(this.element).attr('geoname');

        myMap = new ymaps.Map(id.replace('#',''), {
            center: geocode,
            zoom: 15,
            behaviors: ["scrollZoom","drag"]
        });

        var myPlacemark = new ymaps.Placemark(geocode, {
            // Свойства
            iconContent: geoname,
            //balloonContentHeader: '<strong>Нижегородский государственный академический театр драмы имени М. Горького</strong>',
            balloonContentBody: geoname
            //balloonContentFooter: 'Сайт: <a rel="nofollow" href="http://www.drama.nnov.ru/" target="_blank">http://www.drama.nnov.ru</a>'
        }, {
            // Опции
            preset: 'twirl#redStretchyIcon',
            balloonMaxWidth: 250
        });

        // Добавляем метку на карту
        myMap.geoObjects.add(myPlacemark);

    }, afterClose:function (){
        myMap.destroy();
        myMap = null;
    }});
});

var button={
    close:function(el){
        $(el).remove();
    },
    show:function(el){
        $(el).show();
    },
    form:function(url){
        $.ajax(url).done(function(data){
            $("body").prepend(data);
        });
    },
    update:function(url){
        $.ajax(url).done(function(data){
            $("body").prepend(data);
            template.checkBoxList=$('.modal-hall-form-checklist').html();
        });
    }
};