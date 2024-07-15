<?php
require_once("/xampp/htdocs/webbanhang/admin/product/models/product.php");
require_once("/xampp/htdocs/webbanhang/admin/product/controllers/product_controller.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu từ form
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $description = $_POST['description'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    // Xử lý upload hình ảnh
    $target_file = "";
    if (!empty($_FILES['thumbnail']['name'])) {
        $target_dir = "/xampp/htdocs/webbanhang/admin/images";
        $target_file = $target_dir . basename($_FILES['thumbnail']['name']);
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
    }

    // Tạo mảng dữ liệu để truyền vào hàm createProduct
    $data = [
        'category_id' => $category_id,
        'title' => $title,
        'price' => $price,
        'discount' => $discount,
        'thumbnail' => $target_file,
        'description' => $description,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];

    // Tạo một đối tượng ProductController để xử lý
    $productController = new ProductController();
    $productController->create($data);
}