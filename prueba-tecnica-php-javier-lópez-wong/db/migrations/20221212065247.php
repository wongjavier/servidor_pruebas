<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class V20221212065247 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('users',['id'=>false, 'primary_key'=>['id_usuario']]);
        $table = $this->table('users',['id'=>'id_usuario']);
        $table->addColumn('nombre', 'string', ['length' => 100]);
        $table->addColumn('email', 'string', ['length' => 100]);
        $table->addColumn('contrasena', 'string', ['length' => 100]);

        $table->create();
    }
}
