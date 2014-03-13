<?php

/**
 * Created by PhpStorm.
 * User: Home
 * Date: 3/11/14
 * Time: 3:17 PM
 */
class ImportJsonParser implements ImportParserInterface
{
    public function parseFile($filepath)
    {
        $f = fopen($filepath, 'r+');
        $json = fread($f, filesize($filepath));
        fclose($f);

        $data = json_decode($json, true);

        $letter = new ImportLetter();

        $letter->setReff($data['reff']);
        $letter->setImagesUrl($data['images_url']);
        $letter->setHeaderText($data['header']['text']);


        $footer_data = $data['footer'];

        if (isset($footer_data['stocks'])) {
            foreach ($footer_data['stocks'] as $footer_stock) {
                $stock = new ImportStock();
                $stock->setName($footer_stock['label']);
                $stock->setUrl($footer_stock['url']);

                $letter->addStock($stock);
            }
        }

        if (isset($footer_data['banners']) && is_array($footer_data['banners'])) {
            foreach ($footer_data['banners'] as $footer_banner) {

                $banner = new ImportBlockBanner();
                $banner->setUrl(isset($footer_banner['url']) ? $footer_banner['url'] : null);
                $banner->setImage($footer_banner['src']);

                if (isset($footer_banner['areas'])) {
                    $areas = array();
                    foreach ($footer_banner['areas'] as $area) {
                        $areas[$area['coords']] = $area['url'];
                    }
                    $banner->setAreaCoords($areas);
                }

                $letter->addBlock(ImportLetter::POSITION_FOOTER, $banner);
            }
        }

        $catalog_data = $data['catalog'];

        if (isset($catalog_data['header'])) {
            $catalog_header_data = $catalog_data['header'];

            if (isset($catalog_header_data['text'])) {
                $block = new ImportBlockText();
                $block->setText($catalog_header_data['text']);
                $letter->addBlock(ImportLetter::POSITION_HEADER, $block);
            }

            if (isset($catalog_header_data['banners']) && is_array($catalog_header_data['banners'])) {
                foreach ($catalog_header_data['banners'] as $catalog_banner) {

                    $banner = new ImportBlockBanner();
                    $banner->setUrl(isset($catalog_banner['url']) ? $catalog_banner['url'] : null);
                    $banner->setImage($catalog_banner['src']);

                    if (isset($catalog_banner['areas'])) {
                        $areas = array();
                        foreach ($catalog_banner['areas'] as $area) {
                            $areas[$area['coords']] = $area['url'];
                        }
                        $banner->setAreaCoords($areas);
                    }

                    $letter->addBlock(ImportLetter::POSITION_HEADER, $banner);
                }
            }
        }


        if (isset($catalog_data['items'])) {
            $catalog = $catalog_data['items'];
            foreach ($catalog as $catalog_item) {
                $item = null;
                if (isset($catalog_item['type']) && $catalog_item['type'] == 'superprice') {
                    continue;
                }
                if (isset($catalog_item['type']) && $catalog_item['type'] == 'image') {
                    $item = new ImportBlockBanner();

                    $item->setUrl(isset($catalog_item['url']) ? $catalog_item['url'] : '');
                    $item->setImage($catalog_item['src']);
                    $item->setAreaCoords(isset($catalog_item['areas']) ? $catalog_item['areas'] : null);
                } else if (isset($catalog_item['category'])) {
                    $item = new ImportBlockProduct();

                    $item->setCategory($catalog_item['category']);
                    $item->setModel($catalog_item['model']);
                    $item->setImage($catalog_item['image']);
                    $item->setUrl($catalog_item['alias']);
                    $item->setOldPrice(isset($catalog_item['old_price']) ? str_replace(' ', '', $catalog_item['old_price']) : null);
                    $item->setPrice(str_replace(' ', '', $catalog_item['price']));
                    $item->setAllLabel($catalog_item['all_label']);
                    $item->setAllUrl($catalog_item['all_url']);
                    $item->setYellow(isset($catalog_item['yellow']) ? $catalog_item['yellow'] : '');
                    $item->setFeatures(isset($catalog_item['features']) && is_array($catalog_item['features']) ? $catalog_item['features'] : array());
                }

                if ($item) {
                    $letter->addBlock(ImportLetter::POSITION_CATALOG, $item);
                }
            }
        }

        return $letter;
    }
} 