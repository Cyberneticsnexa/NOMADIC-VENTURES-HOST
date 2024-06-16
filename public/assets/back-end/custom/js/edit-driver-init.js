$(document).ready(function () {
    $("#licence_front").on("change", handleFileSelectFront);
    $("#licence_back").on("change", handleFileSelectBack);
});

function handleFileSelectFront(e) {
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function (f) {
        if (!f.type.match("image.*")) {
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            var html =
                '<img src="' +
                e.target.result +
                "\" data-file='" +
                f.name +
                "' class='avatar rounded lg' alt='Licence Front Image' width='150px' 'border-radius=8%'>";
            $("#selectedBanner").html(html);
        };
        reader.readAsDataURL(f);
    });
}

function handleFileSelectBack(e) {
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function (f) {
        if (!f.type.match("image.*")) {
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            var html =
                '<img src="' +
                e.target.result +
                "\" data-file='" +
                f.name +
                "' class='avatar rounded lg' alt='Licence Back Image' width='150px' 'border-radius=8%'>";
            $("#selectedBackimage").html(html);
        };
        reader.readAsDataURL(f);
    });
}
