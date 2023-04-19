<!DOCTYPE html>
<html>
<head>
  <title>Football Shirt Shop</title>
  <link rel="stylesheet" type="text/css" href="styleview.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".img-cont").click(function() {
        var imageSource = $(this).attr("src");
        var sizeTableHTML = "<table id='table-nested'><thead><tr><th id='sizeTH'>Size</th><th id='priceTH'>Price</th><th>Dimensions</th></tr></thead><tbody><tr><td>Small</td><td>$19.99</td><td><table><tr><td>Length:</td><td>28 inches</td></tr><tr><td>Width:</td><td>18 inches</td></tr></table></td></tr><tr><td>Medium</td><td>$24.99</td><td><table><tr><td>Length:</td><td>29 inches</td></tr><tr><td>Width:</td><td>20 inches</td></tr></table></td></tr><tr><td>Large</td><td>$29.99</td><td><table><tr><td>Length:</td><td>30 inches</td></tr><tr><td>Width:</td><td>22 inches</td></tr></table></td></tr></tbody></table>";
        var materialsListHTML = "<ul><li id='li11'>100% Cotton</li><li id='li12'>Machine Washable</li><li id='li13'>Imported</li></ul>";
        var imageHTML = "<div class='popup-image'><img src='" + imageSource + "' /></div>" +
          "<p class='popup-text'>Image of the product " + sizeTableHTML + materialsListHTML + "<button class='close-btn'>X</button></p>";
        $("body").append("<div class='popup-container'>" + imageHTML + "</div>");
        $(".popup-container").fadeIn();
      });

      $(document).on("click", ".popup-container .close-btn", function() {
        $(this).closest(".popup-container").fadeOut(function() {
          $(this).remove();
        });
      });
    });
    $(document).ready(function() {
    // ...
    
    // Add an event listener to the eighth image element
    $(".img-cont:eq(7)").click(function() {
      // Redirect to the desired URL
      window.location.href = "http://localhost:3000/stock.php";
    });
  });
  </script>
</head>
<body>
<header>
    <nav>
      <ul>
        <li><a id="info-page-magazin" href="infopage.php">Main Page</a></li>
        <li><a id="shop-page-magazin" href="magazin.php">Shop</a></li>
        <li><button onclick="location.href='login.php'">Logout</button></li>
      </ul>
    </nav>
  </header>
  <div id="main">
    <img class="img-cont" src="assets/tricou1.jpg" alt="Football Shirt" data-year="2020" data-price="50.00">
    <img class="img-cont" src="assets/tricou2.jpg" alt="Football Shirt" data-year="2019" data-price="60.00">
    <img class="img-cont" src="assets/tricou3.jpg" alt="Football Shirt" data-year="2021" data-price="55.00">
    <img class="img-cont" src="assets/tricou4.jpg" alt="Football Shirt" data-year="2020" data-price="50.00">
    <img class="img-cont" src="assets/tricou5.jpg" alt="Football Shirt" data-year="2019" data-price="60.00">
    <img class="img-cont" src="assets/tricou6.jpg" alt="Football Shirt" data-year="2021" data-price="55.00">
    <img class="img-cont" src="assets/tricou7.jpg" alt="Football Shirt" data-year="2020" data-price="50.00">
    <img class="img-cont" src="assets/tricou8.jpg" alt="Football Shirt" data-year="2019" data-price="60.00">
  </div>
  <footer id="footer-element2">
    <div id="footer-container2">
      <p id="logo">&copy; Chelsea official shop</p>
    </div>
</body>
</html>
