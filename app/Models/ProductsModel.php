<?php namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model {
  protected $DBGroup        = 'default';

  protected $table          = 'products';
  protected $primaryKey     = 'product_id';

  protected $returnType     = 'array';
  protected $allowedFields  = ['product_name', 'product_image', 'product_value'];

  protected $useTimestamps  = false;
  protected $createdField   = 'created_at';
  protected $updatedField   = 'updated_at';
}

