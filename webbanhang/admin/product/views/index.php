<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <a href="create.php">Thêm mới sản phẩm</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Danh mục</th>
            <th>Tiêu đề</th>
            <th>Giá</th>
            <th>Giảm giá</th>
            <th>Hình thu nhỏ</th>
            <th>Mô tả</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Hành động</th>
        </tr>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['category_id']; ?></td>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['discount']; ?></td>
                <td><img src="<?php echo $product['thumbnail']; ?>" alt="<?php echo $product['title']; ?>"></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['created_at']; ?></td>
                <td><?php echo $product['updated_at']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>">Sửa</a>
                    <a href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="10">Không có sản phẩm nào.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
