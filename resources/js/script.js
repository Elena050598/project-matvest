$(document).ready(function () {
    $('.authorselect').select2({
        "language": {
            "noResults": function () {
                return "Совпадений не найдено"
            }
        }
    });
});

$(document).ready(function () {
    $('#mission').summernote({
        height: 300,
    });
});
$(document).ready(function () {
    $('#target').summernote({
        height: 300,
    });
});
$(document).ready(function () {
    $('#tasks').summernote({
        height: 300,
    });
});
$(document).ready(function () {
    $('#titleindex').summernote({
        height: 300,
    });
});
$(document).ready(function () {
    $('#headings').summernote({
        height: 300,
    });
});
$(document).ready(function () {
    $('#is_necessary').summernote({
        height: 300,
    });
});
$(document).ready(function () {
    $('#attention').summernote({
        height: 300,
    });
});
$(document).ready(function () {
    $('#infa').summernote({
        height: 300,
    });
});
