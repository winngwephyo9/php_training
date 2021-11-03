<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <script src="{{ asset('lib/jquery.min.js') }}"></script>
</head>

<body>
    <h1>Edit Book</h1>
    <label for="name">name</label><input type="text" name="name">
    <label for="name">detail</label><input type="text" name="detail">
    <button onclick="editBook()">Edit</button>

    <script>
        var bookId = window.location.pathname.split('/')[3];
        $.ajax({
            url: "/api/book/" + bookId,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                console.log(res);
                $('[name=name]').val(res.name);
                $('[name=detail]').val(res.detail);
            }
        });

        function editBook() {
            var editedData = {
                name: $('[name=name]').val(),
                detail: $('[name=detail]').val(),
            }

            $.ajax({
                url: "/api/book/" + bookId,
                type: 'POST',
                data: editedData,
                dataType: 'json', // added data type
                success: function(res) {
                    window.location.replace("/api-view/book");
                }
            });
        }
    </script>
</body>

</html>