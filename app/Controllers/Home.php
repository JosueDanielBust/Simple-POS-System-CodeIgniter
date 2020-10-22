<?php namespace App\Controllers;

use App\Models\ProductsModel;
use CodeIgniter\Controller;

class Home extends BaseController {
  public function index() {
    $model = new ProductsModel();

    $data = [
      'title'     =>  'Products',
      'products'  =>  $model->findAll(),
    ];

    // if( empty( $data['products'] ) ) {
    //   throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find products. Please create some items before.');
    // }

    echo view('templates/header', $data);
    echo view('products/products', $data);
    echo view('templates/footer', $data);
  }
}
