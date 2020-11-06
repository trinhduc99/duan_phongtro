var manage_post = manage_post || {};
manage_post = {
    form:'.js-frm-manage-post',
    dl_package_price:'.js-package-price',
    dl_package_day:'.js-package-days',
    dl_package_deadline:'.js-package-deadline',
    dl_package_grand_total:'.js-package-grand-total',
    dl_package_use_label:'.js-use-label',
    dl_package_title:'.js-package-title',
    dl_package_title_ck:'.js-package-title-ck',
    dl_package_time_type:'.js-time-type',
    dl_package_time_type_ck:'.js-time-type-ck',
    dl_package_time_type_so_luong:'.js-time-type-so-luong',
    constant_day:'ngày',
    constant_week:'tuần',
    constant_month:'tháng',
    constant_vnd:'đ',
    package_type:'day',
    return_url:'',
    post:{},
    packages:{},
    total_time:5,
    total_day:5,
    amount:0,
    package:false,
    use_label:0,
    payment_method:'account',
    images:[],
    formatNumber(number, n = 0 , x = 3, s = '.', c = ','){
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
            num = Number.parseFloat(number).toFixed(Math.max(0, ~~n));
        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    },
    findPackageById: function(package_id){
        for(var i = 0; i < this.packages.length; i++){
            if(this.packages[i].id == package_id)
                return this.packages[i];
        }
        return false;
    },
    renderHtmlPrice: function(){
        if(!this.package) return;

        if(this.payment_method == 'account'){
            if(this.amount > account_balance_number){
                $('.js-note-outofmoney').removeClass('hidden');
                $(this.form).find('button[type="submit"]').addClass('disabled');
                $(this.form).find('button[type="submit"]').prop('disabled', true);
            }else{
                $('.js-note-outofmoney').addClass('hidden');
                $(this.form).find('button[type="submit"]').removeClass('disabled');
                $(this.form).find('button[type="submit"]').prop('disabled', false);
            }
        }else{
            $(this.form).find('button[type="submit"]').removeClass('disabled');
            $(this.form).find('button[type="submit"]').prop('disabled', false);
        }

        if($(this.form).find('#action').val() == 'up_top'){
            var price_up = this.package.price_up;
            //price_up = 0;
            $(this.dl_package_price).html(this.formatNumber(price_up)+' đồng');
            $(this.dl_package_grand_total).html(this.formatNumber(price_up)+' đồng');
            return;
        }

        if(this.package_type == 'day'){
            $(this.dl_package_price).html(this.formatNumber(this.package.price) + '/'+this.constant_day);
            $(this.dl_package_time_type).html("Đăng theo ngày");
            $(this.dl_package_time_type_ck).html("Dang theo ngay");
            $(this.dl_package_time_type_so_luong).html(this.total_time + ' ngay');

        }
        if(this.package_type == 'week'){
            $(this.dl_package_price).html(this.formatNumber(this.package.price_week) + '/'+this.constant_week);
            $(this.dl_package_time_type).html("Đăng theo tuần");
            $(this.dl_package_time_type_ck).html("Dang theo tuan");
            $(this.dl_package_time_type_so_luong).html(this.total_time + ' tuan');
        }
        if(this.package_type == 'month'){
            $(this.dl_package_price).html(this.formatNumber(this.package.price_month) + '/'+this.constant_month);
            $(this.dl_package_time_type).html("Đăng theo tháng");
            $(this.dl_package_time_type_ck).html("Dang theo thang");
            $(this.dl_package_time_type_so_luong).html(this.total_time + ' thang');
        }
        $(this.dl_package_day).html(this.total_day);
        $(this.dl_package_title).html(this.package.title);
        $(this.dl_package_title_ck).html(this.package.slug);

        $(this.dl_package_grand_total).html(this.formatNumber(this.amount) + this.constant_vnd);

        var d = $(this.dl_package_deadline).attr('data-current-expired') ? new Date($(this.dl_package_deadline).attr('data-current-expired').replace(/-/g, '/')) :  new Date();
        d.setDate(d.getDate() + parseInt(this.total_day));
        $(this.dl_package_deadline).html(d.getHours() + ":" + d.getMinutes() +', ' + d.getDate()  + "/" + (d.getMonth()+1) + "/" + d.getFullYear());

    },
    calculatorPrice: function(){
        if(!this.package) return;

        if($(this.form).find('#action').val() == 'up_top'){
            this.amount = this.package.price_up;
            //this.amount = 0;
            //return;
        }

        if(this.package_type == 'day'){
            this.amount = this.total_time*this.package.price;
            this.total_day = this.total_time;
        }
        if(this.package_type == 'week'){
            this.amount = this.total_time*this.package.price_week;
            this.total_day = this.total_time * 7;
        }
        if(this.package_type == 'month'){
            this.amount = this.total_time*this.package.price_month;
            this.total_day = this.total_time * 30;
        }

        if(this.use_label > 0){
            this.amount += post_label_price * this.total_day;
        }

        this.renderHtmlPrice();
    },
    changeTotalDay:function(){
        var self = this;
        if(!self.package) return;

        if(self.package_type == 'day'){
            self.total_time = $(self.form).find('select[name="total_day"]').length ? $(self.form).find('select[name="total_day"]').val() : 3;
            if(self.total_time < self.package.minday){
                self.total_time = self.package.minday;
            }
            if(self.package.minday > 3){
                $('select[name="total_day"] option[value="3"]').attr("disabled", true);
                $('select[name="total_day"] option[value="4"]').attr("disabled", true);
            }else{
                $('select[name="total_day"] option[value="3"]').removeAttr("disabled");
                $('select[name="total_day"] option[value="4"]').removeAttr("disabled");
            }
            $(self.form).find('select[name="total_day"]').val(self.package.minday).trigger('change');
        }
        if(self.package_type == 'week'){
            self.total_time = $(self.form).find('select[name="total_week"]').length ? $(self.form).find('select[name="total_week"]').val() : 1;
        }
        if(self.package_type == 'month'){
            self.total_time = $(self.form).find('select[name="total_month"]').length ? $(self.form).find('select[name="total_month"]').val() : 1;
        }
        $(self.form).find('select[name="total_day"]').on('change', function(){
            self.total_time = $(this).val();
            self.calculatorPrice();
        });
        $(self.form).find('select[name="total_week"]').on('change', function(){
            self.total_time = $(this).val();
            self.calculatorPrice();
        });
        $(self.form).find('select[name="total_month"]').on('change', function(){
            self.total_time = $(this).val();
            self.calculatorPrice();
        });
    },
    changePackageTime: function(){
        var self = this;
        $(self.form).find('select[name="package_type"]').on('change', function(){
            self.package_type = $(this).val();

            $('.js-package-type').addClass('hidden');
            $('.js-package-type-'+self.package_type).removeClass('hidden');

            self.changeTotalDay();
            self.calculatorPrice();
        });
    },
    changePackage: function(){
        var self = this;
        $(self.form).find('select[name="package"]').on('change', function(){
            self.package = self.findPackageById($(this).val());

            if(self.package.price == 0){
                $('.js-group-type-date').addClass('hidden');
                $('.js-group-package-type').addClass('hidden');
                $('.js-group-type-label').addClass('hidden');
            }else{
                $('.js-group-type-date').removeClass('hidden');
                $('.js-group-package-type').removeClass('hidden');
                $('.js-group-type-label').removeClass('hidden');
            }

            self.changeTotalDay();
            self.calculatorPrice();
        });
    },
    changePaymentMethod:function(){
        var self = this;
        $(self.form).find('input[name="payment_method"]').on('change', function(){
            self.payment_method = $(this).val();

            self.calculatorPrice();
        });
    },
    changePostLabel:function (){
        var self = this;
        $(self.form).find('input[name="post_label"]').on('change', function(){
            self.use_label = $(this).val() ? parseInt($(this).val()) : 0;

            if(self.use_label > 0){
                $(self.dl_package_use_label).removeClass('hidden');
            }else{
                $(self.dl_package_use_label).addClass('hidden');
            }

            self.calculatorPrice();
        });

        self.use_label = $(self.form).find('input[name="post_label"]:checked').val() ? parseInt($(self.form).find('input[name="post_label"]:checked').val()) : 0;
        if(self.use_label){
            self.calculatorPrice();
        }

    },
    upPost: function(){
        var self = this;
        $(self.form).on('submit', function(e){
            e.preventDefault();
            var action = $(this).find('#action').val();
            self.return_url = $(this).find('#return_url').val();

            if(action != 'up_top' || $(self.form).find('button[type="submit"]').hasClass('disabled')) return;

            console.log($(self.form).find('button[type="submit"]').hasClass('disabled'));

            var button_text = $(self.form).find('button[type="submit"]').html();
            $(self.form).find('button[type="submit"]').html('Đang xử lí...');
            $(self.form).find('button[type="submit"]').addClass('disabled');

            $.ajax({
                type: "POST",
                url: base_api_url + "/post/promote",
                data: {'post_id':self.post.id},
                success:function(response){
                    $(self.form).find('button[type="submit"]').html(button_text);
                }
            });
        });

    },
    hidePost: function(){
        var self = this;
        $(self.form).on('submit', function(e){
            e.preventDefault();
            var action = $(this).find('#action').val();
            self.return_url = $(this).find('#return_url').val();

            if(action != 'hidden_post') return;
            var button_text = $(self.form).find('button[type="submit"]').html();
            $(self.form).find('button[type="submit"]').html('Đang xử lí...');
            $(self.form).find('button[type="submit"]').prop('disabled', true);
            $(self.form).find('button[type="submit"]').addClass('disabled');

            $.ajax({
                type: "POST",
                url: base_api_url + "/post/hidden",
                data: {'post_id':self.post.id, 'reason':$(self.form).find('input[name="reason_hidden"]:checked').val()},
                success:function(response){
                    $(self.form).find('button[type="submit"]').html(button_text);
                }
            });
        });

        $('.js-choose-reason').on('click', function(e){
            $(self.form).find('button[type="submit"]').removeAttr('disabled').removeClass('disabled');
        });
    },
    deletePost: function(){
        var self = this;
        $(self.form).on('submit', function(e){
            e.preventDefault();
            var action = $(this).find('#action').val();
            self.return_url = $(this).find('#return_url').val();
            if(action != 'delete_post') return;

            var button_text = $(self.form).find('button[type="submit"]').html();
            $(self.form).find('button[type="submit"]').html('Đang xử lí...');
            $(self.form).find('button[type="submit"]').prop('disabled', true);
            $(self.form).find('button[type="submit"]').addClass('disabled');

            $.ajax({
                type: "POST",
                url: base_api_url + "/post/delete",
                data: {'post_id':self.post.id},
                success:function(response){
                    $(self.form).find('button[type="submit"]').html(button_text);
                }
            });
        });
    },
    rePost: function(){
        var self = this;
        $(self.form).on('submit', function(e){
            e.preventDefault();

            var action = $(this).find('#action').val();
            if(action != 're_new') return;

            if(self.payment_method == 'account' && self.amount > account_balance_number){
                Swal.fire('Lỗi', "Bạn không đủ tiền để đăng lại tin", 'error');
                $(self.form).find('button[type="submit"]').addClass('disabled');
                $(self.form).find('button[type="submit"]').prop('disabled', true);
                return;
            }

            if($(self.form).find('button[type="submit"]').hasClass('disabled')) return;

            self.return_url = $(this).find('#return_url').val();

            var button_text = $(self.form).find('button[type="submit"]').html();
            $(self.form).find('button[type="submit"]').html('Đang xử lí...');
            $(self.form).find('button[type="submit"]').prop('disabled', true);
            $(self.form).find('button[type="submit"]').addClass('disabled');

            var formData = new FormData($(self.form)[0]);
            formData.append('action', action);
            formData.append('package_id', self.package.id);
            formData.append('total_day_vip', self.total_time);
            formData.append('package_type', self.package_type);
            formData.append('label', self.use_label);
            formData.append('total_time', self.total_time);
            formData.append('payment_method', self.payment_method);

            $.ajax({
                type: "POST",
                url: base_api_url + "/post/recreate",
                // data: {action:action,
                // 	post_id:self.post.id,
                // 	package_id:self.package.id,
                // 	total_day_vip:self.total_time,
                //     package_type:self.package_type,
                //     label:self.use_label,
                //     total_time:self.total_time,
                //     payment_method:self.payment_method
                // },
                data:formData,
                processData: false,
                contentType: false,
                success:function(response){
                    $(self.form).find('button[type="submit"]').html(button_text);
                }
            });

        });
    },
    upgradePost: function(){
        var self = this;
        $(self.form).on('submit', function(e){
            e.preventDefault();

            var action = $(this).find('#action').val();
            if(action != 'upgrade') return;

            if(self.payment_method == 'account' && self.amount > account_balance_number){
                Swal.fire('Lỗi', "Bạn không đủ tiền để Gia hạn lại tin", 'error');
                $(self.form).find('button[type="submit"]').addClass('disabled');
                $(self.form).find('button[type="submit"]').prop('disabled', true);
                return;
            }

            if($(self.form).find('button[type="submit"]').hasClass('disabled')) return;

            self.return_url = $(this).find('#return_url').val();

            var button_text = $(self.form).find('button[type="submit"]').html();
            $(self.form).find('button[type="submit"]').html('Đang xử lí...');
            $(self.form).find('button[type="submit"]').prop('disabled', true);
            $(self.form).find('button[type="submit"]').addClass('disabled');

            $.ajax({
                type: "POST",
                url: base_api_url + "/post/upgrade",
                data: {action:action,
                    post_id:self.post.id,
                    package_id:self.package.id,
                    total_day_vip:self.total_time,
                    package_type:self.package_type,
                    label:self.use_label,
                    total_time:self.total_time,
                    payment_method:self.payment_method
                },
                success:function(response){
                    $(self.form).find('button[type="submit"]').html(button_text);
                }
            });

        });
    },
    rePostVip: function(){
        var self = this;

        $(self.form).on('submit', function(e){
            e.preventDefault();

            if(self.payment_method == 'account' && self.amount > account_balance_number){
                $(self.form).find('button[type="submit"]').addClass('disabled');
                $(self.form).find('button[type="submit"]').prop('disabled', true);
                return;
            }

            var action = $(this).find('#action').val();
            self.return_url = $(this).find('#return_url').val();
            if(action != 're_new_vip') return;
            var button_text = $(self.form).find('button[type="submit"]').html();
            $(self.form).find('button[type="submit"]').html('Đang xử lí...');


            if(self.is_request) return;
            self.is_request = true;

            $.ajax({
                type: "POST",
                url: base_api_url + "/post/extend",
                data: {action:action,
                    post_id:self.post.id,
                    package_id:self.package.id,
                    total_day_vip:self.total_time,
                    package_type:self.package_type,
                    label:self.use_label,
                    total_time:self.total_time,
                    payment_method:self.payment_method
                },
                success:function(response){
                    $(self.form).find('button[type="submit"]').html(button_text);
                    self.is_request = false;
                }
            });

        });
    },
    rePay: function(){
        var self = this;

        $(self.form).on('submit', function(e){
            e.preventDefault();

            if(self.payment_method == 'account' && self.amount > account_balance_number){
                $(self.form).find('button[type="submit"]').addClass('disabled');
                $(self.form).find('button[type="submit"]').prop('disabled', true);
                return;
            }

            var action = $(this).find('#action').val();
            self.return_url = $(this).find('#return_url').val();
            if(action != 're_pay') return;
            var button_text = $(self.form).find('button[type="submit"]').html();
            $(self.form).find('button[type="submit"]').html('Đang xử lí...');

            if(self.is_request) return;
            self.is_request = true;

            $.ajax({
                type: "POST",
                url: base_api_url + "/post/repay",
                data: {action:action,
                    post_id:self.post.id,
                    package_id:self.package.id,
                    total_day_vip:self.total_time,
                    package_type:self.package_type,
                    label:self.use_label,
                    total_time:self.total_time,
                    payment_method:self.payment_method
                },
                success:function(response){
                    $(self.form).find('button[type="submit"]').html(button_text);
                    self.is_request = false;
                }
            });

        });
    },
    switchPost: function(){
        var self = this;

        $(self.form).on('submit', function(e){
            e.preventDefault();

            var action = $(this).find('#action').val();
            var estate_switch_id = $(this).find('#estate_switch_id').val();
            self.return_url = $(this).find('#return_url').val();

            if(action != 'switch_post') return;
            $(self.form).find('button[type="submit"]').html('Đang xử lí...');

            $.ajax({
                type: "POST",
                url: base_api_url + "/post/switch",
                data: {action:action,
                    post_id:self.post.id,
                    estate_switch_id:estate_switch_id
                }
            });

        });
    },
    transferPost: function(){
        var self = this;

        $(self.form).on('submit', function(e){
            e.preventDefault();

            var action = $(this).find('#action').val();
            self.return_url = $(this).find('#return_url').val();

            if(action != 'transfer_post') return;
            $(self.form).find('button[type="submit"]').html('Đang xử lí...');

            $.ajax({
                type: "POST",
                url: base_api_url + "/post/transfer",
                data: {action:action,
                    post_id:self.post.id,
                }
            });

        });
    },
    addPostLabel: function(){
        var self = this;
        $(self.form).on('submit', function(e){
            e.preventDefault();
            var action = $(this).find('#action').val();
            if(action != 'add_label') return;

            var label = $(this).find('input[name="post_label"]:checked').val();
            self.return_url = $(this).find('#return_url').val();

            if(!label){
                toastr.error("Bạn chưa chọn nhãn", "Lỗi");
                return;
            }

            $(self.form).find('button[type="submit"]').html('Đang xử lí...');
            $.ajax({
                type: "POST",
                url: base_api_url + "/post/addlabel",
                data: {'post_id':self.post.id, 'label': label, payment_method:self.payment_method}
            });
        });
    },
    uploadImage: function(){
        if(typeof Dropzone === 'undefined') return;
        if($('.js-dropzone').length ==0) return;
        // INIT DROPZONE
        var self = this;
        var btn_submit = $(".js-form-submit-data").find('button[type="submit"]');
        var btn_chon_anh_text = $('.js-btn-chon-anh').html();
        var dropzoneOptions = {
            url: "https://static123.com/api/upload",
            previewsContainer:'.list_photos',
            previewTemplate: $('#tpl').length > 0 ? document.querySelector('#tpl').innerHTML : '',
            dictRemoveFileConfirmation:"Bạn chắc chắn muốn xóa hình ảnh này?"
        };

        var myDropzone = new Dropzone(".js-dropzone", dropzoneOptions);

        // Bind manual remove
        $('.js-photo-manual').each(function (index, element) {
            $(element).find('span[data-dz-remove]').on('click', function(event){
                var _self = $(this);
                if (myDropzone.options.dictRemoveFileConfirmation) {
                    return Dropzone.confirm(myDropzone.options.dictRemoveFileConfirmation, function() {
                        _self.closest('.js-photo-manual').remove();
                    });
                }else{
                    $(this).closest('.js-photo-manual').remove();
                }
            });
        });

        myDropzone.on('sending', function(file, xhr, formData){
            formData.append('source', 'phongtro123');
            formData.append('source_url', 'window.location.href');
            btn_submit.addClass('disabled');
            $('.js-btn-chon-anh').html('Đang đăng hình...');
        });

        myDropzone.on("success", function(file, response) {
            //
            self.images.push(file);
            var el_preview = $(file.previewElement);
            el_preview.append('<input type="hidden" name="image_linked['+response.id+']" value="'+response.image_path+'"/>');
        });

        myDropzone.on("complete", function(file) {
            btn_submit.removeClass('disabled');
            $('.js-btn-chon-anh').html(btn_chon_anh_text);
        });

        // $(".list_photos").sortable();
        var el = document.getElementById('list-photos-dropzone-previews');
        var sortable = Sortable.create(el);

    },
    init:function(){
        this.post = typeof current_post === 'undefined' ? {} :current_post;
        this.packages = typeof packages === 'undefined' ? [] : packages;

        if(typeof current_package !== 'undefined'){
            this.package = current_package;
        }else{
            var _package_id = $('.js-group-package select[name="package"]').val();
            var _package = this.findPackageById(_package_id);
            this.package = _package ? _package : this.packages[0];
        }
        if(this.package){
            if(this.package.price == 0){
                $('.js-group-type-date').addClass('hidden');
                $('.js-group-package-type').addClass('hidden');
                $('.js-group-type-label').addClass('hidden');
                $('.js-group-type-label').find('input[name="post_label"]').val(0);
            }else{
                $('.js-group-type-date').removeClass('hidden');
                $('.js-group-package-type').removeClass('hidden');
                $('.js-group-type-label').removeClass('hidden');
            }
        }

        this.payment_method = $(this.form).find('input[name="payment_method"]').val();

        this.changePaymentMethod();
        this.changePackage();
        this.changePackageTime();
        this.changePostLabel();
        this.changeTotalDay();
        this.calculatorPrice();

        this.hidePost();
        this.deletePost();
        this.upPost();
        this.rePost();
        this.rePay();
        this.upgradePost();
        this.rePostVip();
        this.transferPost();
        this.uploadImage();
    },
};

$(document).ready(function () {
    manage_post.init();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
            "Authorization": 'Bearer ' + localStorage.getItem('access_token')
        }
    });

    $(document).ajaxComplete(function (event, xhr, settings) {

        if (!xhr.responseText) return;
        var response = $.parseJSON(xhr.responseText);

        if (response.code != 200) {
            if (response.code == 500) {
                //toastr.error(response.message, "Lỗi");
                Swal.fire('Lỗi', response.message, 'error');
                return;
            }
        }

        if(response.error){
            //toastr.error(response.message, "Lỗi");
            Swal.fire('Lỗi', response.message, 'error');
            $(manage_post.form).find('button[type="submit"]').removeAttr('disabled');
            $(manage_post.form).find('button[type="submit"]').removeClass('disabled');
        }
        if(!response.error){
            if(response.action != 'redirect'){
                if(response.message){
                    //toastr.success(response.message, "Thông báo");
                    Swal.fire('Thông báo', response.message, 'success');
                }
                setTimeout(function(){
                    if(manage_post.return_url){
                        window.location.href = manage_post.return_url;
                    }
                }, 2000);
            }
        }
    });
});
