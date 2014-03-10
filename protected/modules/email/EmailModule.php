<?php

class EmailModule extends CWebModule
{
    public function init()
    {
        $this->setImport(
            array(
                'email.models.*',
            )
        );
    }
}