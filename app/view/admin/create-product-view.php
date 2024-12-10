<?php include '../../../resources/head/admin-check.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Create Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#btnCreate").click(function () {
                var productName = $("#productName").val();
                var price = $("#price").val();
                var category = $("#category").val();
                var imgLink = $("#imgLink").val();
                var discountPercentage = $("#discountPercentage").val();
                var discountStartDate = $("#discountStartDate").val();
                var discountEndDate = $("#discountEndDate").val();
                var description = $("#description").val();
                var statusProduct = $("#statusProduct").prop("checked") ? 1 : 0; // 1 for available, 0 for unavailable

                // Organize parameters in an object
                var parameters = {
                    productName: productName,
                    price: price,
                    category: category,
                    imgLink: imgLink,
                    discountPercentage: discountPercentage,
                    discountStartDate: discountStartDate,
                    discountEndDate: discountEndDate,
                    description: description,
                    statusProduct: statusProduct
                };

                // Serialize parameters into a query string
                var queryString = $.param(parameters);

                $.get("../../../app/controller/admin/create-product-controller.php?" + queryString, function (data, status) {
                    console.log("Response data:", data);
                    alert("Sản phẩm đã được tạo");
                });
            });
        });
    </script>
</head>

<?php include '../../../resources/includes/headerAdmin.php'; ?>

<body class="bg-light">
    <img src="../../../public/img/logo.png" alt="" style="width: 15%; height: auto; margin-left: 6%">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="productForm" class="bg-white p-4 rounded shadow">
                    <h2 class="mb-4 text-center">Tạo sản phẩm mới</h2>

                    <div class="form-group">
                        <label for="productName">Tên sản phẩm:</label>
                        <input type="text" id="productName" name="productName" class="form-control"
                            placeholder="Kem ủ tóc bưởi Cocoon" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả:</label>
                        <textarea id="description" name="description" class="form-control"
                            placeholder="Nhập mô tả"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá gốc:</label>
                        <input type="number" id="price" name="price" step="0.01" class="form-control"
                            placeholder="215000" required>
                    </div>

                    <div class="form-group">
                        <label for="stockQuantity">Tồn kho:</label>
                        <input type="number" id="stockQuantity" name="stockQuantity" class="form-control"
                            placeholder="100" required>
                    </div>

                    <?php include '../../../app/model/get-category.php'; ?>

                    <div class="form-group">
                        <label for="imgLink">Link hình ảnh:</label>
                        <input type="text" id="imgLink" name="imgLink" class="form-control"
                            placeholder="https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lf9m1pifttg75e"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="discountPercentage">Phần trăm giảm giá:</label>
                        <input type="number" id="discountPercentage" name="discountPercentage" step="0.01"
                            class="form-control" placeholder="0">
                    </div>

                    <div class="form-group">
                        <label for="discountStartDate">Ngày <b>bắt đầu</b> giảm giá:</label>
                        <input type="date" id="discountStartDate" name="discountStartDate" class="form-control"
                            value="2023-12-21" required>
                    </div>

                    <div class="form-group">
                        <label for="discountEndDate">Ngày <b>kết thúc</b> giảm giá:</label>
                        <input type="date" id="discountEndDate" name="discountEndDate" class="form-control"
                            value="2024-12-21" required>
                    </div>

                    <div class="form-group">
                        <label for="statusProduct">Trạng thái sản phẩm:</label>
                        <div class="form-check">
                            <input type="checkbox" id="statusProduct" name="statusProduct" class="form-check-input"
                                checked>
                            <label class="form-check-label" for="statusProduct">Khả dụng</label>
                        </div>
                    </div>

                    <!-- <button type="submit" class="btn btn-primary btn-block" id="btnCreate">Tạo sản phẩm</button> -->
                    <button type="button" class="btn btn-primary btn-block" id="btnCreate">Tạo sản phẩm</button>
                </div>
            </div>
        </div>
</body>

</html>