<?php
require_once("/xampp/htdocs/webbanhang/admin/product/models/product.php");

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    // Hiển thị danh sách sản phẩm
    public function index() {
        $products = $this->productModel->getAllProducts();
        var_dump($products); 
        include '/xampp/htdocs/webbanhang/admin/product/views/index.php'; // Cần có file views/index.php để hiển thị danh sách sản phẩm
    }

    // Hiển thị chi tiết sản phẩm
    public function show($id) {
        $product = $this->productModel->getProductById($id);
        include '/xampp/htdocs/webbanhang/admin/product/views/show.php'; // Cần có file views/show.php để hiển thị chi tiết sản phẩm
    }

    // Hiển thị form thêm mới sản phẩm
    public function createForm() {
        include '/xampp/htdocs/webbanhang/admin/product/views/create.php'; // Cần có file views/create.php để hiển thị form thêm mới sản phẩm
    }

    // Thêm mới sản phẩm
    public function create($data) {
        // Xử lý dữ liệu từ form và gọi phương thức createProduct trong model
        $success = $this->productModel->createProduct($data);
        if ($success) {
            header('Location: index.php'); // Chuyển hướng sau khi thêm thành công
        } else {
            echo "Thêm sản phẩm không thành công.";
        }
    }

    // Hiển thị form cập nhật sản phẩm
    public function updateForm($id) {
        $product = $this->productModel->getProductById($id);
        include '/xampp/htdocs/webbanhang/admin/product/views/update.php'; // Cần có file views/update.php để hiển thị form cập nhật sản phẩm
    }

    // Cập nhật sản phẩm
    public function update($id, $data) {
        // Xử lý dữ liệu từ form và gọi phương thức updateProduct trong model
        $success = $this->productModel->updateProduct($id, $data);
        if ($success) {
            header('Location: index.php'); // Chuyển hướng sau khi cập nhật thành công
        } else {
            echo "Cập nhật sản phẩm không thành công.";
        }
    }

    // Xóa sản phẩm
    public function delete($id) {
        $success = $this->productModel->deleteProduct($id);
        if ($success) {
            header('Location: index.php'); // Chuyển hướng sau khi xóa thành công
        } else {
            echo "Xóa sản phẩm không thành công.";
        }
    }
}

