<?php
namespace alpiiscky\sitemap\components;

use yii\base\Component;

class SitemapComponent extends Component
{
    protected $items = array();

    public function add($items)
    {
        $this->items = $items;
    }

    public function render()
    {
        $fileHandler = fopen(\Yii::getAlias($this->basePath).$this->filename, 'w');
        fwrite(
            $fileHandler,
            "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n"
        );

        foreach($this->items as $item) {
            fwrite($fileHandler, "\t<url>\n\t\t<loc>{$item['loc']}</loc>\n\t\t<changefreq>{$item['changefreq']}</changefreq>\n\t\t<priority>{$item['priority']}</priority>\n\t</url>\n");
        }

        fwrite($fileHandler, "</urlset>");
    }

}