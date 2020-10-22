<section class="products">
  <div class="products-list">
    <?php
      foreach ( $products as $key => $product ) { ?>
        <div class="product" data-index="<?php echo $product['product_id']; ?>" data-name="<?php echo $product['product_name']; ?>" data-value="<?php echo $product['product_value']; ?>">
          <img src="./images/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>">
          <p class="product-name"><?php echo $product['product_name']; ?></p>
          <p class="product-value"><?php echo $product['product_value']; ?></p>
        </div>
      <?php
      }
    ?>
  </div>
  <div class="bill">
    <div class="bill-products">
      <h2>Productos</h2>
    </div>
    <div class="bill-client">
      <form method="POST" action="/bill">
        <div class="hidden">
          <label for="products">Products</label>
          <input type="text" name="products" id="products" placeholder="Products" value="">
        </div>
        <div>
          <label for="name">Name</label>
          <input type="text" name="name" id="name" placeholder="Client Name">
        </div>
        <div>
          <label for="id">ID</label>
          <input type="text" name="id" id="id" placeholder="Client ID">
        </div>
        <div>
          <input type="submit" value="Print">
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  (function() {
    let products = document.querySelectorAll('section.products > .products-list > .product');
    let billProducts = document.querySelector('section.products > div.bill > .bill-products');
    let productsInput = document.querySelector('section.products > div.bill #products');

    productsInput.value = '';
    
    products.forEach( product => {
      product.addEventListener( 'click', function( e ) {
        let index = e.srcElement.dataset.index;
        let name = e.srcElement.dataset.name;
        let value = e.srcElement.dataset.value;

        let p = document.createElement('p');
        p.innerHTML = name + ' - $' + value;
        billProducts.appendChild( p );

        if ( productsInput.value == '' ) {
          productsInput.value += index;
        } else {
          productsInput.value += ',' + index;
        }
      });
    });
  })();
</script>