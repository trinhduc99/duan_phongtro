$(function () {
    $.validator.addMethod("phoneno", function(phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return phone_number.length > 9 ;
    }, "Vui lòng chỉ định một số điện thoại hợp lệ");
    $.validator.addMethod("currency", function (value, element) {
        return this.optional(element) || /^\$(\d{1,3}(\d{3})*|(\d+))(\.\d{2})?$/.test(value);
    }, "Please specify a valid amount");
    $("#form_dangtin").validate({
        rules: {
            province: {
                required: true
            },
            district: "required",
            ward: "required",
            street: "required",
            street_number: "required",
            acc_address: "required",
            acc_title: {
                required: true,
                minlength: 30,
                maxlength: 120,
            },
            phone: {
                phoneno: true,
                required: true,
                minlength:10,
                maxlength:10
            },
            acc_price: {required: true},
            acc_area: {required: true},
            acc_type_toilet: {required: true},
            acc_close_time: {required: true},
            acc_electric_price: {required: true},
            acc_electric_calculate_method: {required: true},
            acc_water_price: {required: true},
            acc_water_calculate_method: {required: true},
            acc_internet_price: {required: true},
            acc_deposit_price: {required: true},
            acc_user_gender: {required: true},
            acc_user_object: {required: true},
            acc_item: {required: true},
            acc_description: {required: true},
            acc_new: {required: true},
            acc_new_type: {required: true},
            acc_new_type_day: {required: true},
            acc_new_type_week: {required: true},
            acc_new_type_month: {required: true},
            new_start_day: {required: true},
        },
        messages: {
            province: { required:"Bạn chưa chọn thành phố"},
            district: "Bạn chưa chọn quận huyện",
            ward: "Bạn chưa chọn phường xã",
            street: "Bạn chưa chọn phường xã",
            street_number: "Bạn chưa nhập số nhà",
            acc_address: "Bạn chưa có dữ liệu về địa chỉ chính xác",
            acc_title: {
                required: "Bạn chưa nhập tiêu đề bài đăg",
                minlength: "Bài đăng có độ dài tối thiểu 30 ký tự",
                maxlength: "Bài đăng có độ dài tối đa 120 ký tự",
            },
            phone:{
                required:"Bạn chưa nhập số điện thoại",
                minlength:"Số điện thoại chỉ gồm 10 số",
                maxlength:"Số điện thoại chỉ gồm 10 số",

            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
