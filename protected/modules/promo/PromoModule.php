<?php

class PromoModule extends CWebModule
{
    public function init()
    {
        $this->setImport(
            array(
                'promo.forms.*',
                'promo.components.*',
            )
        );
    }
}