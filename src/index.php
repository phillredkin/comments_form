<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Комментарии</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Оставьте свой комментарий</h2>
    <form id="commentForm">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий:</label>
            <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

    <div id="commentsSection" class="mt-4"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#commentForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'submit_comment_ajax.php',
                data: $(this).serialize(),
                success: function(response) {
                    $('#commentsSection').html(response);
                    $('#commentForm')[0].reset();
                }
            });
        });

        loadComments();
    });

    function loadComments() {
        $.ajax({
            url: 'load_comments_ajax.php',
            success: function(response) {
                $('#commentsSection').html(response);
            }
        });
    }
</script>
</body>
</html>
