function setVolk(id) {
    $.ajax({
        url: '/url/'+id+'/',
        type: 'GET',
        success: function(json){
            $('input[name=Volk]').val(json.NAME);
        }
    });
}