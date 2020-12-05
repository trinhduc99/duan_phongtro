$(document).ready(function () {
    $('.js-example-basic-single').select2();
    $('#province').change(function () {
        let province_id = $("#province option:selected").val();
        if (province_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "get-districts-by-provinces/" + province_id,
            }).done(function (res) {
                if (res) {
                    $("#district").empty()
                        .append('<option value="">Chọn quận huyện</option>');
                    $("#ward").empty()
                        .append('<option value="">Chọn phường xã</option>');
                    $("#street").empty()
                        .append('<option value="">Chọn đường phố</option>');
                    $.each(res, function (key, value) {
                        $("#district").append('<option value="' + value.id + '">' + value._name + '</option>');
                    });
                }
            })
        }
    });
    $('#district').change(function () {
        let district_id = $("#district option:selected").val();
        let province_id = $("#province option:selected").val();
        if (district_id && province_id)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "get-wards-by-districts/" + district_id + "/" + province_id,
            }).done(function (res) {
                if (res) {
                    $("#ward").empty()
                        .append('<option value="">Chọn phường xã</option>');
                    $("#street").empty()
                        .append('<option value="">Chọn đường phố</option>');

                    $.each(res[0], function (key, value) {
                        $("#ward").append('<option value="' + value.id + '">' + value._name + '</option>');
                    });
                    $.each(res[1], function (key, value) {
                        $("#street").append('<option value="' + value.id + '">' + value._name + '</option>');
                    });
                    $.each(res[2], function (key, value) {
                        $("#project").append('<option value="' + value.id + '">' + value._name + '</option>');
                    });
                }
            });

    })
    $('#acc_new_type').change(function () {
        let acc_new_type_text = $("#acc_new_type option:selected").text();
        if (acc_new_type_text) {
            $(".js-time-type").empty()
                .append(acc_new_type_text);
        }
        let acc_new_type_id = $("#acc_new_type option:selected").val();
        if (acc_new_type_id === 'day') {
            if ($("div.js-package-type-day").hasClass("hidden")) {
                $('div.js-package-type-day').removeClass("hidden");
            }
            if (!$("select#js-package-type-day2").hasClass("js-package-type-2")) {
                $('select#js-package-type-day2').addClass("js-package-type-2");
            }



            if (!$("div.js-package-type-week").hasClass("hidden")) {
                $('div.js-package-type-week').addClass("hidden");
            }
            if ($("select#js-package-type-week2").hasClass("js-package-type-2")) {
                $('select#js-package-type-week2').removeClass("js-package-type-2");
            }


            if (!$("div.js-package-type-month").hasClass("hidden")) {
                $('div.js-package-type-month').addClass("hidden");
            }
            if ($("select#js-package-type-month2").hasClass("js-package-type-2")) {
                $('select#js-package-type-month2').removeClass("js-package-type-2");
            }


        } else if (acc_new_type_id === 'week') {
            if ($("div.js-package-type-week").hasClass("hidden")) {
                $('div.js-package-type-week').removeClass("hidden");
            }
            if (!$("select#js-package-type-week2").hasClass("js-package-type-2")) {
                $('select#js-package-type-week2').addClass("js-package-type-2");
            }

            if (!$("div.js-package-type-day").hasClass("hidden")) {
                $('div.js-package-type-day').addClass("hidden");
            }
            if ($("select#js-package-type-day2").hasClass("js-package-type-2")) {
                $('select#js-package-type-day2').removeClass("js-package-type-2");
            }

            if (!$("div.js-package-type-month").hasClass("hidden")) {
                $('div.js-package-type-month').addClass("hidden");
            }
            if ($("select#js-package-type-month2").hasClass("js-package-type-2")) {
                $('select#js-package-type-month2').removeClass("js-package-type-2");
            }

        } else {
            if ($("div.js-package-type-month").hasClass("hidden")) {
                $('div.js-package-type-month').removeClass("hidden");
            }
            if (!$("select#js-package-type-month2").hasClass("js-package-type-2")) {
                $('select#js-package-type-month2').addClass("js-package-type-2");
            }

            if (!$("div.js-package-type-day").hasClass("hidden")) {
                $('div.js-package-type-day').addClass("hidden");
            }
            if ($("select#js-package-type-day2").hasClass("js-package-type-2")) {
                $('select#js-package-type-day2').removeClass("js-package-type-2");
            }

            if (!$("div.js-package-type-week").hasClass("hidden")) {
                $('div.js-package-type-week').addClass("hidden");
            }
            if ($("select#js-package-type-week2").hasClass("js-package-type-2")) {
                $('select#js-package-type-week2').removeClass("js-package-type-2");
            }
        }

    });
    $('.js-package-type-2').click(function (event) {
        event.stopPropagation();
        event.stopImmediatePropagation();
        let acc_new_type_time = $("#acc_new_type option:selected").val();
        let acc_new = $("#acc_new option:selected").val();
        let acc_new_number = $(".js-package-type-2 option:selected").val();
        if (acc_new && acc_new_number && acc_new_type_time) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "get-acc-new/" + acc_new + '/' + acc_new_type_time + '/' + acc_new_number,
            }).done(function (res) {
                if (res) {
                    console.log(res)
                }
            })
        }
    });

    $('#acc_new').change(function () {
        let acc_new_text = $("#acc_new option:selected").text();
        if (acc_new_text) {
            $(".js-package-title").empty()
                .append(acc_new_text);
        }

    })
})
let mangso = ['không', 'một', 'hai', 'ba', 'bốn', 'năm', 'sáu', 'bảy', 'tám', 'chín'];

function dochangchuc(so, daydu) {
    var chuoi = "";
    chuc = Math.floor(so / 10);
    donvi = so % 10;
    if (chuc > 1) {
        chuoi = " " + mangso[chuc] + " mươi";
        if (donvi == 1) {
            chuoi += " mốt";
        }
    } else if (chuc == 1) {
        chuoi = " mười";
        if (donvi == 1) {
            chuoi += " một";
        }
    } else if (daydu && donvi > 0) {
        chuoi = " lẻ";
    }
    if (donvi == 5 && chuc >= 1) {
        chuoi += " lăm";
    } else if (donvi > 1 || (donvi == 1 && chuc == 0)) {
        chuoi += " " + mangso[donvi];
    }
    return chuoi;
}

function docblock(so, daydu) {
    var chuoi = "";
    tram = Math.floor(so / 100);
    so = so % 100;
    if (daydu || tram > 0) {
        chuoi = " " + mangso[tram] + " trăm";
        chuoi += dochangchuc(so, true);
    } else {
        chuoi = dochangchuc(so, false);
    }
    return chuoi;
}

function dochangtrieu(so, daydu) {
    var chuoi = "";
    trieu = Math.floor(so / 1000000);
    so = so % 1000000;
    if (trieu > 0) {
        chuoi = docblock(trieu, daydu) + " triệu";
        daydu = true;
    }
    nghin = Math.floor(so / 1000);
    so = so % 1000;
    if (nghin > 0) {
        chuoi += docblock(nghin, daydu) + " nghìn";
        daydu = true;
    }
    if (so > 0) {
        chuoi += docblock(so, daydu);
    }
    return chuoi;
}

function docso(so) {
    if (so == 0) return mangso[0];
    var chuoi = "",
        hauto = "";
    do {
        ty = so % 1000000000;
        so = Math.floor(so / 1000000000);
        if (so > 0) {
            chuoi = dochangtrieu(ty, true) + hauto + chuoi;
        } else {
            chuoi = dochangtrieu(ty, false) + hauto + chuoi;
        }
        hauto = " tỷ";
    } while (so > 0);
    return chuoi;
}

console.log(docso(1234595340))
let uploadedDocumentMap = {}
Dropzone.options.dropzone = {
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'POST',
    url: 'dang-tin-moi/store',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    success: function (file, response) {
        $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
        file.previewElement.remove()
        let name = ''
        if (typeof file.file_name !== 'undefined') {
            name = file.file_name
        } else {
            name = uploadedDocumentMap[file.name]
        }
        $('form').find('input[name="image[]"][value="' + name + '"]').remove()
    },
}



