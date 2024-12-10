$(document).ready(function () {
  $("#btnCreate").click(function () {
      var productName = $("#txtProductName").val();
      var price = $("#txtPrice").val();
      var category = $("#txtCategory").val();
      var imageLink = $("#txtImageLink").val();
      var link = $("#txtLink").val();
      var description = $("#description").val();

      var parameters = {
          productName: productName,
          price: price,
          category: category,
          imageLink: imageLink,
          link: link,
          description: description
      };

      $.get("../server/createpost.php", parameters, function (data, status) {
          alert(data);
      });
  });
});
