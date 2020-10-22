<?php namespace App\Controllers;

use App\Models\ProductsModel;
use CodeIgniter\Controller;

class Bill extends Controller {
  public function index( $page = 'bill' ) {
    if ( !is_file( APPPATH . '/Views/bills/' . $page . '.php' ) ) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException( $page );
    }

    if ($this->request->getMethod() === 'post' ) {
      $model  = new ProductsModel();
      $data   = [
        'title'     =>  'Bill',
        'bill'      =>  [
          'client_name'   =>  $this->request->getPost('name'),
          'client_id'     =>  $this->request->getPost('id'),
          'products_ids'  =>  explode( ',', $this->request->getPost('products') ),
        ],
        'products'  =>  $model->find( array_unique( explode( ',', $this->request->getPost('products') ) ) ),
      ];

      echo view('templates/header', $data);
      echo view('bills/' . $page, $data);
      echo view('templates/footer', $data);
    } else {
      return redirect()->to('/');
    }
  }
}
