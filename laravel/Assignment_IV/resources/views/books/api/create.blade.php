<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <h1>Book Create</h1>
    <label for="title">Title</label><input type="text" name="title">
    <label for="title">Description</label><input type="text" name="description">
    <button onclick="createBook()">Create</button>

    <script>
        function createBook() {
            var createdData = {
                title: $('[name=title]').val(),
                description: $('[name=description]').val(),
            }

            $.ajax({
            url: "/api/book/create/",
            type: 'POST',
            data: createdData,
            dataType: 'json', // added data type
                success: function(res) {
                    window.location.replace("/api-view/book");
                }
            });
        }
    </script>
</body>
</html>