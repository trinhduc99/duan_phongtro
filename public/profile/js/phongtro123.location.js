let location_app = location_app || {};
location_app = {
	body: $(document.body),
    Window: $(window),
    current_district_id:0,
    current_ward_id:0,
    current_street_id:0,
    is_requesting: false,
    getDistricts: function (province_id, current_district_id) {
		let self = this;
		self.current_district_id = current_district_id || 0;
		if (province_id == 0 || province_id == '') return;

		if (self.is_requesting) return;
		self.is_requesting = true;

		$.ajax({
			type: "POST",
			url: base_api_url + '/get/districts',
			data: {
				'province': province_id
			},
			dataType: 'json',
			success: function (response) {
				self.is_requesting = false;
				if (response.code == 200) {

					$('.js-select-duong').empty();
					$(".js-select-duong").select2({
						'data': [{
							id: "0",
							text: "-- Đường/Phố --"
						}],
					});

                    $('.js-select-phuongxa').empty();
					$(".js-select-phuongxa").select2({
						'data': [{
							id: "0",
							text: "-- Phường/Xã --"
						}],
					});

                    $('.js-select-quanhuyen').empty();
                    let results = $.map(response.districts, function (_district) {
                        return {
                            'id': _district.id,
                            'text': _district.name
                        };
                    });
					results.unshift({
						id: "0",
						text: "-- Quận/huyện -- "
                    });

					$(".js-select-quanhuyen").select2({
                        'data': results,
                        placeholder: "Chọn quận huyện"
                    });

					if (self.current_district_id) {
						$(".js-select-quanhuyen").val(self.current_district_id).trigger('change');
					}
				}
			},
			error: function (response) {
				self.is_requesting = false;
			}
		});
    },
    getWards: function (district_id, current_ward_id) {
		let self = this;
		self.current_ward_id = current_ward_id || 0;
		if (district_id == 0 || district_id == '') return;
        if($('.js-select-phuongxa').length <= 0) return;

		$.ajax({
			type: "POST",
			url: base_api_url + '/get/wards',
			data: {
				'district': district_id
			},
			dataType: 'json',
			success: function (response) {
				self.is_requesting = false;
				if (response.code == 200) {
                    $('.js-select-phuongxa').empty();
                    let results = $.map(response.wards, function (_ward) {
                        return {
                            'id': _ward.id,
                            'text': _ward.name
                        };
                    });

					results.unshift({
						id: "0",
						text: "Chọn phường xã"
                    });

					$(".js-select-phuongxa").select2({
                        'data': results,
                        placeholder: "Chọn phường xã"
					});

					if (self.current_ward_id) {
						$(".js-select-phuongxa").val(self.current_ward_id).trigger('change');
					}
				}
			},
			error: function (response) {
				self.is_requesting = false;
			}
		});
	},
	getStreets: function (district_id, current_street_id) {
		let self = this;
		if (district_id == 0 || district_id == '') return;
		self.current_street_id = current_street_id || 0;
        if($('.js-select-duong').length <= 0) return;

		$.ajax({
			type: "POST",
			url: base_api_url+'/get/streets',
			data: {
				'district': district_id
			},
			dataType: 'json',
			success: function (response) {

				if (response.code == 200) {
                    $('.js-select-duong').empty();
                    let results = $.map(response.streets, function (_street) {
                        return {
                            'id': _street.id,
                            'text': _street.name
                        };
                    });

					results.unshift({
						id: "0",
						text: "Chọn đường phố"
					});
					$(".js-select-duong").select2({
                        'data': results,
                        placeholder: "Chọn đường phố"
					});

					if (self.current_street_id) {
						$(".js-select-duong").val(self.current_street_id).trigger('change');
					}
				}
			},
			error: function (response) {
				self.is_requesting = false;
			}
		});
	},
    layoutFront: function () {
        let self = this;
		$('.js-select-tinhthanhpho').select2().on("change", function (e) {
            // sau khi chọn tỉnh thành thì tiến hành load quận huyện
            let province_id = $(this).val();
            self.getDistricts(province_id, self.current_district_id);
        });

        $('.js-select-quanhuyen').select2().on("change", function (e) {
            // sau khi chọn tỉnh thành thì tiến hành load quận huyện
            let district_id = $(this).val();

            if(district_id){
                self.getWards(district_id, self.current_street_id);
                self.getStreets(district_id, self.current_street_id);
            }
		});

		$('.js-select-duong').select2({});
		$('.js-select-phuongxa').select2({});
    },
    init: function () {
		this.layoutFront();
	}
};

jQuery(document).ready(function($) {
	location_app.init();
});
