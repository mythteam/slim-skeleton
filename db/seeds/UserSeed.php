<?php

use Phinx\Seed\AbstractSeed;

class UserSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $user = $this->table('user');

        $user->insert([
            [
                'username'      => 'admin',
                'email'         => 'admin@slim.com',
                'password_hash' => password_hash('admin', PASSWORD_DEFAULT, ['cost' => 13]),
                'created_at'    => time(),
                'updated_at'    => time(),
                'status'        => 1,
            ],
        ]);

        $user->save();
    }
}
