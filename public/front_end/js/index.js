$(document).ready(function (){
    $('#province').change(function () {
        var province_id = $("#province option:selected").val();
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
                        .append('<option>Chọn Quận Huyện</option>');
                    $("#ward").empty()
                        .append('<option>Chọn Phường Xã</option>');
                    $.each(res,function(key,value){
                        $("#district").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            })
        }
    });
    $('#district').change(function () {
        var ward = $("#district option:selected").val();
        if(ward) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "get-wards-by-districts/"+ ward,
            }).done(function (res) {
                if(res)
                {
                    $("#ward").empty()
                        .append('<option>Chọn Phường Xã</option>');
                    $.each(res,function(key,value){
                        $("#ward").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            })
        }
    })
})
