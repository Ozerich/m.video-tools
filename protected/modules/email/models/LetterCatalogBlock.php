<?php

class LetterCatalogBlock extends CActiveRecord
{
    const TYPE_BANNER = 'banner';
    const TYPE_PRODUCT = 'product';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'letter_catalog_blocks';
    }

    public function rules()
    {
        return array(
            array('priority, type, columns, image, url, product_category, product_model, product_yellow, product_price, product_old_price, product_features, product_all_url, product_all_label', 'safe')
        );
    }

    public function attributeLabels()
    {
        return array();
    }

    public function relations()
    {
        return array(
            'letter' => array(self::BELONGS_TO, 'Letter', 'letter_id'),
        );
    }

    public function defaultScope()
    {
        return array(
            'order' => 'priority ASC'
        );
    }


    public function beforeSave()
    {
        $this->product_features = serialize($this->product_features ? $this->product_features : array());
        $this->area_coords = serialize(empty($this->area_coords) ? array() : $this->area_coords);

        return true;
    }

    public function afterFind()
    {
        $this->product_features = unserialize($this->product_features);
        $this->product_features = $this->product_features ? $this->product_features : array();

        $this->area_coords = $this->area_coords ? unserialize($this->area_coords) : array();
    }


    public function isMultiLinks(){
        return !empty($this->area_coords);
    }


    public function getFullImageUrl()
    {
        return $this->letter->images_url . $this->image;
    }


    public function getFullUrl()
    {
        if ($this->type == self::TYPE_BANNER) {
            return $this->url;
        }

        return strpos($this->url, 'http://') !== false ? $this->url : 'http://www.mvideo.ru/products/' . $this->url . '.html';
    }


    public function getUtmContent($suffix)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = '`letter_id` = '.$this->letter_id.' AND `id` < '.$this->id;
        $line = ceil((self::model()->count($criteria) + 1) / 2);
        return 'a_'.$line.'product_'.$this->url.'_'.$suffix;
    }
}