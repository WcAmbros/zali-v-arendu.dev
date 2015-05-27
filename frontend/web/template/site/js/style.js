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

    $(document).on('change','form',function(){
        //$(this).find('button').focus();
    });

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