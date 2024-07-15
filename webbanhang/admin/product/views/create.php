
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm mới sản phẩm</title>
</head>
<body>
    <h2>Thêm mới sản phẩm</h2>
    <form action="process_create.php" method="POST">
        <label for="category_id">Category ID:</label><br>
        <input type="text" id="category_id" name="category_id" required><br><br>

        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" required><br><br>

        <label for="discount">Discount:</label><br>
        <input type="text" id="discount" name="discount" required><br><br>

        <label for="thumbnail">Thumbnail:</label><br>
        <input type="text" id="thumbnail" name="thumbnail" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Thêm sản phẩm">
    </form>
</body>
</html>
