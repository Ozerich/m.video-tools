<?php

class ImportLetter
{
    const POSITION_HEADER = 1;
    const POSITION_FOOTER = 2;
    const POSITION_CATALOG = 3;

    private $reff;
    private $images_url;
    private $header_text;

    private $header_blocks = array();
    private $footer_blocks = array();
    private $footer_stocks = array();

    private $catalog_blocks = array();


    public function addBlock($position, ImportBlock $block)
    {
        if ($position == self::POSITION_FOOTER) {
            $this->footer_blocks[] = $block;
        } else if ($position == self::POSITION_HEADER) {
            $this->header_blocks[] = $block;
        } else if ($position == self::POSITION_CATALOG) {
            $this->catalog_blocks[] = $block;
        } else {
            throw new InvalidArgumentException();
        }
    }

    public function addStock(ImportStock $stock)
    {
        $this->footer_stocks[] = $stock;
    }

    /**
     * @return array
     */
    public function getHeaderBlocks()
    {
        return $this->header_blocks;
    }

    /**
     * @return array
     */
    public function getCatalogBlocks()
    {
        return $this->catalog_blocks;
    }

    /**
     * @return array
     */
    public function getFooterBlocks()
    {
        return $this->footer_blocks;
    }

    /**
     * @return array
     */
    public function getFooterStocks()
    {
        return $this->footer_stocks;
    }


    /**
     * @param mixed $reff
     */
    public function setReff($reff)
    {
        $this->reff = $reff;
    }

    /**
     * @return mixed
     */
    public function getReff()
    {
        return $this->reff;
    }

    /**
     * @param mixed $header_text
     */
    public function setHeaderText($header_text)
    {
        $this->header_text = $header_text;
    }

    /**
     * @return mixed
     */
    public function getHeaderText()
    {
        return $this->header_text;
    }

    /**
     * @param mixed $images_url
     */
    public function setImagesUrl($images_url)
    {
        $this->images_url = $images_url;
    }

    /**
     * @return mixed
     */
    public function getImagesUrl()
    {
        return $this->images_url;
    }


} 