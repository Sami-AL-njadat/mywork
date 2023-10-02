<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <!-- <link rel="stylesheet" href="../../"> -->
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <?php
    require_once("../../db.php");
    $categories = $crudObj->getAllCategories();
    $x = $categories->fetch_all(MYSQLI_ASSOC);

    $brands = $crudObj->getAllBrands();
    $y = $brands->fetch_all(MYSQLI_ASSOC);
    // print_r($x);


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitAdd'])) {
        $name = $_POST['name'];
        $product_brife = $_POST['brief'];
        $product_des = $_POST['description'];
        // $mainfactor = $_POST['mainfactor'];
        $product_price = $_POST['price'];
        $quantity_product = $_POST['quantity'];
        $selectedId = $_POST["select_Category"];
        $selectedBrand = $_POST["select_Brand"];
        // $id = $_POST['category_id'];

        // Images Handling Start
        
        $uploadDir = '../../../myimg/';
        $maxImages = 4;
        $uploadFiles = array(); // Array to store uploaded file paths

        if (isset($_FILES['picture'])) {
            $fileCount = count($_FILES['picture']['name']);

            if ($fileCount <= $maxImages) {

                for ($i = 0; $i < $fileCount; $i++) {
                    $pictureName = $_FILES['picture']['name'][$i];
                    $tmpFilePath = $_FILES['picture']['tmp_name'][$i];

                    if ($pictureName != "") {
                        $uploadFile = $uploadDir . basename($pictureName);
                        move_uploaded_file($tmpFilePath, $uploadFile);
                        $uploadFiles[] = $uploadFile; // Add uploaded file path to the array
                    }
                }
            } else {
                echo "You can upload a maximum of {$maxImages} images.";
            }
        }

        // Images Handling Ends


        $crudObj->addProduct($name, $product_price, $product_brife, $product_des, $selectedId, $quantity_product, $uploadFiles[0], $uploadFiles[1], $uploadFiles[2], $uploadFiles[3], $selectedBrand);
        header("Location: all_products.php");
        exit();
    }
    ?>

    <?php
    require_once("../../partials/_navbar.php");



    ?>
    <div class="container-fluid page-body-wrapper">
        <?php
        require_once("../../partials/navbar.php");
        ?>

        <div class="container">
            <!-- <img src="../../../myimg/" alt=""> -->
            <h2></h2><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3 form">
                    <label for="name" class="form-label">Product Name:</label>
                    <input class="form-control" type="text" name="name" placeholder="Name" aria-label="default input example">
                </div>

                <div class="mb-3 form">
                    <label for="brief" class="form-label">Brief specifications</label>
                    <input class="form-control" type="text" id="brief" name="brief">
                    <p style=" color: grey;">ie: mention the storage, processor, ram..</p>
                </div>

                <div class="mb-3 form">
                    <label for="description" class="form-label">Product Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3">

                    </textarea>
                </div>

                <div class="mb-3 form">
                    <label for="price" class="form-label">Product price</label>
                    <input class="form-control" type="text" id="price" name="price">
                </div>

                <div class="mb-3 form">
                    <label for="picture" class="form-label">Product picture</label>
                    <input class="form-control" type="file" id="picture" name="picture[]" multiple accept="image/*">
                </div>
                <div class="mb-3 form">
                    <label for="picture" class="form-label">quantity product </label>
                    <input class="form-control" type="text" id="quantity" name="quantity">
                </div>

                <div>

                    <label for="Category">Choose Category</label>
                    <select name="select_Category" id="Category">
                        <?php foreach ($x as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>

                        <?php } ?>
                    </select>

                </div>



                <div>

                    <label for="Brand">Choose Brand</label>
                    <select name="select_Brand" id="Brand">
                        <?php foreach ($y as $value) { ?>
                            <option value="<?php echo $value['brand']; ?>"><?php echo $value['Brand_name']; ?></option>
                        <?php } ?>
                    </select>

                </div>




                <button type=" submit" class="btn btn-outline-success" name="submitAdd">Add product</button>
            </form>

        </div><br><br>
        <script src="../../vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="../../vendors/chart.js/Chart.min.js"></script>
        <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="../../js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../../js/off-canvas.js"></script>
        <script src="../../js/hoverable-collapse.js"></script>
        <script src="../../js/template.js"></script>
        <script src="../../js/settings.js"></script>
        <script src="../../js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="../../js/dashboard.js"></script>
        <script src="../../js/Chart.roundedBarCharts.js"></script>
        <!-- ___________ 
 -->
        <script src="../../js/product.js"></script>