<?php
require_once("/xampp/htdocs/webbanhang/database/config.php");

class product {
    private $conn;
    private $table = 'product';

    // Các thuộc tính sản phẩm
    public $id;
    public $category_id;
    public $title;
    public $price;
    public $discount;
    public $thumbnail;
    public $description;
    public $created_at;
    public $updated_at;

    public function __construct() {
        // Mở kết nối
        $this->conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        if (!$this->conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
        // Thiết lập bộ ký tự
        mysqli_set_charset($this->conn, 'utf8');
    }

    // Phương thức để lấy danh sách tất cả sản phẩm
    public function getAllProducts() {
        $sql = "SELECT * FROM $this->table ORDER BY created_at DESC";
        return $this->executeResult($sql);
    }

    // Phương thức để lấy chi tiết sản phẩm bằng id
    public function getProductById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        return $this->executeResult($sql, true);
    }

    // Phương thức để thêm mới sản phẩm
    public function createProduct($data) {
        $sql = sprintf(
            "INSERT INTO %s (category_id, title, price, discount, thumbnail, description, created_at, updated_at) 
            VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
            $this->table, 
            $data['category_id'], 
            $data['title'], 
            $data['price'], 
            $data['discount'], 
            $data['thumbnail'], 
            $data['description'], 
            $data['created_at'], 
            $data['updated_at']
        );
        return $this->execute($sql);
    }

    // Phương thức để cập nhật thông tin sản phẩm
    public function updateProduct($id, $data) {
        $sql = sprintf(
            "UPDATE %s 
            SET category_id = '%s', title = '%s', price = '%s', discount = '%s',
                thumbnail = '%s', description = '%s', updated_at = '%s'
            WHERE id = %d",
            $this->table, 
            $data['category_id'], 
            $data['title'], 
            $data['price'], 
            $data['discount'], 
            $data['thumbnail'], 
            $data['description'], 
            $data['updated_at'], 
            $id
        );
        return $this->execute($sql);
    }

    // Phương thức để xóa sản phẩm
    public function deleteProduct($id) {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->execute($sql);
    }

    // Hàm thực thi câu lệnh SQL
    private function execute($sql) {
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . mysqli_error($this->conn);
            return false;
        }
    }

    // Hàm thực thi câu lệnh SQL và lấy kết quả
    private function executeResult($sql, $isSingle = false) {
        $data = [];
        $result = mysqli_query($this->conn, $sql);

        if ($isSingle) {
            $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        } else {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function __destruct() {
        // Đóng kết nối
        mysqli_close($this->conn);
    }
}

