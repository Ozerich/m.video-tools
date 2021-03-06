<?php

class Letter extends CActiveRecord
{
    public static function GetLayouts()
    {
        return array(
            'catalog_new' => 'НОВЫЙ каталог',
            'catalog_old' => 'Каталог для старого сайта',
            'catalog' => 'Каталог',
			'catalog_adaptive' => 'Адаптивная верстка',
			'empty' => 'Пустой',
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'letters';
    }

    public function rules()
    {
        return array(
            array('name, reff,date,top_text,images_url, disclaimer, utm_campaign, layout, options', 'safe')
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Название рассылки',
            'reff' => 'Рефф',
            'date' => 'Дата рассылки',
            'top_text' => 'Текст вверху страницы',
            'images_url' => 'URL к папке с картинками',
            'disclaimer' => 'Дисклеймер',
            'utm_campaign' => 'UTM Campaign',
            'layout' => 'Шаблон рассылки'
        );
    }

    public function relations()
    {
        return array(
            'header_blocks' => array(self::HAS_MANY, 'LetterBlock', 'letter_id', 'scopes' => 'header'),
            'footer_blocks' => array(self::HAS_MANY, 'LetterBlock', 'letter_id', 'scopes' => 'footer'),
            'blocks' => array(self::HAS_MANY, 'LetterBlock', 'letter_id'),
            'stocks' => array(self::HAS_MANY, 'LetterStock', 'letter_id'),
            'catalog_blocks' => array(self::HAS_MANY, 'LetterCatalogBlock', 'letter_id')
        );
    }

    public function defaultScope()
    {
        return array(
            'order' => 'date DESC'
        );
    }

    public function beforeDelete()
    {
        foreach (array_merge($this->blocks, $this->catalog_blocks, $this->stocks) as $block) {
            $block->delete();
        }

        return true;
    }


    public function copyFrom(Letter $model)
    {
        foreach ($model->blocks as $block) {
            $new = new LetterBlock();
            $new->attributes = $block->attributes;
            $new->id = null;
            $new->letter_id = $this->id;
            $new->save();
        }

        foreach ($model->catalog_blocks as $block) {
            $new = new LetterCatalogBlock();
            $new->attributes = $block->attributes;
            $new->id = null;
            $new->letter_id = $this->id;
            $new->save();
        }

        foreach ($model->stocks as $stock) {
            $new = new LetterStock();
            $new->attributes = $stock->attributes;
            $new->id = null;
            $new->letter_id = $this->id;
            $new->save();
        }

        $this->top_text = $model->top_text;
        $this->layout = $model->layout;
        $this->options = $model->options;
        $this->disclaimer = $model->disclaimer;
        $this->images_url = $model->images_url;
        $this->date = $model->date;
        $this->reff = $model->reff;
        $this->utm_campaign = $model->utm_campaign;
        $this->save();
    }
	
	
	public function afterFind(){
		$this->options = $this->options ? unserialize($this->options) : array();
	}
	
	public function beforeSave(){
		$this->options = serialize($this->options ? $this->options : array());
		return parent::beforeSave();
	}
	
	public function setOption($key, $value){
		$this->options[$key] = $value;
	}
	
	public function getOption($key, $default = null){
		return isset($this->options[$key]) ? $this->options[$key] : null;
	}
}