<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token"
          content="{{csrf_token()}}">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous"><!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.11/dist/summernote-bs4.min.css"
          rel="stylesheet"><!--summernote-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"
          rel="stylesheet"/><!--select2-->
    <link href="{{url('css/font-glyphicons.css')}}"
          rel="stylesheet"><!--иконки-->
    <link href="{{url('css/style.css')}}"
          rel="stylesheet"><!--стили-->
    <link href="{{url('//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css')}}"
          rel="stylesheet"><!--иконки на главной странице-->
    <title>{{"MatVest"}}</title>
</head>
<body>
<div class="wrapper" style="display: flex;flex-direction: column;min-height: 100%;margin: 0 auto;">
    @include("layouts.nav")
    <div class="content-mrg" style="flex: 1 0 auto;">
        @yield("content")
    </div>
    @include("layouts.footer")
</div>
<script href="{{url('resources/js/script.js')}}"
        type="text/javascript"></script><!--файл js-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script><!--jquery-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script><!--popper-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script><!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script><!--select2-->
<script src="https://cdn.jsdelivr.net/npm/bs4-summernote@0.8.10/dist/summernote-bs4.min.js"></script><!--summernote-->
<script>
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
</script>
</body>
</html>


