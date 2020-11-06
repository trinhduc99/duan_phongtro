let front_app = front_app || {};
front_app = {
	body: $(document.body),
    Window: $(window),
    is_requesting: false,
    validatePhone: function(phone){
        let phoneRe = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
        return phoneRe.test(phone);
    },
    user:{
        userLogin: function () {
            $(".js-login-form").on("submit", function (e) {
                e.preventDefault();
                let _self = $(this);
                let btn_submit = _self.find('button[type="submit"]');
                let btn_submit_text = btn_submit.html();
                btn_submit.html('Đang xử lý...');

                $.ajax({
                    url: base_url + "/user/login",
                    data: $(".js-login-form").serialize(),
                    type: "POST",
                    dataType: "json",
                    success:function(){
                        btn_submit.html(btn_submit_text);
                    }
                });
            });

            $(".js-login-form-popup").on("submit", function (e) {
                e.preventDefault();
                let _self = $(this);
                let btn_submit = _self.find('button[type="submit"]');
                let btn_submit_text = btn_submit.html();
                btn_submit.html('Đang xử lý...');

                $.ajax({
                    url: base_url + "/user/login",
                    data: $(".js-login-form-popup").serialize(),
                    type: "POST",
                    dataType: "json",
                    success:function(){
                        btn_submit.html(btn_submit_text);
                    }
                });
            });
        },
        userRegister: function () {
            $(".js-register-form").on("submit", function (e) {
                e.preventDefault();
                let _self = $(this);
                let btn_submit = _self.find('button[type="submit"]');
                let btn_submit_text = btn_submit.html();
                btn_submit.html('Đang xử lý...');
                $.ajax({
                    url: base_url + "/user/register",
                    data: $(".js-register-form").serialize(),
                    type: "POST",
                    dataType: "json",
                    success:function(){
                        btn_submit.html(btn_submit_text);
                    }
                });
            });

            $(".js-register-form-popup").on("submit", function (e) {
                e.preventDefault();
                let _self = $(this);
                let btn_submit = _self.find('button[type="submit"]');
                let btn_submit_text = btn_submit.html();
                btn_submit.html('Đang xử lý...');

                $.ajax({
                    url: base_url + "/user/register",
                    data: $(".js-register-form-popup").serialize(),
                    type: "POST",
                    dataType: "json",
                    success:function(){
                    	btn_submit.html(btn_submit_text);
                    }
                });
            });
        },
        forgotPassword: function () {
            let action_url, phone;

            // send email/sdt để lấy mã xác nhận
            $(".js-forget-password-first-step").on("submit", function (e) {
                e.preventDefault();

                let _self = $(this);
                action_url = _self.attr("data-action");
                phone = _self.find(".js-input-phone-or-email").val();
                _self.find(".js-forgot-password-next-step").html("Đang xử lý...");
                let data_next_step = _self
                    .find(".js-forgot-password-next-step")
                    .attr("data-next-step");

                $.ajax({
                    url: base_api_url+ '/user/send-token',
                    data: {
                        phone: phone,
                        action:'forget_password'
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        if (data.data_code == 200) {
                            $(".js-forgot-password-step.active").addClass("deactive");
                            $(".js-forgot-password-step.step_" + data_next_step)
                                .find(".js-alert-message")
                                .html(data.message);
                            setTimeout(function () {
                                $(".js-forgot-password-step").removeClass("active");
                                $(".js-forgot-password-step.step_" + data_next_step).addClass(
                                    "active"
                                );
                            }, 100);
                        }
                    }
                });
            });

            // verify mã xác nhận đúng hay không
            $(".js-forget-password-second-step").on("submit", function (e) {
                e.preventDefault();

                let _self = $(this);
                let verify_code = _self.find(".js-input-verify-code").val();
                let data_next_step = _self
                    .find(".js-forgot-password-next-step")
                    .attr("data-next-step");
                $.ajax({
                    url: base_api_url+ '/user/verify-token',
                    data: {
                        verify_code: verify_code,
                        phone_or_email: phone,
                        action:'forget_password'
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        if (data.data_code == 200) {
                            $(".js-forgot-password-step.active").addClass("deactive");
                            setTimeout(function () {
                                $(".js-forgot-password-step").removeClass("active");
                                $(".js-forgot-password-step.step_" + data_next_step).addClass(
                                    "active"
                                );
                            }, 100);
                        }
                    }
                });
            });

            $(".js-forget-password-third-step").on("submit", function (e) {
                e.preventDefault();

                let _self = $(this);
                let password = _self.find(".js-newpassword").val();
                let cf_password = _self.find(".js-confirm-newpassword").val();
                if (password != cf_password) {
                    alert("Mật khẩu xác nhận không đúng");
                    return;
                }
                let data_next_step = _self
                    .find(".js-forgot-password-next-step")
                    .attr("data-next-step");
                $.ajax({
                    url: base_api_url+'/user/update/password',
                    data: {
                        password: password,
                        cf_password: cf_password,
                        phone_or_email: phone
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        if (data.data_code == 200) {
                            $(".js-forgot-password-step.active").addClass("deactive");
                            setTimeout(function () {
                                $(".js-forgot-password-step").removeClass("active");
                                $(".js-forgot-password-step.step_" + data_next_step).addClass(
                                    "active"
                                );
                            }, 100);
                        }
                    }
                });
            });

            // gửi lại mã xác nhận trường hợp không nhận được, hay lỡ xóa hay sao đó
            $(".js-btn-resend-token").on("click", function (e) {
                e.preventDefault();

                let $btn = $(this).button("loading");
                // business logic...
                $.ajax({
                    url: action_url,
                    data: {
                        phone_or_email: phone_or_email,
                        resend: 1
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        if (data.code == 200) {
                            $btn.button("reset");
                        }
                    }
                });
            });
        },
        verifyAccount: function () {
            let phone_number;

            $(".js-btn-get-verify-code").on("click", function (e) {
                e.preventDefault();

                if(front_app.is_requesting) return;
                front_app.is_requesting = true;
                let _self = $(this);
                phone_number = $(".js-input-phone").val();
                let data_action_url = _self.attr("data-action-url");

                if (!phone_number || !front_app.validatePhone(phone_number)) {
                    toastr.error("Vui lòng nhập đúng Format số điện thoại: Vd 0981234567 hoặc 012341234567", "Lỗi");
                    return;
                }

                $.ajax({
                    url: data_action_url,
                    data: {
                        phone: phone_number,
                        action: "verify"
                    },
                    type: "POST",
                    dataType: "json",
                    success:function(res){
                        front_app.is_requesting = false;
                    },
                    error:function(res){
                        front_app.is_requesting = false;
                    }
                });
            });

            $(".js-btn-verify").on("click", function (e) {
                e.preventDefault();

                let _self = $(this);
                let data_action_url = _self.attr("data-action-url");
                let verify_code = $(".js-input-verify-code").val();
                let redirect_to = $("#redirect_to").val();
                phone_number = $(".js-input-phone").val();

                if (!verify_code) {
                    toastr.error("Bạn hãy nhập mã xác nhận để tiếp tục.", "Lỗi");
                    return;
                }

                $.ajax({
                    url: data_action_url,
                    data: {
                        verify_code: verify_code,
                        phone_or_email: phone_number,
                        action: "verify",
                        redirect_to: redirect_to
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        if (data.data_code == 200) {

                        }
                    }
                });
            });

            let from = $('.js-verify-input-phone').attr('data-from-page');
            if(from == 'r' && phone_number != ''){
                $(".js-btn-get-verify-code").trigger('click');
            }
        },
        logout:function(){
            $('.js-header-control-user-login').on('click', '.js-user-logout', function(event){
                event.preventDefault();
                let _self = $(this);
                let logout_url = _self.attr('href');
                localStorage.removeItem("authenticated");
                localStorage.removeItem("verified");
                localStorage.removeItem("access_token");
                localStorage.removeItem("bds123.user_data");
                window.location.href = logout_url;
            });
        },
        reloadHtmlHeader: function () {

            if($('.js-reload-html-header').length == 0) return;
            let action_url = base_url + "/api/refresh/header";

            $.ajax({
                url: action_url,
                type: "POST",
                dataType: "json"
            });
        },
        init:function(){
            this.reloadHtmlHeader();
            this.userLogin();
            this.userRegister();
            this.forgotPassword();
            this.verifyAccount();
            this.logout();
        },
    },
    post:{
        findPackageById: function(package_id){
            for(let i = 0; i<window.packages.length; i++){
                if(packages[i].id == package_id){
                    return packages[i];
                }
            }
            return false;
        },
        renderGrandTotalHtml: function(options){
            let self = this;
            let package_id = options.package_id;
            let package_time = options.package_time;
            let package_total = options.package_total;
            let package_total_day = package_total;
            let current_grand_total = 0;
            let current_deadline_time = '';
            let package_price_text = '';
            let package_total_text = package_total_day + ' ngày';

            let package = self.findPackageById(package_id);
            current_grand_total = package.price * package_total;
            package_price_text = numberWithCommas(package.price)+' đ/ngày';

            if(package_time == 'week'){
                package_total_day = package_total*7;
                current_grand_total = package.price_week * package_total;
                package_price_text = numberWithCommas(package.price_week)+' đ/tuần';
                package_total_text = package_total + ' tuần ('+package_total_day+' ngày)';
            }

            if(package_time == 'month'){
                package_total_day = package_total*30;
                current_grand_total = package.price_month * package_total;
                package_price_text = numberWithCommas(package.price_month)+' đ/tháng';
                package_total_text = package_total + ' tháng ('+package_total_day+' ngày)';
            }

            package_total_day = parseInt(package_total_day);

            let deadline_date = new Date();
            current_deadline_time = deadline_date.addDays(package_total_day);
            let day = current_deadline_time.getDate();
            let month = current_deadline_time.getMonth()+1;
            let year = current_deadline_time.getFullYear();

            $('.js-wrapper-dang-tin .js-package-price').html(package_price_text);
            $('.js-wrapper-dang-tin .js-package-days').html(package_total_text);
            $('.js-wrapper-dang-tin .js-package-deadline').html(day+'/'+month+'/'+year);
            $('.js-wrapper-dang-tin .js-package-grand-total').html(numberWithCommas(current_grand_total) + 'đ');
        },
        submitFrontPost: function(){
            let self = this;

            $('.js-form-post-vip-submit').on('submit', function(e){
                e.preventDefault();

                if(self.is_requesting) return;

                let fd = new FormData();
                let other_data = $(this).serializeArray();
                $.each(other_data,function(key,input){
                    fd.append(input.name,input.value);
                });

                $.ajax({
                    url: get_district_ajax.ajaxurl,
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    beforeSend: function(){
                        self.is_requesting = true;
                    },
                    success: function(data){
                        self.is_requesting = false;
                    },
                    error: function(){
                        self.is_requesting = false;
                    }
                });
            });

            $('#frm-dangtin').on('submit', function(e){

                e.preventDefault();
                let _self = $(this);
                let btn_submit = $(this).find('.js-btn-submit');
                let btn_submit_text = btn_submit.html();

                if(self.is_requesting) return;

                $.ajax({
                    url: base_api_url+'/create/post',
                    data: _self.serialize(),
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(){
                        self.is_requesting = true;
                        btn_submit.html("Đang xử lý...");
                    },
                    success: function(data){
                        self.is_requesting = false;
                        btn_submit.html(btn_submit_text);
                    },
                    error: function(){
                        self.is_requesting = false;
                        btn_submit.html(btn_submit_text);
                    }
                });

            });

            $('#thoa_thuan').click(function(){
                if($(this).is(':checked')){
                    $('#giachothue').attr('readonly', true);
                    $('#giachothue').removeAttr('required');
                }else{
                    $('#giachothue').attr('required', true);
                    $('#giachothue').removeAttr('readonly');
                }
            });
        },
        uploadVersion3: function(){

            if ($(".js-upload-list-wrapper").length > 0) {
                $(".js-upload-list-wrapper").sortable();
            }

            function add_file(id, file){
                /* preparing image for preview */
                if (typeof FileReader !== "undefined") {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let image_preview = e.target.result;
                        image_preview = e.target.result;
                        let template = '' +
                        '<div id="media_item_'+id+'" class="media_item js-media-item" data-id="" data-url="" data-file-name="'+file.name+'">' +
                            '<div class="media_item_preview">' +
                                '<div class="media_item_thumbail" style="background: url('+image_preview+') center no-repeat; background-size: cover;">' +
                                    '<img src="'+image_preview+'">' +
                                    '<input class="images_linked_id" type="hidden" value="" name="images_linked_ids[]"/>' +
                                    '<input class="images_linked_path" type="hidden" value="" name="images_linked_paths[]"/>' +
                                '</div><div class="media_item_action">'+
                                    /*'<label><input class="image_thumbnail" type="radio" value="" name="image_thumbnail"/> Hình đại diện</label>' + */
                                    '<a class="remove-selected" href="#delete" rel="'+file.name+'"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa hình này</a>'+
                                '</div>' +
                            '</div>' +
                            '<div class="progress">' +
                                '<div class="progress-bar progress-bar-success js-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 5%">'+
                                    '<span>5%</span>'+
                                '</div>'+
                            '</div>' +
                        '</div>';

                        $('.js-upload-list-wrapper').append(template);
                    };

                    reader.readAsDataURL(file);
                }
            }

            function update_file_status(id, status, message){
                $('#media_item_' + id).addClass(status);
            }

            function update_file_progress(id, percent){
                $('#media_item_' + id).find('.js-progress-bar').width(percent);
                $('#media_item_' + id).find('.js-progress-bar span').html(percent);
            }

            let _current_url = window.location.href;
            $('.js-drag-and-drop-zone').dmUploader({
                url: 'https://static123.com/api/upload',//get_district_ajax.ajaxurl,
                dataType: 'json',
                allowedTypes: 'image\/*',
                extFilter: 'jpg;png;gif;jpeg;JPG;JPEG;PNG',
                maxFileSize: 5000000,
                extraData: {
                    'action':'preupload_file_v3',
                    'source':'phongtro123',
                    'source_url':_current_url
                },
                onInit: function(){
                    //console.log('initialized :)');
                },
                onBeforeUpload: function(id){
                    //console.log('Starting the upload of #' + id);
                    update_file_status(id, 'uploading', 'Uploading...');

                    $('.btn-update-tin').addClass('disabled');
                    $('.btn-dangtin-ngay').addClass('disabled');
                },
                onNewFile: function(id, file){
                    //console.log('New file added to queue #' + id);
                    add_file(id, file);
                    $('.js-nav-tabs a[href="#library_media"]').tab('show');
                },
                onComplete: function(){
                    //console.log('All pending tranfers finished');
                },
                onUploadProgress: function(id, percent){
                    let percentStr = percent + '%';
                    update_file_progress(id, percentStr);
                },
                onUploadSuccess: function(id, data){

                    if(typeof data.image_id != 'undefined'){
                        $('#media_item_' + id).addClass('upload_done');
                        update_file_status(id, 'selected', 'Upload Complete');
                        update_file_progress(id, '100%');

                        // set lại value mới sau khi upload hình thành công
                        $('#media_item_'+id).find('img').attr('src', data.image_full_url);
                        $('#media_item_'+id).find('.images_linked_path').val(data.image_path);
                        $('#media_item_'+id).find('.images_linked_id').val(data.image_id);
                        $('#media_item_'+id).find('.image_thumbnail').val(data.image_id);
                    }else{
                        $('#media_item_' + id).remove();
                    }

                    $('.btn-update-tin').removeClass('disabled');
                    $('.btn-dangtin-ngay').removeClass('disabled');
                },
                onUploadError: function(id, message){
                    //console.log('Failed to Upload file #' + id + ': ' + message);
                    update_file_status(id, 'error', message);

                    $('.btn-update-tin').removeClass('disabled');
                    $('.btn-dangtin-ngay').removeClass('disabled');

                    $('#media_item_' + id).remove();
                },
                onFileSizeError: function(file){
                    alert('Lỗi, Không thể upload file \'' + file.name + '\' này, chỉ được phép upload file dưới 5mb. Cảm ơn.');
                },
                onFallbackMode: function(message){
                    alert('Browser not supported(do something else here!): ' + message);
                }
            });
        },
        dangTin2018: function(){
            let self = this;
            if(!window.packages || window.packages.length == 0) return;
            let current_package_vip_id = window.packages[0].id;
            let current_package_time = 'day';
            let current_package_total = 3;

            $('.js-choose-package-vip').on('change', function(){
                current_package_vip_id = $(this).val();
                if(current_package_vip_id == ''){
                    toastr.error("Bạn chưa chọn gói tin đăng", "Thông báo");
                    return;
                }
                self.renderGrandTotalHtml({'package_id': current_package_vip_id, 'package_time': current_package_time, 'package_total': current_package_total});
            });

            $('.js-goi-thoi-gian').on('change', function(event){
                current_package_time = $(this).val();
                current_package_total = $('.js-wrap-dang-theo[data-by="'+current_package_time+'"] select').val();

                $('.js-wrap-dang-theo').addClass('hidden');
                $('.js-wrap-dang-theo[data-by="'+current_package_time+'"]').removeClass('hidden');

                self.renderGrandTotalHtml({'package_id': current_package_vip_id, 'package_time': current_package_time, 'package_total': current_package_total});

                $('.js-wrap-dang-theo[data-by="'+current_package_time+'"] select').on('change', function(){
                    current_package_total = $(this).val();
                    self.renderGrandTotalHtml({'package_id': current_package_vip_id, 'package_time': current_package_time, 'package_total': current_package_total});
                });
            });

            $('.js-wrap-dang-theo[data-by="'+current_package_time+'"] select').on('change', function(){
                current_package_total = $(this).val();
                self.renderGrandTotalHtml({'package_id': current_package_vip_id, 'package_time': current_package_time, 'package_total': current_package_total});
            });

        },
        init: function(){
            this.submitFrontPost();
            this.uploadVersion3();
            this.dangTin2018();
        }
    },
    payment:{
        order_id:0,
        method:'store',
        is_success:false,
        payoo: function(){
            let self = this;

            $('.js-btn-cancel-qrcode').on('click', function(event){
                event.preventDefault();

                let _self = $(this);
                let _button_text = _self.html();
                _self.html('Đang xử lí');

                $.ajax({
                    url: base_api_url+'/payoo/cancel/qrcode',
                    data: {order_id: self.order_id, status:'cancel'},
                    method: 'post',
                    type: 'json',
                    success: function(){
                        _self.html(_button_text);
                    }
                });
            });

        },
        momo: function(){
            let self = this;
        },
        checkPayooQRCode: function(){
            let self = this;

            if(self.order_id == 0) return;
            if(self.is_success) return;

            $.ajax({
                url: base_api_url+'/payoo/check/qrcode',
                data: {order_id: self.order_id},
                method: 'post',
                type: 'json',
                success:function(res){
                    if(res.success){
                        self.is_success = true;
                        return;
                    }
                    self.is_success = false;
                }
            });

            setTimeout(function(){
                self.checkPayooQRCode();
            }, 1500);
        },
        init:function(){
            this.payoo();
            this.momo();
        }
    },
    layoutFront: function () {
        let self = this;

        $('.js-btn-group-price input[type="radio"]').change(function(){
            let number = $(this).val();
            let current_price = number.replace(/,/g,'');

            let number_text = docso(current_price) + ' đồng';

			$(this).closest('.js-form-submit-data').find('.js-price').val(parseFloat(number).formatDot());
			$(this).closest('.js-form-submit-data').find('.js-price-text').html(number_text);
        });

        $('.js-price').donetyping(function(){

            let current_price = $(this).val().replace(/\,/g,'');
            current_price = current_price.replace(/\./g,'');

            if(!current_price || current_price == '') {
                $(this).closest('.js-price-wrapper').find('.js-price-text').addClass('hidden');
                $(this).closest('.js-form-submit-data').find('.js-btn-group-price input[type="radio"]:first').prop("checked");
                return;
            }

            let number_text = docso(current_price) + ' đồng';
            $(this).val(parseFloat(current_price).formatDot());

            $(this).closest('.js-price-wrapper').find('.js-price-text').removeClass('hidden');
            $(this).closest('.js-price-wrapper').find('.js-price-text').html(number_text);
            $(this).closest('.js-form-submit-data').find('.js-btn-group-price input[type="radio"]').prop("checked");

        }, 50);

        if(typeof Clipboard !== 'undefined'){
            new Clipboard('.btn_copy_link');
            new Clipboard('.btn_copy_link2');
        }

        $(".js_btn_menu:not(.open)").click(function () {
            $(this).toggleClass("open");
            $("body").toggleClass("menu_mobile_opening");
            $("#webpage").addClass("mm-slideout");
            setTimeout(function () {
                $("body").toggleClass("menu_mobile_open_done");
            }, 300);
        });

        $(".panel-backdrop").click(function () {
            $("body").removeClass("menu_mobile_opening");
            $("body").removeClass("menu_mobile_open_done");
            $("#mn_icon").removeClass("open");
        });

        if(typeof tinymce !== 'undefined'){
            tinymce.init({
                selector: 'textarea.editor',
                height: 300,
                theme: 'modern',
                entity_encoding: "raw",
                plugins: [
                    'image imagetools',
                  //'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                  //'searchreplace wordcount visualblocks visualchars code fullscreen',
                  //'insertdatetime media nonbreaking save table contextmenu directionality',
                  //'emoticons template paste textcolor colorpicker textpattern imagetools'
                  'autolink link paste',
                  'code'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true,
                paste_auto_cleanup_on_paste : true,
                paste_remove_spans: true,
                paste_remove_styles: true,
                paste_strip_class_attributes: true,
                paste_remove_styles_if_webkit: true,
                paste_retain_style_properties : "",
                paste_preprocess: function(plugin, args) {
                    let re = /<a\s.*?href=["']([^"']*?[^"']*?)[^>]*>(.*?)<\/a>/g;
                    let subst = '$2';
                    args.content = args.content.replace(re, subst);

                    let whitelist = 'p,span,b,strong,i,em,h3,h4,h5,h6,ul,li,ol,img,div';
                    let stripped = $('<div>' + args.content + '</div>');

                    let els = stripped.find('*').not(whitelist);
                    for (let i = els.length - 1; i >= 0; i--) {
                        let e = els[i];
                        $(e).replaceWith(e.innerHTML);
                    }
                    // Strip all class and id attributes
                    stripped.find('*').removeAttr('id').removeAttr('class');
                    stripped.children('div').each(function(e, el) {
                        $(el).replaceWith( $('<p />', {html: $(this).html()}) );
                    });
                    // Return the clean HTML
                    args.content = stripped.html();
                },
                templates: [
                  { title: 'Test template 1', content: 'Test 1' },
                  { title: 'Test template 2', content: 'Test 2' }
                ],
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                },
                content_css:base_url+'/css/custom.mce.css',
                image_caption: true,
                convert_urls:true,
                relative_urls:false,
                remove_script_host:false,
            });
        }
    },
    processSubmitFormFront: function () {
        let self = this;

        $(".js-form-submit-data").each(function(index, el){
            $(el).validate({
                submitHandler: function(form, event) {
                    event.preventDefault();

                    if (self.is_requesting) return;
                    self.is_requesting = true;

                    let _self = $(form);
                    let action_url = _self.attr("data-action-url");
                    if (!action_url) return;

                    let html_button = _self.find(".js-btn-hoan-tat").html();
                    let formData = new FormData(form);

                    $.ajax({
                        url: action_url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: "POST",
                        dataType: "json",
                        beforeSend: function () {
                            _self.find(".js-btn-hoan-tat").text("Đang xử lí...");
                        },
                        success: function (data) {
                            _self.find(".js-btn-hoan-tat").html(html_button);
                            self.is_requesting = false;
                        },
                        error: function (data) {
                            _self.find(".js-btn-hoan-tat").html(html_button);
                            self.is_requesting = false;
                        }
                    });
                    //form.submit();
                },
                errorPlacement: function($error, $element) {
                    let input_group = $element.closest('.input-group');
                    let el_parent = input_group.length > 0 ? input_group.parent() : $element.parent();
                    $error.appendTo(el_parent);
                }
            });
        });

	},
    displayPriceText: function(){
		$('#giachothue').donetyping(function(){

            let current_price = $(this).val().replace(/,/g,'');
            current_price = current_price.replace(/\./g,'');
            current_price = current_price.replace(/[^\d]/,'');

            if(current_price && current_price.length > 0 && !isNaN(current_price)){
                $(this).val(parseFloat(current_price).formatDot());
            }else{
                $(this).val('');
            }

            let number_text = docso(current_price) + ' đồng/tháng';
            $('.js-number-text').html(number_text);
        }, 50);

        let current_price = $('#giachothue').val();
        if(current_price && current_price.length > 0 && !isNaN(current_price)){
            current_price = current_price.replace(/,/g,'');
            current_price = current_price.replace(/\./g,'');
            current_price = current_price.replace(/[^\d]/,'');

            $('#giachothue').val(parseFloat(current_price).formatDot());

            let number_text = docso(current_price) + ' đồng/tháng';
            $('.js-number-text').html(number_text);
        }

	},
    fixFacebookLogin: function () {
		if (!window.location.hash || window.location.hash !== '#_=_')
			return;
		if (window.history && window.history.replaceState)
			return window.history.replaceState('', document.title, window.location.pathname + window.location.search);
		// Prevent scrolling by storing the page's current scroll offset
		let scroll = {
			top: document.body.scrollTop,
			left: document.body.scrollLeft
		};
		window.location.hash = "";
		// Restore the scroll offset, should be flicker free
		document.body.scrollTop = scroll.top;
		document.body.scrollLeft = scroll.left;
    },
    lazyLoadImage: function () {
		if (typeof lozad === 'function') {
			this.observer = lozad('.lazy', {
				rootMargin: '10px 0px', // syntax similar to that of CSS Margin
				threshold: 0.1,
				loaded: function (element) {
					element.classList.add('lazy_done');
					element.classList.remove('lazy');
				}
			});
			this.observer.observe();
		}
    },
    initWithWindow: function () {
		this.lazyLoadImage();
	},
    init: function () {
		this.layoutFront();
		this.fixFacebookLogin();
        this.displayPriceText();
        this.processSubmitFormFront();
        this.user.init();
        this.post.init();
        /* init payment */
        this.payment.init();
	}
};

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content")
    }
});

$(document).ajaxComplete(function(event, xhr, settings){
    // reinit facebook
    if(!xhr.responseText) return;
    let response = $.parseJSON(xhr.responseText);
    if(!response) return;

    if(response.code != 200){
        if(response.code == 500){
            let jsonData = response;
            for(let obj in jsonData){
                toastr.options.closeButton = true;
                toastr.error(jsonData[obj][0], "Lỗi");
            }

            return;
        }
    }
    if(typeof response.action == 'undefined' || response.action == '')return;

    $.each(response.action.trim().split(' '), function(index, action){
        let timeout = response.action.trim().split(' ').length > 2 ? 3000 : 2000;
        if(action == 'toastr'){
            toastr.options = {
                "closeButton": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "6000"
            };

            if(response.command == 'success'){
                toastr.success(response.message, response.title);
            }else if(response.command == 'info'){
                toastr.info(response.message, response.title);
            }else if(response.command == 'waring'){
                toastr.warning(response.message, response.title);
            }else if(response.command == 'error'){
                toastr.options.closeButton = true;
                toastr.error(response.message, response.title);
            }else{
                toastr.info(response.message, response.title);
            }
        }

        if(action == 'sweetalert'){
            Swal.fire({
                title: response.title,
                html: response.message,
                type: response.command,
                timer: response.command == 'error' ? 9000 : 3000,
                showConfirmButton: response.command == 'error' ? true : false
            });
        }

        if(action == 'redirect'){
            setTimeout(function () {
                window.location.href = response.link;
            }, timeout);
        }

        if (action == 'redirect_auth' || action == 'redirect_suddenly') {
            window.location.href = response.link;
        }

        if(action == 'redirect_delay'){
            setTimeout(function () {
                window.location.href = response.link;
            }, timeout);
        }

        if(action == 'reload'){
            setTimeout(function () {
                window.location.reload();
            }, timeout);
        }

        if(action == 'khong_du_tien'){
            $('.js_thong_bao').addClass('hide');
            $('.js_loi_khong_du_tien').removeClass('hide');
            $('html, body').animate({scrollTop : 0}, 500);
        }

        if(action == 'dang_lai_thanh_cong'){
            $('.js_step_chon_loai_tin_dang').addClass('hide');
            $('.js_thong_bao').addClass('hide');
            $('.js_thanh_cong').removeClass('hide');
            $('html, body').animate({scrollTop : 0}, 500);
        }

        if(action == 'loi_ket_noi_server'){
            $('.js_thong_bao').addClass('hide');
            $('.js_bao_loi').removeClass('hide');
            if(response.message){
                $('.js_bao_loi').find('.js-message').html(response.message);
            }
            $('html, body').animate({scrollTop : 0}, 500);
        }

        if (action == 'replace_html') {
            $(response.js_class).html(response.html);
        }

        if (action == 'replace_array_html') {
            $.each(response.responses, function (key, html) {
                $(key).html(html);
            });
        }

        if(action == 'offline_store'){
            $('.js-payment-number').html(response.billingCode);
            $('.js-payment-at-store').find('.js-payment-step').addClass('hidden');
            $('.js-payment-step.step-2').removeClass('hidden');

            $('.js-date-expired').html(response.validate_time);
        }

        if(action == 'qrcode'){
            toastr.remove();
            if(!response.QRCodeLink){
                toastr.info('Thông báo', 'Có lỗi xảy ra. Vui lòng thử lại!');
                return;
            }
            $('.js-qr-code').find('img').attr('src', response.QRCodeLink);
            $('.js-payment-at-store').find('.js-payment-step').addClass('hidden');
            $('.js-payment-step.step-2').removeClass('hidden');

            front_app.payment.order_id = response.order_no;
            $('.js-time-expired').attr('data-time', response.validate_time)
            .countdown(response.validate_time)
            .on("update.countdown", function(event) {
                let format = "%H:%M:%S";
                $(this).html(event.strftime(format));
            })
            .on('finish.countdown', function(event){
                /* #TODO timeout*/
                $.ajax({
                    url: base_api_url+'/payoo/cancel/qrcode',
                    data: {order_id: response.order_no, status:'timeout'},
                    method: 'post',
                    type: 'json'
                });
            });

            /* #TODO timer check qrcode*/
            front_app.payment.checkPayooQRCode();
        }

        if(action == 'get_verify_code'){
            if($(".js-input-verify-wrap").length){
                $(".js-verify-step").addClass("hidden");
                $(".js-input-verify-wrap").removeClass("hidden");
                $(".js-input-verify-wrap").find(".js-alert-message").html(response.message);
            }
            $('.js-input-phone').attr('readonly', 'readonly').addClass('disabled');
            $('.js-btn-cap-nhat').removeAttr('disabled').removeClass('disabled');

            $('.js-resend .js-btn-get-verify-code').addClass('disabled').prop('disabled', true);
            let _time = new Date();
            let _second = 120;
            _time.setSeconds(_time.getSeconds() + _second);

            $('.js-btn-get-verify-code .js-time-expired').countdown(_time)
            .on("update.countdown", function(event) {
                _second--;
                $(this).html('('+_second+'s)');
            })
            .on('finish.countdown', function(event){
                // DONE
                $(this).html('');
                $('.js-resend .js-btn-get-verify-code').removeClass('disabled').removeAttr('disabled');
            });
        }

        if(action == 'insert_ads'){
            if(front_app.body.hasClass('page_tim_kiem')) return;
            if(front_app.body.hasClass('login')) return;
            if(front_app.body.hasClass('register')) return;

            $('.js-show-mobile-ads').html(
                '<!-- phongtro123com_300x250 -->'+
                '<ins class="adsbygoogle"'+
                    'style="display:inline-block;width:300px;height:250px"'+
                    'data-ad-client="ca-pub-1713423796088709"'+
                    'data-ad-slot="3276511865"></ins>'+
                '<script>'+
                    '(adsbygoogle = window.adsbygoogle || []).push({});'+
                '</script>'
            );
        }
    });
});

// khởi tạo với windows
front_app.initWithWindow();
// khởi tạo khi jquery load xong
jQuery(document).ready(function($) {

	let jBody = $(document.body);
    // if (jBody.hasClass("loaded")) return;
    jBody.addClass('loaded');
    jBody.addClass('ready');

	front_app.init();
});
