$(document).ready(function (){
    $('.js-example-basic-single').select2();
    $('#province').change(function () {
        let province_id = $("#province option:selected").val();
        if(province_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url:"get-districts-by-provinces/"+province_id,
            }).done(function (res) {
                if(res)
                {
                    $("#district").empty()
                        .append('<option value="">Chọn quận huyện</option>');
                    $("#ward").empty()
                        .append('<option value="">Chọn phường xã</option>');
                    $("#street").empty()
                        .append('<option value="">Chọn đường phố</option>');
                    $.each(res,function(key,value){
                        $("#district").append('<option value="'+value.id+'">'+value._name+'</option>');
                    });
                }
            })
        }
    });
    $('#district').change(function () {
        let district_id = $("#district option:selected").val();
        let province_id = $("#province option:selected").val();
        if(district_id && province_id)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "get-wards-by-districts/"+ district_id+"/"+province_id,
            }).done(function (res) {
                if(res)
                {
                    $("#ward").empty()
                        .append('<option value="">Chọn phường xã</option>');
                    $("#street").empty()
                        .append('<option value="">Chọn đường phố</option>');

                    $.each(res[0],function(key,value){
                        $("#ward").append('<option value="'+value.id+'">'+value._name+'</option>');
                    });
                    $.each(res[1],function(key,value){
                        $("#street").append('<option value="'+value.id+'">'+value._name+'</option>');
                    });
                    $.each(res[2],function(key,value){
                        $("#project").append('<option value="'+value.id+'">'+value._name+'</option>');
                    });
                }
            });

    })

})



