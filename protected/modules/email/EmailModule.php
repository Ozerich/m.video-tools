<?php

class EmailModule extends CWebModule
{
    public function init()
    {
        $this->setImport(
            array(
                'email.models.*',
                'email.components.*',
                'email.components.Import.*',
                'email.components.Import.Parsers.*',
                'email.components.Import.Models.*',
            )
        );
    }
}