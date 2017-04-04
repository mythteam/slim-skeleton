<?php

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

class UserTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $user = $this->table('user');
        $user->addColumn('created_at', 'integer')
             ->addColumn('updated_at', 'integer')
             ->addColumn('username', 'string', ['limit' => 20, 'comment' => '用户姓名'])
             ->addColumn('email', 'string', ['limit' => 100, 'comment' => '用户电子邮件'])
             ->addColumn('password_hash', 'string')
             ->addColumn('status', 'integer', ['limit' => MysqlAdapter::INT_SMALL, 'default' => 1, 'comment' => '用户状态']);
        
        $user->addIndex(['email'], ['unique' => true]);
        
        $user->save();
    }
}
