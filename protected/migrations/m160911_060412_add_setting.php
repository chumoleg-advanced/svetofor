<?php

class m160911_060412_add_setting extends CDbMigration
{
    public function up()
    {
        $name = 'Сертификаты';
        $this->insert('settings', ['id' => Settings::CERTIFICATES, 'text' => $name, 'name' => $name]);
    }

    public function down()
    {
        $this->delete('settings', 'id = ' . Settings::CERTIFICATES);
    }
}