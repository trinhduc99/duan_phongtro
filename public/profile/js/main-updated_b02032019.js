var mangso = ['không','một','hai','ba','bốn','năm','sáu','bảy','tám','chín'];
function dochangchuc(so,daydu){
    var chuoi = "";
    chuc = Math.floor(so/10);
    donvi = so%10;
    if (chuc>1) {
        chuoi = " " + mangso[chuc] + " mươi";
        if (donvi==1) {
            chuoi += " mốt";
        }
    } else if (chuc==1) {
        chuoi = " mười";
        if (donvi==1) {
            chuoi += " một";
        }
    } else if (daydu && donvi>0) {
        chuoi = " lẻ";
    }
    if (donvi==5 && chuc>=1) {
        chuoi += " lăm";
    } else if (donvi>1||(donvi==1&&chuc==0)) {
        chuoi += " " + mangso[ donvi ];
    }
    return chuoi;
}

function docblock(so,daydu){
    var chuoi = "";
    tram = Math.floor(so/100);
    so = so%100;
    if (daydu || tram>0) {
        chuoi = " " + mangso[tram] + " trăm";
        chuoi += dochangchuc(so,true);
    } else {
        chuoi = dochangchuc(so,false);
    }
    return chuoi;
}

function dochangtrieu(so,daydu){
    var chuoi = "";
    trieu = Math.floor(so/1000000);
    so = so%1000000;
    if (trieu>0) {
        chuoi = docblock(trieu,daydu) + " triệu";
        daydu = true;
    }
    nghin = Math.floor(so/1000);
    so = so%1000;
    if (nghin>0) {
        chuoi += docblock(nghin,daydu) + " nghìn";
        daydu = true;
    }
    if (so>0) {
        chuoi += docblock(so,daydu);
    }
    return chuoi;
}

function docso(so){
    if (so==0) return mangso[0];
    var chuoi = "", hauto = "";
    do {
        ty = so%1000000000;
        so = Math.floor(so/1000000000);
        if (so>0) {
            chuoi = dochangtrieu(ty,true) + hauto + chuoi;
        } else {
            chuoi = dochangtrieu(ty,false) + hauto + chuoi;
        }
        hauto = " tỷ";
    } while (so>0);
    return chuoi;
}

function validatePhone(phone){
    var phoneRe = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    return phoneRe.test(phone);
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

Number.prototype.formatDot = function(n, x){
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
	return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.');
};

/* jshint expr: true */
(function($){
    $.fn.extend({
        donetyping: function(callback,timeout){
            timeout = timeout || 300;
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                if($el.is(':input')){
                    $el.on('keyup keypress',function(e){
                        if (e.type=='keyup' && e.keyCode!=8) return;
    
                        if (timeoutReference) clearTimeout(timeoutReference);
                        timeoutReference = setTimeout(function(){
                            doneTyping(el);
                        }, timeout);
                    }).on('blur',function(){
                        doneTyping(el);
                    });
                }
                
            });
        }
    });
})(jQuery);

Date.prototype.addDays = function(days) {
    var dat = new Date(this.valueOf());
    dat.setDate(dat.getDate() + days);
    return dat;
};

var main_app = main_app || {};

main_app = {
    jBody: $(document.body),
    is_requesting:false,
    current_loai_tin: 0,
    positionFixed: function() {
        var bodywidth = 1000;
        var widthleft = $('#fixed_Left').width();
        var widthright = $('#fixed_Right').width();
        var xright = (($(document).width() - bodywidth) / 2) + bodywidth;
        var xleft = (($(document).width() - bodywidth) / 2) - widthleft;
        if ($(document.body).width() < bodywidth + widthleft + widthright) {
            $('.banner_fixed').css('display', 'none');
            return;
        } else {
            $('.banner_fixed').css('display', 'block');
        }

        xleft = (($(document.body).width() - 0 - bodywidth) / 2) - widthleft - 15;

        $('#fixed_Left').css({ left: xleft + 'px' });

        $('#fixed_Right').css({ right: xleft + 'px' });
    },
    facebookChatbox: function(){

        if(localStorage.getItem("fbchatclose") == 1){
            jQuery('.fb-page').toggleClass('hide');
            jQuery('#closefbchat').html('<i class="fa fa-comments fa-2x"></i> Chat Tư Vấn').css({'bottom':0});
        }
        jQuery('#closefbchat').click(function(){
            jQuery('.fb-page').toggleClass('hide');
            if(jQuery('.fb-page').hasClass('hide')){
                localStorage.setItem("fbchatclose", 1);
                jQuery('#closefbchat').html('<i class="fa fa-comments fa-2x"></i> Chat Tư Vấn').css({'bottom':0});
            }
            else{
                localStorage.setItem("fbchatclose", 0);
                jQuery('#closefbchat').text('Tắt Chat').css({'bottom':299});
            }
        });
    },
    layout: function(){
        var self = this;

        $('.js_show_fb_messegner').click(function(){
            $('.facebook_messenger_support').toggleClass('show');
        });
        
        $(window).resize(function () {
            self.positionFixed();
        });
        self.positionFixed();
        
        if($("#sidebar .payment_info").length){
            $("#sidebar .payment_info").sticky({ topSpacing: 60, bottomSpacing: 600, zIndex: 9999 });
        }
        
        if($('.js_sticky_ad').length>0) {
            $(".js_sticky_ad").sticky({ topSpacing: 40, bottomSpacing: $('body').height()-$('.whyus').offset().top+200, zIndex: 4 });
        }
        if($('.js_sticky_ad_single_post').length>0) {
            $(".js_sticky_ad_single_post").sticky({ topSpacing: 80, bottomSpacing: $('body').height()-$('.whyus').offset().top+200, zIndex: 4 });
        }

        $('.number').donetyping(function(){

            $('.js-btn-group-price').find('label').removeClass('active');
            $('.js-btn-group-price').find('input[type="radio"]').prop("checked");
                
            var current_price = $(this).val().replace(/,/g,'');
            var number_text = docso(current_price) + ' đồng';
            
            $('.js-number-text').html(number_text);
        });

        $('.js-btn-group-price input[type="radio"]').change(function(){
            var number = $(this).val();
            $('.number').val(number);
            var number_text = docso(number) + ' đồng';
            
            $('.js-number-text').html(number_text);

            $('.number').each(function(){
                var cleave = new Cleave($(this), {
                    
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                });
            });
        });

        if($('#flexslider_slider').length){
            $('#flexslider_slider').flexslider({
                animation: "slide",
                controlNav: true,
                animationLoop: false,
                slideshow: false,
                touch: true
            });
        }
        
        $(".js_select2_room_type").select2({
            minimumResultsForSearch: Infinity
        });

        $(".js_select2_price").select2({
            minimumResultsForSearch: Infinity
        });
        
        $(".js_select2_acreage").select2({
            minimumResultsForSearch: Infinity
        });
        
        $(".js_select2_duongpho").select2();

        var nav = $('.navbar');
        var pos = nav.length>0 ? nav.offset().top : 0;

        var navbar_post = $('.navigation_post');
        if(navbar_post.offset()){
            var pos_navbar_post = navbar_post.offset().top;
        }

        var project_jump = $('.project_jump');
        if(project_jump.offset()){
            var pos_project_jump = project_jump.offset().top;
        }

        var ad_fixed = $('.ad_fixed'), top_ad_fixed = 0;
        if(ad_fixed.offset()){
            top_ad_fixed = ad_fixed.offset().top;
        }else{
            top_ad_fixed = 400;
        }

        if($('.floatAd').offset()) {
            var floatad_pos = $('.floatAd').offset().top;
        }

        $(window).scroll(function () {
            var fix = ($(this).scrollTop() > pos) ? true : false;
            nav.toggleClass("fix-nav", fix);
            $('body').toggleClass("fix-body", fix);

            var fix_navbar_post = ($(this).scrollTop() > (pos_navbar_post-40)) ? true : false;
            navbar_post.toggleClass("fix_navbar_post", fix_navbar_post);

            var fix_project_jump = ($(this).scrollTop() > (pos_project_jump-40)) ? true : false;
            project_jump.toggleClass("fix_project_jump", fix_project_jump);

            var scroll = $(window).scrollTop();

            if(scroll - top_ad_fixed < 0) {
                $('.ad_fixed').addClass('fixed');
            }

            if(scroll >= (floatad_pos-40)) {
                $('.floatAd').addClass('fixed');
            } else {
                $('.floatAd').removeClass('fixed');
            }

        });

        $('.btn_nav_menu').click(function(e){
            e.preventDefault();
            $('.navbar').toggleClass('menu_mobile_active');
        }).delay(100);
        
        $('.button_close_menu').click(function(){
            $('.navbar').removeClass('menu_mobile_active');
        });

        $(".btn_nav_search, .search_btn_mobile_navbar").click(function() {
            $('html, body').animate({
                scrollTop: ($(".search_box_mobile").offset().top-60)
            }, 300);
        });

        $(".scrollto_thongtinchung").click(function() {
            $('html, body').animate({
                scrollTop: ($("#post_summary_wrapper").offset().top-100)
            }, 300);
        });

        $(".scrollto_motachitiet").click(function() {
            $('html, body').animate({
                scrollTop: ($("#motachitiet").offset().top-90)
            }, 300);
        });

        $(".scrollto_hinhanh").click(function() {
            $('html, body').animate({
                scrollTop: ($("#hinhanh").offset().top-100)
            }, 300);
        });

        $(".scrollto_bando").click(function() {
            $('html, body').animate({
                scrollTop: ($("#bando").offset().top-90)
            }, 300);
        });
        $(".scrollto_video").click(function() {
            $('html, body').animate({
                scrollTop: ($("#video").offset().top-90)
            }, 300);
        });

        $('#giachothue').keypress(function(event) {
            if(event.which == 45 || event.which == 189){
                event.preventDefault();
            }
        });

        $('#dientich').keypress(function(event) {
            if (event.which == 45 || event.which == 189){
                event.preventDefault();
            }
        });

        $(window).scroll(function(){
            if ($(this).scrollTop() > 400) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });
    
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},500);
            return false;
        });

        $("#jump_to_tonquan_duan").click(function() {
            $('html, body').animate({
                scrollTop: $("#block_tongquan_duan").offset().top-130
            }, 500);
        });
    
        $("#jump_to_vitri_duan").click(function() {
            $('html, body').animate({
                scrollTop: $("#block_vitri_duan").offset().top-120
            }, 500);
        });

        $("#jump_to_hinhanh_duan").click(function() {
            $('html, body').animate({
                scrollTop: $("#block_hinhanh_duan").offset().top-120
            }, 500);
        });

        $("#jump_to_tindang_duan").click(function() {
            $('html, body').animate({
                scrollTop: $("#block_tindang_duan").offset().top-120
            }, 500);
        });
    },
    showMobileNumber: function(){
		$('.js-get-phone').on('click', function(event){
			event.preventDefault();

			var phone_number = $(this).attr('data-phone');
			$(this).find('span').html(phone_number);
			$(this).attr('href', 'tel:'+phone_number);
		});
    },
    addSocialButton: function(){
		$('.js-social-group-button').each(function(index, el){
			var jEl = $(el);

			var data_url = jEl.attr('data-url');

			var html='<div class="google-like" style="display: inline-block; float: left; margin-right: 5px;">'+
					'<!-- Place this tag in your head or just before your close body tag. -->'+
					'<script src="https://apis.google.com/js/platform.js" async defer>'+
					'{lang: "vi"}'+
					'</script>'+
					'<!-- Place this tag where you want the +1 button to render. -->'+
					'<div class="g-plusone" data-annotation="inline" data-size="standard" data-href="'+data_url+'"></div>'+
				'</div>'+
				'<a target="blank" class="fb_btn fb_send_btn clearfix show_desktop" href="http://www.facebook.com/dialog/send?app_id=1748349635396853&amp;link='+data_url+'&amp;redirect_uri=https://bds123.vn/"><i></i><span>Gửi Messenger</span></a>'+
				'<a target="blank" class="fb_btn fb_send_btn clearfix show_mobile" href="fb-messenger://share?link='+data_url+'&app_id=1748349635396853"><i></i></a>'+
				'<div class="fb_btn fb-like" data-href="'+data_url+'" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>'+
				'<div class="show_desktop"><div class="fb_btn fb-save" data-uri="'+data_url+'" data-size="large"></div></div>';
			
			jEl.prepend(html);
		});
    },
    init: function(){
        var self = this;
        this.layout();
        this.facebookChatbox();
        setTimeout(function(){
            self.addSocialButton();
            if(typeof FB !== 'undefined'){
                FB.XFBML.parse(); 		
            }
        }, 2000);
    }
};

jQuery(document).ready(function($) {
    main_app.init();
});