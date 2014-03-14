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
        return array();
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

        return true;
    }

    public function afterFind()
    {
        $this->product_features = unserialize($this->product_features);
        $this->product_features = $this->product_features ? $this->product_features : array();
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

}