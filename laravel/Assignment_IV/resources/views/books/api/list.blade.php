<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test AJAX List</title>
    <script src="{{ asset('lib/jquery.min.js') }}"></script>
</head>

<body>
    <a href="/api-view/book/create">Create</a>
    <table>
        <thead>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>Operation</th>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        $.ajax({
            url: "/api/book/list",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                // console.log(res);
                res.data.forEach(books => {
                    $('tbody').append(
                        `<tr><td>${books.id}</td><td>${books.name}</td><td>${books.detail}</td><td><button onclick="deleteBook(${books.id})">Delete</button> <a href="/api-view/book/${books.id}/edit">Edit</a></td></tr>`);
                });
            }
        });

        function deleteBook(id) {
            alert(id);

            $.ajax({
                url: `/api/book/delete/${id}`,
                type: 'DELETE',
                success: function(result) {
                    alert("success");
                    location.reload();
                },
                error: function(result) {
                    alert("fail");
                }
            });
        }
    </script>
</body>

</html>