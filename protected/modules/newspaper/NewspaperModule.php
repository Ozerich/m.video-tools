<?php

class NewspaperModule extends CWebModule
{
    public function init()
    {
        $this->setImport(
            array(
                'newspaper.models.*',
                'newspaper.components.*',
            )
        );
    }
}