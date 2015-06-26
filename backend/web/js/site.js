template={};
$(document).ready(function(){
   template={
       options:{
           html:$('#hall-options').html(),
           category:$('#hall-category').val()
           }
       };

    $('#hall-tab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })

});
$('#hall-category').change(function(){
    var category=$(this).val();
   $.ajax({
       url:'/category/options',
       dataType:'json',
       type:'GET',
       data:{id:$(this).val()},
       success:function(data){
           var text='';
           for(var i=0;i<data.length;i++){
               text+="<label>\n"+
               '<input type="checkbox" value="'+data[i].id+'" name="Hall[options][]"> '+data[i].name+
               "</label>\n"
               ;
           }
           if(category==template.options.category){
               $('#hall-options').html('').html(template.options.html);
           }else{
               $('#hall-options').html('').html(text);
           }

       }
   })
});