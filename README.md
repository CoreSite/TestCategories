# Test categories

Необходимо отобразить дерево категорий. 

Требования:

1. Исспользовать dump.sql в качестве исходных данных категорий. Вывод категорий только для локали по умолчанию.
2. Можно исспользовать любой фреймворк или же написать собственную структуру с исспользованием MVC.
3. Исспользовать jsTree.js для отображения структурного дерева категорий.
4. Написать пару Unit тестов для методов. Для теста можете исспользовать PHPUnit.

Ожидаемый результат:

Получить страницу с категориями первого левела. 
Была возможность открыть родительскую категорию и просмотреть дочерние категории.
Был написан файл с unit тестами.

## Dump BD
``` sql
CREATE TABLE `categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` INT UNSIGNED NULL,
  `name` VARCHAR(255) NOT NULL,
  `locale_id` VARCHAR(2) NOT NULL DEFAULT 'en',
  PRIMARY KEY (`id`));

ALTER TABLE `categories`
  ADD INDEX `fk_categories_1_idx` (`parent_id` ASC),
  ADD CONSTRAINT `fk_categories_1`
    FOREIGN KEY (`parent_id`)
    REFERENCES `categories` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE;
  
INSERT INTO `categories` (`id`, `parent_id`, `name`, `locale_id`) VALUES ('1', NULL, 'Category 1', 'en'),
('2', '1', 'Category 2', 'en'),
('3', '1', 'Category 3', 'en'),
('4', '2', 'Category 4', 'en'),
('5', '2', 'Category 5', 'en'),
('6', NULL, 'Category 6', 'en'),
('7', NULL, 'Category 7', 'fr'),
('8', '6', 'Category 8', 'en'),
('9', '6', 'Category 9', 'en'),
('10', '8', 'Category 10', 'en'),
('11', '9', 'Category 11', 'en'),
('12', '7', 'Category 12', 'fr'),
('13', '6', 'Category 13', 'en'),
('14', NULL, 'Category 14', 'en'),
('15', NULL, 'Category 15', 'en'),
('16', '15', 'Category 16', 'en'),
('17', '16', 'Category 17', 'en');
  

```

## Запуск тестов

``` bash
bash vendor/bin/simple-phpunit
```