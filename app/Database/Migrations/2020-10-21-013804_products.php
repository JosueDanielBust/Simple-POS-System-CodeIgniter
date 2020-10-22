<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration {
  protected $DBGroup  = 'default';

  public function up() {
    $this->forge->addField([
      'product_id'      =>  [
        'type'            =>  'INT',
        'constraint'      =>  5,
        'unsigned'        =>  true,
        'auto_increment'  =>  true,
      ],
      'product_name'    =>  [
        'type'            =>  'VARCHAR',
        'constraint'      =>  '100',
      ],
      'product_image'   =>  [
        'type'            =>  'VARCHAR',
        'constraint'      =>  '200',
      ],
      'product_value'   =>  [
        'type'            =>  'FLOAT',
        'constraint'      =>  '10,2',
      ],
    ]);
    $this->forge->addKey('product_id', true);
    $this->forge->createTable('products');
  }
  public function down() {
    $this->forge->dropTable('products');
  }
}
