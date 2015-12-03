var Trans = function(){

    var theResponse;

    return {

        init: function(){
            this.translate();
        },

        translate: function(){
            $.ajax({
                type: "GET",
                url: $("meta[name='base']").attr('content') + '/admin/translate',
                dataType: 'json',
                async: false,
                beforeSend: function (xhr){
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name=_token]').attr('content'));
                },
                success: function(data){
                    theResponse = data;
                }
            });
        },

        get: function(s, o){
            var string = theResponse[s];

            if(o && typeof o == "object"){
                $.each(o, function (i, v) {
                    string = string.replace(":"+i, v);
                });
                return string;
            }
            return string;
        },

    }

}();
