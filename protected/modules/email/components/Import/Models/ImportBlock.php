<?php

abstract class ImportBlock
{
    abstract function saveToLetter($letter, $position = null);
} 