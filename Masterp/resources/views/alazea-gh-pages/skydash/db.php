<?php
$serverName = 'localhost';
$usernName = 'root';
$password = '';
$dbName = 'ecomm';

$conn = new mysqli($serverName, $usernName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->error);
}

class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // Product Functions:

    // public function addProduct(
    //     $product_name,
    //     $product_price,
    //     $product_brife,
    //     $product_des,
    //     $category_id,
    //     $quantity_product,
    //     $product_img1,
    //     $product_img2,
    //     $product_img3,
    //     $product_img4,
    //     $mainfactor
    // ) {
    //     $sql = "
    //     INSERT INTO products (
    //         product_name, product_price, product_brife,
    //         product_des, category_id, quantity_product,
    //         product_img1, product_img2, product_img3,
    //         product_img4, mainfactor
    //         ) 
    //     VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    //     $stmt = mysqli_prepare($this->db, $sql);
    //     mysqli_stmt_bind_param(
    //         $stmt,
    //         "s,d,s,s,i,i,s,s,s,s,s",
    //         $product_name,
    //         $product_price,
    //         $product_brife,
    //         $product_des,
    //         $category_id,
    //         $quantity_product,
    //         $product_img1,
    //         $product_img2,
    //         $product_img3,
    //         $product_img4,
    //         $mainfactor
    //     );
    //     $result = mysqli_stmt_execute($stmt);
    //     return $result;
    // }
    public function addProduct(
        $product_name,
        $product_price,
        $product_brife,
        $product_des,
        $category_id,
        $quantity_product,
        $product_img1,
        $product_img2,
        $product_img3,
        $product_img4,
        $id_brand
    ) {
        $sql = "
    INSERT INTO product (
        product_name, product_price, product_brife,
        product_des, category_id, quantity_product,
        product_img1, product_img2,
        product_img3, product_img4, id_brand
        ) 
    VALUES (
        '$product_name',
        '$product_price',
        '$product_brife',
        '$product_des',
        '$category_id',
        '$quantity_product',
        '$product_img1',
        '$product_img2',
        '$product_img3',
        '$product_img4',
        '$id_brand' 
      
    )";

        $result = $this->db->query($sql);

        if ($result === true) {
            return true;
        } else {
            return false;
        }
    }


    public function getAllProducts()
    {
        $sql= "SELECT id ,product_name,product_price,product_brife FROM product "; 
        $result= $this->db->query($sql);
        return $result;
    }

    public function getCategoryProducts($category_id)
    {
        $sql = "SELECT * FROM product WHERE category_id=$category_id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSingleProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    // public function getTheCategoryOfSingleProduct ($product_id) {
    //     $sql = "SELECT p.id, p.	category_id"
    // }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id=$id";
        $this->db->query($sql);
        // if ($result === true) {
        //     echo "record deleted successfully";
        // } else {
        //     echo "Error deleting record: " . $this->db->error;
        // }
    }

    // public function updateProduct(
    //     $id,
    //     $product_name,
    //     $product_price,
    //     $product_brife,
    //     $product_des,
    //     $category_id,
    //     $quantity_product,
    //     $product_img1,
    //     $mainfactor
    // ) {
    //     $sql = "UPDATE product SET 
    //     product_name=?, product_price=?, product_brife=?,
    //     product_des=?, category_id=?, quantity_product=?,
    //     product_img1=?,
    //     mainfactor=?
    //     WHERE id=$id";
    //     $stmt = mysqli_prepare($this->db, $sql);
    //     mysqli_stmt_bind_param(
    //         $stmt,
    //         "s,d,s,s,i,i,s,s",
    //         $product_name,
    //         $product_price,
    //         $product_brife,
    //         $product_des,
    //         $category_id,
    //         $quantity_product,
    //         $product_img1,
    //         $mainfactor
    //     );
    //     mysqli_stmt_execute($stmt);
    // }
    public function updateProduct(
        $id,
       $product_name,
        $product_price,
        $product_brife,
        $product_des,
        $category_id,
        $quantity_product,
        $product_img1,
        $product_img2,
        $product_img3,
        $product_img4,
        $id_brand
    ) {
        $sql = "UPDATE product SET 
     product_name='$product_name',
     product_price='$product_price',
     product_brife='$product_brife',
     product_des='$product_des',
     category_id='$category_id',
     quantity_product='$quantity_product',
     product_img1='$product_img1',
     product_img2='$product_img2',
     product_img3='$product_img3',
     product_img4='$product_img4',
     id_brand='$id_brand'
     WHERE id=$id";

        $result = $this->db->query($sql);

        if ($result === true) {
            // Successfully updated
        } else {
            // Handle the error
            echo "Error updating product: " . $this->db->error;
        }
    }


    // Category Functions

    public function addCategory($category_name, $category_img, $category_des)
    {

        $sql = "
        INSERT INTO category (category_name, category_img, category_des) 
        VALUES (?,?,?)";

        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $category_name, $category_img, $category_des);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM category";
        $result = $this->db->query($sql);
        return $result;
    }
    public function getSingleCategories($id)
    {
        $sql = "SELECT * FROM category where id=$id ";
        $result = $this->db->query($sql);
        return $result;
    }
    public function getAllCategoriesName()
    {
        $sql = "SELECT category_name FROM category";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSingleCategory($id)
    {
        $sql = "SELECT * FROM category WHERE id=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE id=$id";
        $result = $this->db->query($sql);
        if ($result === true) {
            echo "record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->db->error;
        }
    }

    public function updateCategory($id, $category_name, $category_img, $category_des)
    {

        $sql = "UPDATE category SET category_name=?, category_img=?, category_des=? WHERE id=$id";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $category_name, $category_img, $category_des);
        mysqli_stmt_execute($stmt);
    }

    // User Functions

    public function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSingleUser($id)
    {
        $sql = "SELECT * FROM user WHERE id=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id=$id";
        $result = $this->db->query($sql);
        if ($result === true) {
            echo "record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->db->error;
        }
    }

    public function updateUserRole($id, $role)
    {
        $sql = "UPDATE user SET role=? WHERE id=$id";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $role);
        mysqli_stmt_execute($stmt);
    }

    // Review functions

 

    // public function getReviews()
    // {
    //     $sql = "SELECT
    //  CONCAT(u.first_name, ' ', u.last_name) AS full_name,
    //  r.review,
    //  p.product_name,

    //  FROM
    //  user u
    //  JOIN
    //  review r ON u.id = r.user_id
    //  JOIN
    //  product p ON r.product_id = p.id;
    //     ";
    //     $result = $this->db->query($sql);
    //     return $result;
    // }

    public function getReviews()
    {
        $sql = "SELECT
     r.userName,
     r.review,
     p.product_name,
     r.review_date
     FROM
     review r
     JOIN
     product p ON r.product_id = p.id;
        ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getUserReviews($user_id)
    {
            $sql = "SELECT
        r.userName,
        r.review,
        p.product_name,
        r.product_id,
        r.id,
        r.review_date
        FROM
        review r
        JOIN
        product p ON r.product_id = p.id
        WHERE r.user_id=$user_id;
       " ;
        $result = $this->db->query($sql);
        return $result;
    }

    public function getProductReviews($product_id)
    {
        $sql = "SELECT
        r.userName,
        r.review,
        p.product_name,
        r.product_id,
        r.id,
        r.review_date
        FROM
        review r
        JOIN
        product p ON r.product_id = p.id
        WHERE r.product_id =$product_id;  
       " ;
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteReview($id)
    {
        $sql = "DELETE FROM review WHERE id=$id";
        $result = $this->db->query($sql);
     
    }

    // Brand Functions:

    public function getAllBrands () {
        $sql = "SELECT * FROM brand";
        $result = $this->db->query($sql);
        return $result;
    }

    public function addBrand($brandName) {
        $sql = "
        INSERT INTO brand (Brand_name) 
        VALUES (?)";

        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $brandName);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    public function getSingleBrand ($id) {
        $sql = "SELECT * FROM brand WHERE brand=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteBrand ($id) {
        $sql = "DELETE FROM brand WHERE brand=$id";
        $result = $this->db->query($sql);
    }

    public function updateBrand ($id, $newBrand) {
        $sql = "UPDATE brand SET Brand_name=? WHERE brand=$id";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $newBrand);
        mysqli_stmt_execute($stmt);
    }

    public function getAllDiscounts(){
        $sql = "SELECT * FROM discount";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteDiscount($id) {
        $sql = "DELETE FROM discount WHERE id=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function updateDiscountStatus($id, $newStatus) {
        $sql = "UPDATE discount SET is_active=? WHERE id=$id";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $newStatus);
        mysqli_stmt_execute($stmt);
    }

    public function addDiscount($code, $percent) {
        $sql = "
        INSERT INTO discount (discount_code, discount_persent, is_active) 
        VALUES (?,?,?)";
        $status = "1";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $code, $percent, $status);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    public function getAllOrders(){
        $sql = "SELECT * FROM `order`";
        $result = $this->db->query($sql);
        return $result;
    }
}
$crudObj=new crud($conn);