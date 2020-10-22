<section class="create-product">
  <h2>Create New Product</h2>

  <?= \Config\Services::validation()->listErrors(); ?>

  <form action="/products/create" method="post">
    <div class="form-control">
      <?= csrf_field() ?>
    </div>
    <div class="form-control">
      <label for="product_name">Product Name</label>
      <input required type="text" name="product_name" id="product_name" placeholder="Product Name">
    </div>
    <div class="form-control">
      <label for="product_image">Product Image</label>
      <input required type="text" name="product_image" id="product_image" placeholder="Product Image Name">
    </div>
    <div class="form-control">
      <label for="product_value">Product Name</label>
      <input required type="text" name="product_value" id="product_value" placeholder="Product Value">
    </div>
    <div class="form-control">
      <input type="submit" name="submit" value="Create Product" />
    </div>
  </form>
</section>
