<?php

class m140619_083804_create_database extends CDbMigration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `user` (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `email` varchar(100) DEFAULT NULL,
              `password` varchar(50) DEFAULT NULL,
              `fio` varchar(200) DEFAULT NULL,
              `phone` varchar(15) DEFAULT NULL,
              `area` INT(10) UNSIGNED,
              `city` VARCHAR(255) DEFAULT NULL,
              `address` VARCHAR(500) DEFAULT NULL,
              `status` tinyint(1) NOT NULL DEFAULT 2,
              `role` int(2) unsigned DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Пользователи';");

        $this->createIndex('index_email', 'user', 'email', true);
        $this->createIndex('index_role', 'user', 'role');

        $this->execute("CREATE TABLE IF NOT EXISTS `category` (
              `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
              `name` varchar(255) NOT NULL,
              `picture` varchar(500),
              `status` tinyint(1) NOT NULL DEFAULT 1,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории';");

        $this->execute("CREATE TABLE IF NOT EXISTS `sub_category` (
              `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
              `name` varchar(255) NOT NULL,
              `status` tinyint(1) NOT NULL DEFAULT 1,
              `category_id` int(4) UNSIGNED,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Подкатегории';");

        $this->addForeignKey('fk_sub_category_category_id', 'sub_category', 'category_id', 'category',
            'id', 'SET NULL', 'CASCADE');

        $this->execute("CREATE TABLE IF NOT EXISTS `producer` (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `name` varchar(255) NOT NULL,
              `category_id` INT(4) UNSIGNED,
              `status` tinyint(1) NOT NULL DEFAULT 1,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Производитель';");

        $this->addForeignKey('fk_producer_category_id', 'producer', 'category_id',
            'category', 'id', 'CASCADE', 'CASCADE');

        $this->execute("CREATE TABLE IF NOT EXISTS `rel_producer_sub_category` (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `producer_id` INT(10) UNSIGNED,
              `sub_category_id` INT(6) UNSIGNED,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь производителей и категорий';");

        $this->addForeignKey('fk_rel_producer_sub_category_producer_id', 'rel_producer_sub_category', 'producer_id',
            'producer', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_rel_producer_sub_category_sub_category_id', 'rel_producer_sub_category',
            'sub_category_id', 'sub_category', 'id', 'CASCADE', 'CASCADE');

        $this->execute("CREATE TABLE IF NOT EXISTS `product` (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `name` varchar(255) NOT NULL,
              `description` VARCHAR(500) DEFAULT NULL,
              `article` VARCHAR(255) DEFAULT NULL,
              `status` tinyint(1) NOT NULL DEFAULT 1,
              `picture` VARCHAR(500) DEFAULT NULL,
              `category_id` int(4) UNSIGNED,
              `producer_id` int(10) UNSIGNED,
              `opt_price` DECIMAL(10,2) UNSIGNED DEFAULT 0,
              `rozn_price` DECIMAL(10,2) UNSIGNED DEFAULT 0,
              `date_create` TIMESTAMP NULL,
              `recommended` TINYINT(1) UNSIGNED DEFAULT 1,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Товары';");

        $this->addForeignKey('fk_product_category_id', 'product', 'category_id', 'category',
            'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_product_producer_id', 'product', 'producer_id', 'producer',
            'id', 'SET NULL', 'CASCADE');

        $this->execute("CREATE TABLE IF NOT EXISTS `rel_product_subcategory` (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `product_id` int(10) UNSIGNED,
              `sub_category_id` int(6) UNSIGNED,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь товаров и подкатегорий';");

        $this->addForeignKey('fk_rel_product_subcategory_sub_category_id', 'rel_product_subcategory', 'sub_category_id',
            'sub_category', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_rel_product_subcategory_product_id', 'rel_product_subcategory', 'product_id',
            'product', 'id', 'CASCADE', 'CASCADE');

        $this->execute("CREATE TABLE IF NOT EXISTS `order` (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `date_create` TIMESTAMP NULL,
              `status` TINYINT(1) UNSIGNED DEFAULT 1,
              `comment` VARCHAR(500),
              `user_session` VARCHAR(32),
              `user_id` INT(10) UNSIGNED DEFAULT NULL,
              `email` varchar(100) DEFAULT NULL,
              `fio` varchar(200) DEFAULT NULL,
              `phone` varchar(15) DEFAULT NULL,
              `area` INT(10) UNSIGNED,
              `city` VARCHAR(255) DEFAULT NULL,
              `address` VARCHAR(500) DEFAULT NULL,
              `price` DECIMAL(12,2) UNSIGNED DEFAULT 0,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Заказы';");

        $this->addForeignKey('fk_order_user_id', 'order', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->execute("CREATE TABLE IF NOT EXISTS `rel_order_product` (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `order_id` int(10) UNSIGNED,
              `product_id` int(10) UNSIGNED,
              `price` DECIMAL(12,2) UNSIGNED DEFAULT 0,
              `quantity` INT(10) UNSIGNED DEFAULT 1,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь заказов и товаров';");

        $this->addForeignKey('fk_rel_order_product_order_id', 'rel_order_product', 'order_id', 'order',
            'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_rel_order_product_product_id', 'rel_order_product', 'product_id', 'product',
            'id', 'CASCADE', 'CASCADE');

        $this->execute("CREATE TABLE IF NOT EXISTS `basket` (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `user_session` CHAR(32),
              `user_id` int(10) UNSIGNED,
              `date_create` TIMESTAMP NULL,
              `product_id` int(10) UNSIGNED,
              `price` DECIMAL(12,2) UNSIGNED DEFAULT 0,
              `single_price` DECIMAL(10,2) UNSIGNED DEFAULT 0,
              `quantity` INT(10) UNSIGNED DEFAULT 1,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Корзина';");

        $this->addForeignKey('fk_basket_product_id', 'basket', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_basket_user_id', 'basket', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {

    }
}