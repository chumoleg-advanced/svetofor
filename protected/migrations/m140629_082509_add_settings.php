<?php

class m140629_082509_add_settings extends CDbMigration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `settings` (
              `id` TINYINT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
              `name` VARCHAR(150),
              `text` TEXT,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Общие страницы';");

        $array = array(
            'Оффлайн заказ',
            'Каталоги',
            'Доставка',
            'О компании',
            'Наш офис',
            'Телефоны',
        );

        foreach ($array as $a) {
            $this->insert('settings', array('text' => $a, 'name' => $a));
        }
    }

    public function down()
    {
    }
}