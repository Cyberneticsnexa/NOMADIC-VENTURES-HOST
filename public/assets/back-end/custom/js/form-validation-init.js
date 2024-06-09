$(document).ready(function () {
    createSiteSettingsValidation();
    createUserValidation();
    updateUserValidation();
    createBasis();
    updateBasisValidation();
    createRoomCategory();
    validationEditRoomCatogory();
    createRoomType();
    updateRoomType();
    createDriver();
    updateCountry();
    createAgent();
    updateVehicale();
    updateGuide();

    createVehicalType();
    createVehical();
    createHotelCity();
    createHotel();
    createCountry();
    createGuideLanguage();
    updateDriver();
    registerGuide();
    updateHotels();
    editUserRoll();
    editTour();
    createTour();
    createHotelReservation();
});

function loader() {
    $("#loader").show();
    $("#overlay").show();
}
function removeLoader() {
    $("#loader").hide();
    $("#overlay").hide();
}

function createSiteSettingsValidation() {
    $("#site-settings-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            site_name: {
                required: true,
            },
            image: {
                required: true,
                image: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createUserValidation() {
    $("#create-user-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/user-email-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        email: function () {
                            return $("#email").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        console.log(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Email is already taken."';
                        }
                    },
                },
            },
            user_roll: {
                required: true,
                select2: true,
            },
            image: {
                required: true,
                image: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function updateUserValidation() {
    $("#edit-user-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/update-user-email-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        email: function () {
                            return $("#edit_email").val();
                        },
                        id: function () {
                            return $("#id").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Email is already taken."';
                        }
                    },
                },
            },
            user_roll: {
                required: true,
                select2: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createVehicalType() {
    $("#create-vehical-type-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            add_vehical_type: {
                required: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createVehical() {
    $("#create-vehical-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            add_vehical_model: {
                required: true,
            },
            add_vehical_no: {
                required: true,
                remote: {
                    url: "/vehicle-no-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        add_vehical_no: function () {
                            return $("#add_vehical_no").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        console.log(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Vehicle No is already taken."';
                        }
                    },
                },
            },
            vehical_type: {
                required: true,
                select2: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createDriver() {
    $("#create-driver-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (
                element.attr("name") === "licence_front" ||
                element.attr("name") === "licence_back"
            ) {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (element.attr("name") === "address") {
                error.insertAfter(element);
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else {
                element.closest("div.form-group").append(error);
            }
            if (element.attr("name") == "nic_no") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            }
        },
        rules: {
            full_name: {
                required: true,
            },
            short_name: {
                required: true,
            },
            nic_no: {
                required: true,
                remote: {
                    url: "/driver-nic-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        nic_no: function () {
                            return $("#nic_no").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        console.log(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Identity No is already taken."';
                        }
                    },
                },
            },
            contact_no: {
                required: true,
            },
            date_of_birth: {
                required: true,
            },
            licence_no: {
                required: true,
                remote: {
                    url: "/driver-licence-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        licence_no: function () {
                            return $("#licence_no").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        console.log(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Licence No is already taken."';
                        }
                    },
                },
            },
            user_roll: {
                required: true,
                select2: true,
            },
            date_of_birth: {
                required: true,
            },
            licence_front: {
                required: true,
                image: true,
            },
            licence_back: {
                required: true,
                image: true,
            },
            address: {
                required: true,
            },
        },
        messages: {
            nic_no: {
                required: "NIC number is required.",
                remote: "This NIC number is already taken.",
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createRoomType() {
    $("#create-room-type-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            add_room_type: {
                required: true,
            },
            add_short_code: {
                required: true,
                maxlength: 4,
                remote: {
                    url: "/room-category-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        short_code: function () {
                            return $("#add_short_code").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        console.log(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Short Code is already taken."';
                        }
                    },
                },
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createRoomCategory() {
    $("#create-room-category-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            add_room_category: {
                required: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createHotelCity() {
    $("#create-hotel-cities-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            add_hotel_cities: {
                required: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createHotel() {
    $("#add-hotel-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            hotel_name: {
                required: true,
                maxlength: 50,
            },
            rate: {
                required: true,
            },
            phone_one: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            room_category: {
                required: true,
            },
            room_type: {
                required: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createAgent() {
    $("#register-agent-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            add_name: {
                required: true,
                maxlength: 255,
            },
            add_email: {
                required: true,
                maxlength: 255,
                email: true,
            },
            add_contact_no: {
                required: true,
                maxlength: 25,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function updateAgent() {
    $("#edit-agent-register-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            edit_name: {
                required: true,
                maxlength: 255,
            },
            edit_email: {
                required: true,
                maxlength: 255,
                email: true,
            },
            edit_contact_no: {
                required: true,
            },
            is_active: {
                required: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//create country
function createCountry() {
    $("#create-country-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            add_country_name: {
                required: true,
                maxlength: 50,
            },
            add_country_code: {
                required: true,
                maxlength: 4,
                remote: {
                    url: "/country-code-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        code: function () {
                            return $("#add_country_code").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Code is already taken."';
                        }
                    },
                },
            },
            add_nationality: {
                required: true,
                maxlength: 50,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//create guide language validation
function createGuideLanguage() {
    $("#create-guide-language-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            add_language: {
                required: true,
                maxlength: 50,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//update driver

function updateDriver() {
    $("#update-driver-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            full_name: {
                required: true,
                maxlength: 255,
            },
            short_name: {
                required: true,
                maxlength: 100,
            },
            nic_no: {
                required: true,
                remote: {
                    url: "/update-driver-nic-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        nic_no: function () {
                            return $("#nic_no").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        console.log(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Identity No is already taken."';
                        }
                    },
                },
            },
            contact_no: {
                required: true,
            },
            date_of_birth: {
                required: true,
            },
            licence_no: {
                required: true,
                maxlength: 50,
            },
            address: {
                required: true,
            },
            is_active: {
                required: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//register guide validation
function registerGuide() {
    $("#register-guide-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            add_full_name: {
                required: true,
            },
            add_short_name: {
                required: true,
                maxlength: 100,
            },
            add_nic: {
                required: true,
                remote: {
                    url: "/guide-nic-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        add_nic: function () {
                            return $("#add_nic").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        console.log(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Identity No is already taken."';
                        }
                    },
                },
            },
            add_address: {
                required: true,
            },
            add_contact_no: {
                required: true,
            },
            "add_language[]": {
                required: true,
            },
        },
        messages: {
            add_nic: {
                required: "NIC number is required.",
                remote: "This NIC number is already taken.",
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//hotel update validation
function updateHotels() {
    $("#update-hotel-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            hotel_name: {
                required: true,
                maxlength: 255,
            },
            rate: {
                required: true,
                maxlength: 255,
            },
            phone_one: {
                required: true,
                maxlength: 10,
            },
            city: {
                required: true,
            },
            address: {
                required: true,
            },
            room_category: {
                required: true,
            },
            is_active: {
                required: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//create basis validation
function createBasis() {
    $("#create-basis-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            add_basis_title: {
                required: true,
                maxlength: 50,
            },
            add_basis_code: {
                required: true,
                maxlength: 4,
                remote: {
                    url: "/basis-code-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        basis_code: function () {
                            return $("#add_basis_code").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        console.log(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Code is already taken."';
                        }
                    },
                },
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function updateBasisValidation() {
    $("#edit-basis-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            edit_basis_title: {
                required: true,
            },
            edit_basis_code: {
                required: true,
                remote: {
                    url: "/update-basis-code-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        code: function () {
                            return $("#edit_basis_code").val();
                        },
                        id: function () {
                            return $("#id").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                },
            },
            is_active: {
                required: true,
                select2: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function updateCountry() {
    $("#edit-country-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            edit_country_name: {
                required: true,
                maxlength: 50,
            },
            edit_nationality: {
                required: true,
                maxlength: 50,
            },
            edit_country_code: {
                required: true,
                maxlength: 4,
                remote: {
                    url: "/update-country-code-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        code: function () {
                            return $("#edit_country_code").val();
                        },
                        id: function () {
                            return $("#id").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Code is already taken."';
                        }
                    },
                },
            },
            is_active: {
                required: true,
                select2: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function updateRoomType() {
    $("#edit-room-type-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            edit_room_type: {
                required: true,
            },
            edit_short_code: {
                required: true,
                maxlength: 4,
                remote: {
                    url: "/update-room-type-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        code: function () {
                            return $("#edit_short_code").val();
                        },
                        id: function () {
                            return $("#id").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Code is already taken."';
                        }
                    },
                },
            },
            is_active: {
                required: true,
                select2: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//edit user roll validation

function editUserRoll() {
    $("#update-user-roll").validate({
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            user_roll: {
                required: true,
                maxlength: 255,
            },
            is_active: {
                required: true,
            },
        },
        errorClass: "text-danger",
    });
}

//tour edit vakidation
function editTour() {
    $("#edit-tour-form").validate({
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            guest_name: {
                required: true,
                maxlength: 255,
            },
            country: {
                required: true,
            },
            no_of_visiter: {
                required: true,
            },
            arrivel_date: {
                required: true,
            },
            departure_date: {
                required: true,
            },
            agent: {
                required: true,
            },
            is_active: {
                required: true,
            },
        },
        errorClass: "text-danger",
    });
}

//create tour validation
function createTour() {
    $("#create-tour-form").validate({
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            guest_name: {
                required: true,
                maxlength: 255,
            },
            country: {
                required: true,
            },
            no_of_visiter: {
                required: true,
            },
            arrivel_date: {
                required: true,
            },
            departure_date: {
                required: true,
            },
            agent: {
                required: true,
            },
        },
        errorClass: "text-danger",
    });
}

//room catogory validation
function validationEditRoomCatogory() {
    $("#edit-room-category-form").validate({
        errorPlacement: function (error, element) {
            element.closest("div.form-group").append(error);
        },
        rules: {
            edit_room_category: {
                required: true,
                maxlength: 50,
            },
            is_active: {
                required: true,
            },
        },
        errorClass: "text-danger",
    });
}

//update vehicle
function updateVehicale() {
    $("#edit-vehical-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            edit_vehical_model: {
                required: true,
                maxlength: 255,
            },
            edit_vehical_type: {
                required: true,
                maxlength: 11,
            },
            edit_vehical_no: {
                required: true,
                maxlength: 20,
                remote: {
                    url: "/update-vehicle-no-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        code: function () {
                            return $("#edit-vehical-form").val();
                        },
                        id: function () {
                            return $("#id").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Vehicle No is already taken."';
                        }
                    },
                },
            },
            is_active: {
                required: true,
                select2: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

//update guide
function updateGuide() {
    $("#edit-guide-register-form").validate({
        ignore: [],
        errorClass: "text-danger custom",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "image") {
                error.insertAfter(element.closest(".row").find(".image_input"));
            } else if (
                element.hasClass("select2") &&
                element.next(".select2-container").length
            ) {
                error.insertAfter(element.next(".select2-container"));
            } else if ($(element).hasClass("hidden_method")) {
                error.insertAfter(element);
            } else {
                element.closest("div.form-group").append(error);
            }
        },
        rules: {
            edit_full_name: {
                required: true,
            },
            edit_address: {
                required: true,
            },
            edit_contact_no: {
                required: true,
                maxlength: 11,
            },
            edit_language: {
                required: true,
            },
            edit_nic: {
                required: true,
                maxlength: 12,
                remote: {
                    url: "/update-guide-nic-verification",
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        edit_nic: function () {
                            return $("#edit_nic").val();
                        },
                        id: function () {
                            return $("#id").val();
                        },
                    },
                    dataFilter: function (response) {
                        var json = JSON.parse(response);
                        if (json.valid) {
                            return true;
                        } else {
                            return '"This Nic is already Added"';
                        }
                    },
                },
            },
            is_active: {
                required: true,
                select2: true,
            },
        },
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}

function createHotelReservation() {
    $("#create-hotel-reservation-form").validate({
        submitHandler: function (form) {
            loader();
            form.submit();
        },
    });
}
