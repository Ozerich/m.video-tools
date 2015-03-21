<?php

class ImportBlockBanner extends ImportBlock
{
    private $url;
    private $image;

    private $area_coords = array();

    /**
     * @param array $area_coords
     */
    public function setAreaCoords($area_coords)
    {
        $this->area_coords = $area_coords;
    }

    /**
     * @return array
     */
    public function getAreaCoords()
    {
        return $this->area_coords;
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

    function saveToLetter($letter, $position = null)
    {
        if ($position == null) {
            throw new InvalidArgumentException();
        }

        $model = new LetterBlock();

        $model->position = $position;
        $model->letter_id = $letter->id;
        $model->type = LetterBlock::TYPE_BANNER;
        $model->banner_file = $this->getImage();
        $model->banner_url = $this->getUrl();
        $model->banner_area_coords = $this->getAreaCoords();

        if (!$model->save()) {
            throw new ImportException("Ошибка сохранения блока-баннера");
        }
    }
} 