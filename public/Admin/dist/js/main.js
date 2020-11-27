$(document).ready(function () {
    $('#province, #district, #ward, #street,#street_number').change(function () {
        changeAddress();
    });

    function changeAddress() {
        let duong = "";
        if ($("#street").val() !== "" && $("#street").val() !== 0) {
            duong = $("#street option:selected").text() + ", ";
        }
        let sonha = "";
        if ($("#street_number").val() !== "" && $("#street_number").val() !== 0) {
            sonha = $("#street_number").val() + ", ";
            console.log(sonha)
        }
        let quan = "";
        if ($("#district").val() !== "" && $("#district").val() !== 0) {
            quan = $("#district option:selected").text() + ", ";
        }

        let tinhthanhpho = "";
        if ($("#province").val() !== "" && $("#province").val() !== 0) {
            tinhthanhpho = $("#province option:selected").text();
        }

        let phuongxa = "";
        if ($("#ward").val() !== "" && $("#ward").val() !== 0) {
            phuongxa = $("#ward option:selected").text() + ", ";
        }

        if ($("#acc_address").length) {
            $('#acc_address').val(sonha + duong + phuongxa + quan + tinhthanhpho);
            $("#acc_address").focus();
            $("#acc_address").get(0).setSelectionRange(0, 0);
        }

    }
})
