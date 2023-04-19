<!DOCTYPE html>
<html>
  <head>
    <title>Out of Stock - Football Shirt</title>
    <link rel="stylesheet" href="styleview.css">
  </head>
  <header>
    <nav>
      <ul>
        <li><a id="info-page-magazin2" href="infopage.php">Main Page</a></li>
        <li><a id="shop-page-magazin2" href="magazin.php">Shop</a></li>
        <li><button onclick="location.href='login.php'">Logout</button></li>
      </ul>
    </nav>
  </header>
  <body id="bodyyy">
    <main id="mainnn">
      <section id="out-of-stock-section">
        <h2><b>Sorry, the football shirt is out of stock &#128577;</b></h2>
        <p id="par1">We apologize for the inconvenience, but the shirt you are looking for is currently out of stock. We are working hard to restock it as soon as possible.</p>
        <p id="par2">In the meantime, we have other great football shirts available in our <a id="a1" href="http://localhost:3000/magazin.php">shop</a>. Feel free to take a look!</p>
        <p id="par3"><s><u>Price: $39.99</u></s> The new price is $34.99 or $29.99. Don't hesitate this is the best offer!!!</p>
        <p id="par4">You can choose your country below we exports shirts only in the countries below!Thanks for understanding!</p>
        <label for="continent-dropdown">Continent</label>
<select id="continent-dropdown" name="continent-dropdown" required>
  <option id="continent-placeholder" value="" disabled selected>Select continent</option>
  <option value="Africa">Africa</option>
  <option value="Asia">Asia</option>
  <option value="Europe">Europe</option>
  <option value="NorthAmerica">North America</option>
  <option value="SouthAmerica">South America</option>
</select>

<label for="country-dropdown">Country</label>
<select id="country-dropdown" name="country-dropdown" required>
  <option id="country-placeholder" value="" disabled selected>Select country</option>
</select>

<form id="pre-order-form">
<label id="lb2" for="email">Sign up to be ready for your pre-order</label>
<input id="inp2" type="email" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
<button id="btn2" type="submit">Submit</button>
<div id="message4"></div>

<script>
const form = document.getElementById('pre-order-form');
form.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevents the page from refreshing
  const email = document.getElementById('inp2').value;
  // You can send the email to your server using an AJAX request here
  
  // Display the message
  const message = document.getElementById('message4');
  message.innerText = "Your pre-order was registered";
  form.reset(); // Clears the form input
});
</script>
</form>
<script>
  const continentDropdown = document.getElementById('continent-dropdown');
  const countryDropdown = document.getElementById('country-dropdown');
  const preOrderForm = document.getElementById('pre-order-form');
  const preOrderSuccessMsg = document.getElementById('pre-order-success-msg');
  const continentOptions = {
    Africa: ['Algeria', 'Nigeria', 'Egypt', 'South Africa'],
    Asia: ['China', 'India', 'Japan', 'South Korea'],
    Europe: ['France', 'Germany', 'Italy', 'Spain'],
    NorthAmerica: ['Canada', 'Mexico', 'United States'],
    SouthAmerica: ['Argentina', 'Brazil', 'Chile', 'Colombia']
  };

  function updateCountryDropdown() {
    const selectedContinent = continentDropdown.value;

    countryDropdown.innerHTML = '<option id="country-placeholder" value="" disabled selected>Select country</option>';

    continentOptions[selectedContinent].forEach(country => {
      const option = document.createElement('option');
      option.value = country;
      option.text = country;
      countryDropdown.add(option);
    });
  }

  function submitPreOrderForm(event) {
    event.preventDefault();
    preOrderSuccessMsg.style.display = 'block';
    preOrderForm.reset();
  }

  continentDropdown.addEventListener('change', updateCountryDropdown);
  preOrderForm.addEventListener('submit', submitPreOrderForm);
</script>

        </form>
      </section>
      <section id="related-products-section">
        <h2><b>Related Products</b></h2>
        <table  id="rowspan-table">
          <tr>
            <td id="td1" rowspan="2"><a href="#"><img src="assets/tricou3.jpg" alt="Football Shirt 1"></a></td>
            <td><a href="#">Football Shirt 1</a></td>
            <td>$29.99</td>
          </tr>
          <tr>
            <td id="td2" colspan="2">Available in red and blue</td>
          </tr>
          <tr>
            <td id="td3" rowspan="2"><a href="#"><img src="assets/tricou1.jpg" alt="Football Shirt 2"></a></td>
            <td><a href="#">Football Shirt 2</a></td>
            <td>$34.99</td>
          </tr>
          <tr>
            <td id="td4" colspan="2">Available in green and black</td>
          </tr>
        </table>
      </section>
      <section id="customer-reviews-section">
        <h2><b>Customer Reviews</b></h2>
        <ul id="reviews-ul">
          <li class="review" id="review-1">
            <article>
              <h3>Great quality!</h3>
              <p id="p4">The football shirt I purchased from this website is amazing. The material is high-quality and it fits perfectly. I will definitely be buying from here again!</p>
              <p class="review-info"><code>Reviewed by: John Doe on March 1, 2023</code></p>
            </article>
          </li>
          <li class="review">
            <article>
              <h3>Disappointed</h3>
              <p id="p5">I was really excited to get this football shirt, but unfortunately it was out of stock. I hope it comes back soon.</p>
              <p class="review-info"><code>Reviewed by: Jane Smith on February 25, 2023</code></p>
            </article>
          </li>
          <li class="review">
            <article>
              <h3>Awesome design</h3>
              <p id="p6">I love the design of this football shirt. It's unique and really stands out on the field. The quality is also great, so I'm really happy with my purchase.</p>
              <p class="review-info"><code>Reviewed by: Alex Johnson on April 12, 2023</code></p>
            </article>
          </li>
        </ul>
      </section>
    </main>
    <div>
  <footer id="footer-element3">
    <div id="footer-container3">
      <p id="logo3">&copy; Chelsea official shop</p>
    </div>
  </body>
</html>
