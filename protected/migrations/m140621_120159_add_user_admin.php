<?php

class m140621_120159_add_user_admin extends CDbMigration
{
	public function up()
	{
        try {
            $user = new User();
            $user->id = 1;
            $user->email = 'admin@svetofor.ru';
            $user->password = '123';
            $user->role = User::ADMIN;
            $user->status = User::STATUS_ACTIVE;
            $user->save(false);
        } catch (Exception $e){
            return;
        }
	}

	public function down()
	{

	}
}