<?php
  $bill['products'] = [];
  $bill['total']    = 0;

  foreach ( $bill['products_ids'] as $key => $index ) {
    $product            = array_search( $index, array_column( $products, 'product_id' ) );
    $bill['products'][] = $products[ $product ];
    $bill['total']      = $bill['total'] + $products[ $product ]['product_value'];
  }
?>
<section id="bill-print" class="bill-print">
  <div class="bill-print-header">
    <h1>Fancy Business</h1>
    <p>
      <span>Cra. 49, No. 7 Sur - 50</span>
      <span>Medellín, Antioquia</span>
    </p>
    <p>Telefono: +57 (4) 2619500</p>
    <p><?php echo date('d/m/Y H:i'); ?></p>
  </div>
  <div class="bill-print-user">
    <p class="bill-print-user-name">
      <span>Client:</span>
      <span><?php echo $bill['client_name']; ?></span>
    </p>
    <p class="bill-print-user-id">
      <span>ID:</span>
      <span><?php echo $bill['client_id']; ?></span>
    </p>
  </div>
  <div class="bill-print-products">
    <p>
      <span>Product</span>
      <span>Value</span>
    </p>
    
    <?php foreach ( $bill['products'] as $key => $product ) { ?>
      <p>
        <span><?php echo $product['product_name']; ?></span>
        <span><?php echo $product['product_value']; ?></span>
      </p>
    <?php } ?>
  </div>
  <div class="bill-print-total">
    <p>
      <span>Total:</span>
      <span><?php echo $bill['total']; ?></span>
    </p>
  </div>
</section>
<section class="bill-actions">
  <button id="print">Print</button>
  <button id="new">New</button>
</section>
<script>
  (function() {
    let printButton = document.querySelector('#print');
    let newButton = document.querySelector('#new');
    
    printButton.addEventListener( 'click', function( e ) {
      window.print();
    });
    newButton.addEventListener( 'click', function( e ) {
      window.location = '/';
    });
  })();
</script>