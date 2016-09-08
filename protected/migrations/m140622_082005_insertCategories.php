<?php

class m140622_082005_insertCategories extends CDbMigration
{
	public function up()
	{
        $array = array(
            'Автозапчасти',
            'Автосвет'
        );

        foreach ($array as $cat){
            $this->insert('category', array('name' => $cat));
        }
	}

	public function down()
	{
	}
}