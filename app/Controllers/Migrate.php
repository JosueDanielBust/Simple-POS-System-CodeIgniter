<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Migrate extends Controller {
  public function index() {
    $migrate = \Config\Services::migrations();
    
    try {
      $migrate->latest();
    } catch (\Throwable $e) {
      throw new \Exception( 'Migration failed' );
    }
  }
}