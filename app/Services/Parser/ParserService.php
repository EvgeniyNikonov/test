<?php

namespace App\Services\Parser;

use Carbon\Carbon;
use PHPHtmlParser\Dom;
use App\Models\Products\Product;

class ParserService
{
    private $dom;

    public function __construct() 
	{
        $this->dom = new Dom;
        $this->dom->loadFromUrl('https://podtrade.ru/catalog/0_1_sharikovye_podshipniki_otkrytogo_i_zakrytogo_tipa/');
	}

    /**
     * Парсинг списка товаров
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function parseListProducts(): bool
    {      
        $countPages = $this->getCountPage($this->dom);

        for ($i = 1; $i <= $countPages; $i++) { 

            $this->dom->loadFromUrl('https://podtrade.ru/catalog/0_1_sharikovye_podshipniki_otkrytogo_i_zakrytogo_tipa/?PAGEN_1=' . $i);

            $urlsProducts = $this->getUrlsProducts($this->dom);

            foreach ($urlsProducts as $value) {
                $pageProduct = $this->dom->loadFromUrl('https://podtrade.ru' . $value);
                $dataProduct = $this->parsePageProduct($pageProduct);
                $this->storeProduct($dataProduct, $value);
            }
            
        }
        return true;
    }

    /**
     * Получение количества страниц
     *
     * @param [type] $dom
     * @return void
     */
    public function getCountPage($dom)
    {
        return $dom->find('div.bx-pagination-container > ul > li')[5]->find('a > span')->text;
    }

    /**
     * Получение урлов товаров на странице
     *
     * @param [type] $dom
     * @return void
     */
    public function getUrlsProducts($dom)
    {
        $urls = [];
        foreach ($dom->find('div.block-view-photo') as $value) {
            
            array_push($urls, $value->find('a')[0]->getAttribute('href'));
        }
        return $urls;
    }

    /**
     * Парсинг страницы товара
     *
     * @param [type] $dom
     * @return void
     */
    public function parsePageProduct($dom)
    {
        $data = [];

        $data['name']               = trim($dom->find('h1')->text);
        $data['sort']               = 1;
        $data['img']                = 'https://podtrade.ru' . trim($dom->find('img.carousel-cell-image')[0]->getAttribute('data-flickity-lazyload-src'));
        $data['price']              = trim($dom->find('div.buy-price')[0]->text);
        $data['brand_name']         = trim($dom->find('div.grid-table-item')[0]->text);
        $data['inner_diameter']     = trim($dom->find('div.grid-table-item')[1]->text);
        $data['external_diameter']  = trim($dom->find('div.grid-table-item')[2]->text);
        $data['width']              = trim($dom->find('div.grid-table-item')[3]->text);

        /**
         * Не у всех товаров есть аналог и вес
         */
        if (isset($dom->find('div.grid-table-item')[5])) {
            $data['analogs']        = trim($dom->find('div.grid-table-item')[4]->text);
            $data['weight']         = trim($dom->find('div.grid-table-item')[5]->text);
        } elseif (isset($dom->find('div.grid-table-item')[4])) {
            $data['weight']         = trim($dom->find('div.grid-table-item')[4]->text); 
        }
        
        $data['description']        = $dom->find('div.textproductgen')[0]->text  ?? trim($dom->find('div.textproductgen')[0]->text);

        return $data;
    }

    /**
     * Сохранение товара в БД
     *
     * @param [type] $data
     * @param [type] $url
     * @return void
     */
    public function storeProduct($data, $url)
    {
        Product::updateOrCreate(
            ['url' => $url],
            $data
        );
    }

}
