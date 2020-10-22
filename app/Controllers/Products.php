<?php namespace App\Controllers;

use App\Models\ProductsModel;
use CodeIgniter\Controller;

class Products extends Controller {
  public function index( $page = 'create' ) {
    if ( !is_file( APPPATH . '/Views/products/' . $page . '.php' ) ) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException( $page );
    }

    $data['title']  = 'Create New Product';
    echo view('templates/header', $data);
    echo view('products/' . $page, $data);
    echo view('templates/footer', $data);
  }

  public function create() {
    $model        = new ProductsModel();
    $validations  = [
      'product_name'  =>  'required|min_length[5]|max_length[100]',
      'product_image' =>  'required|min_length[5]|max_length[200]',
      'product_value' =>  'required|decimal',
    ];

    if ($this->request->getMethod() === 'post' && $this->validate( $validations )) {
      $model->insert([
        'product_name'  =>  $this->request->getPost('product_name'),
        'product_image' =>  $this->request->getPost('product_image'),
        'product_value' =>  $this->request->getPost('product_value'),
      ]);
      //echo view('products/success');
      return redirect()->to('/');
    } else {
      $data['title']  = 'Create New Product';
      echo view('templates/header', $data);
      echo view('products/create');
      echo view('templates/footer');
    }
  }
}
