<?php

class ImportBlockProduct extends ImportBlock
{
    private $model;
    private $category;
    private $url;
    private $image;
    private $old_price;
    private $price;
    private $yellow;
    private $all_url;
    private $all_label;
    private $features = array();

    /**
     * @param mixed $all_label
     */
    public function setAllLabel($all_label)
    {
        $this->all_label = $all_label;
    }

    /**
     * @return mixed
     */
    public function getAllLabel()
    {
        return $this->all_label;
    }

    /**
     * @param mixed $all_url
     */
    public function setAllUrl($all_url)
    {
        $this->all_url = $all_url;
    }

    /**
     * @return mixed
     */
    public function getAllUrl()
    {
        return $this->all_url;
    }


    /**
     * @param mixed $yellow
     */
    public function setYellow($yellow)
    {
        $this->yellow = $yellow;
    }

    /**
     * @return mixed
     */
    public function getYellow()
    {
        return $this->yellow;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param array $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * @return array
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $old_price
     */
    public function setOldPrice($old_price)
    {
        $this->old_price = $old_price;
    }

    /**
     * @return mixed
     */
    public function getOldPrice()
    {
        return $this->old_price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }


    function saveToLetter($letter, $position = null)
    {
        $model = new LetterCatalogBlock();

        $model->letter_id = $letter->id;
        $model->type = LetterCatalogBlock::TYPE_PRODUCT;
        $model->columns = 1;
        $model->image = $this->getImage();
        $model->url = $this->getUrl();
        $model->product_category = $this->getCategory();
        $model->product_model = $this->getModel();
        $model->product_yellow = $this->getYellow();
        $model->product_price = $this->getPrice();
        $model->product_old_price = $this->getOldPrice();
        $model->product_all_url = $this->getAllUrl();
        $model->product_all_label = $this->getAllLabel();
        $model->product_features = $this->getFeatures();

        if (!$model->save()) {
            throw new ImportException("Ошибка сохранения блока-товара");
        }
    }


} 