$(document).ready(function () {
    $('select[name="guide"]').prop("disabled", true);
    $('select[name="vehical"]').prop("disabled", true);
    $('select[name="hotel"]').prop("disabled", true);
});

function getGuide(language) {
    var language_id = $(language).val();
    getGuideForLanguage(language_id);
}

function getGuideForLanguage(language_id) {
    $.ajax({
        type: "POST",
        url: "/get-guide-for-language",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            _token: token,
            language_id: language_id,
        },
        success: function (response) {
            if (response.success == true) {
                setGuide(response.data);
            }
        },
    });
}

function setGuide(guide_details) {
    console.log(guide_details);
    if (guide_details.length > 0) {
        $('select[name="guide"]').prop("disabled", false);
        ajaxTempMsg("success", "Guide is available !");
    } else {
        $('select[name="guide"]').prop("disabled", true);
        ajaxTempMsg("error", "Guide not available !");
    }
    var html = '<option value="">No Select</option>';
    $.each(guide_details, function (index, element) {
        html +=
            '<option value="' +
            element.id +
            '">' +
            element.full_name +
            "</option>";
    });
    $('select[name="guide"]').html(html);
}

function getVehical(vehical_type) {
    var type_id = $(vehical_type).val();
    getVehicalForType(type_id);
}

function getVehicalForType(type_id) {
    $.ajax({
        type: "POST",
        url: "/get-vehical-for-type",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            _token: token,
            type_id: type_id,
        },
        success: function (response) {
            if (response.success == true) {
                setVehical(response.data);
            }
        },
    });
}

function setVehical(vehical_details) {
    if (vehical_details.length > 0) {
        ajaxTempMsg("success", "Vehical is available !");
        $('select[name="vehical"]').prop("disabled", false);
    } else {
        ajaxTempMsg("error", "Vehical not available !");
        $('select[name="vehical"]').prop("disabled", true);
    }

    var html = '<option value="">No Select</option>';
    $.each(vehical_details, function (index, element) {
        html +=
            '<option value="' +
            element.id +
            '">' +
            element.vehical_model +
            " - " +
            element.vehical_no +
            "</option>";
    });
    $('select[name="vehical"]').html(html);
}
