Yii2 sitemap
============
Генерация Sitemap по крону

Установка
------------

Выполнить
```
composer require --prefer-dist alpiiscky/yii2-sitemap "*"
```

или добавить

```
"alpiiscky/yii2-sitemap": "*"
```

в `composer.json`.


Настройка
-----

Добавить в раздел `components` файла `console.php`:

```php
'sitemap' => [
    'class' => 'alpiiscky\sitemap\components\SitemapComponent',
    'filename' => 'sitemap.xml',
    'basePath' => '@webroot',
    'siteUrl' => 'http://<домен>'
],
```

Создать в папке `commands` контроллер. Массив `$items` заполняется по циклам
```php
<?php

namespace app\commands;

use yii\console\Controller;
use Yii;

class SitemapController extends Controller
{
    public function actionIndex()
    {
        $sitemap = Yii::$app->sitemap;

        $items = [
            ['loc' => 'ef', 'changefreq' => 'weekly', 'priority' => 0.5],
        ];

        $sitemap->add($items);
        $sitemap->render();
    }
}
```