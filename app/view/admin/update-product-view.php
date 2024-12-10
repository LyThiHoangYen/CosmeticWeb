<?php include '../../../resources/head/admin-check.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Update Product</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <?php $PHP_productId = isset($_GET["id"]) ? $_GET["id"] : null; ?>

    <script>
        var productID = '<?php echo $PHP_productId; ?>';

        $(document).ready(function () {
            $("#btnUpdate").click(function (e) {
                e.preventDefault(); // Prevent the form from submitting

                var productName = $("#productName").val();
                var price = $("#price").val();
                var category = $("#category").val();
                var imgLink = $("#imgLink").val();
                var stockQuantity = $("#stockQuantity").val();
                var discountPercentage = $("#discountPercentage").val();
                var discountStartDate = $("#discountStartDate").val();
                var discountEndDate = $("#discountEndDate").val();
                var description = $("#description").val();
                var statusProduct = $("#status").val();

                // Organize parameters in an object
                var parameters = {
                    productID: productID,
                    productName: productName,
                    price: price,
                    category: category,
                    stockQuantity: stockQuantity,
                    imgLink: imgLink,
                    discountPercentage: discountPercentage,
                    discountStartDate: discountStartDate,
                    discountEndDate: discountEndDate,
                    description: description,
                    statusProduct: statusProduct
                };

                // Serialize parameters into a query string
                var queryString = $.param(parameters);


                $.get("../../../app/controller/admin/update-product-controller.php?" + queryString, function (data, status) {
                    console.log("Response data:", data);
                    alert("Sản phẩm đã được cập nhật");
                });
                // $.ajax({
                //     type: "GET",
                //     url: "../../../app/controller/admin/adCreateController.php",
                //     data: parameters,
                //     success: function (data) {
                //         console.log("Response data:", data);
                //         alert(data);
                //     },
                //     error: function (error) {
                //         console.error("Error:", error);
                //     }
                // });
            });
        });
    </script>

</head>

<?php include '../../../resources/includes/headerAdmin.php'; ?>


<body>
    <img src="../../../public/img/logo.png" alt="" style="width: 15%; height: auto; margin-left: 6%">
    <div class="container mt-5 row mx-auto" style="padding-bottom: 10%">
        <!-- load the product information use script -->
        <div class="col-sm-4 divProductInfo">
            <div class="product-list-item border rounded text-center p-3" style="margin: 0 10% 0 10%;">
                <a href="#" class="product-item-link">
                    <img class="img-fluid product-list-item-img" src="../../../public/img/product_Taytrang.jpg"
                        alt="Product Image">
                </a>
                <div class="product-item-detail mt-3">
                    <div>
                        <p class="product-item-heading font-weight-bold">Nước tẩy trang hoa hồng 310ml</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="product-item-txt font-weight-light">Làm sạch sâu và cấp ẩm</p>
                                <p class="product-item-price" style="font-size: 16px;">245.000 đ</p>
                            </div>
                            <img src="../../../public/img/lock.svg" alt="Lock Icon" class="lock-icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8 divUpdateFunction">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="product_name">Tên sản phẩm:</label>
                        <input type="text" id="productName" class="form-control" name="product_name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả sản phẩm:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá gốc:</label>
                        <input type="number" id="price" name="price" step="0.01" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="stock_quantity">Số lượng sản phẩm trong kho:</label>
                        <input type="text" id="stockQuantity" class="form-control" name="stock_quantity" required>
                    </div>

                    <?php include '../../../app/model/get-category.php'; ?>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="imgLink">Link hình ảnh:</label>
                        <input type="text" id="imgLink" class="form-control" name="imgLink" required>
                    </div>

                    <div class="form-group">
                        <label for="discount_percentage">Phần trăm giảm giá:</label>
                        <input type="text" id="discountPercentage" class="form-control" name="discount_percentage">
                    </div>

                    <div class="form-group">
                        <label for="discount_start_date">Ngày bắt đầu giảm giá:</label>
                        <input type="date" id="discountStartDate" class="form-control" name="discount_start_date">
                    </div>

                    <div class="form-group">
                        <label for="discount_end_date">Ngày kết thúc giảm giá:</label>
                        <input type="date" id="discountEndDate" class="form-control" name="discount_end_date">
                    </div>

                    <div class="form-group">
                        <label for="status_product">Trạng thái sản phẩm:</label>
                        <select class="form-control" id="status" name="status_product">
                            <option value="1">Khả dụng</option>
                            <option value="0">Không khả dụng</option>
                        </select>
                    </div>
                </div>
                <button type="submit" id="btnUpdate" class="btn btn-primary mx-auto">Update Product</button>
            </div>

        </div>
    </div>

</body>

</html>