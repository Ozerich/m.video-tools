<?php

class Import extends CApplicationComponent
{
    private function saveToModel(ImportLetter $data, $model)
    {
        $model->reff = $data->getReff();
        $model->images_url = $data->getImagesUrl();
        $model->top_text = $data->getHeaderText();
        $model->stocks = serialize($data->getFooterStocks());

        foreach ($data->getHeaderBlocks() as $block) {
            $block->saveToLetter($model, LetterBlock::POSITION_HEADER);
        }

        foreach ($data->getFooterBlocks() as $block) {
            $block->saveToLetter($model, LetterBlock::POSITION_FOOTER);
        }

        $stocks = array();
        foreach ($data->getFooterStocks() as $stock) {
            $stocks[strip_tags($stock->getName())] = $stock->getUrl();
        }
        $model->stocks = $stocks;


        foreach ($data->getCatalogBlocks() as $block) {
            $block->saveToLetter($model, ImportLetter::POSITION_CATALOG);
        }

        $model->save();
    }

    public function importFile($file, $model)
    {
        $filepath = $file instanceof CUploadedFile ? $file->getTempName() : $file;
        $filename = $file instanceof CUploadedFile ? $file->getName() : $file;

        if (!file_exists($filepath)) {
            throw new ImportException("Файл не найден");
        }

        $parser = ImportFactory::getParser($filename);

        if (!$parser) {
            throw new ImportException("Парсер для данного файла не найден");
        }

        $data = $parser->parseFile($filepath);

        if ($parser instanceof ImportJsonParser) {
            $date = mktime(0, 0, 0, substr($filename, 2, 2), substr($filename, 0, 2), substr($filename, 4, 4));
            $model->date = date("Y-m-d", $date);
            $model->name = 'Рассылка за ' . date("d.m.Y", $date);
        }

        $this->saveToModel($data, $model, $filename);

        return true;
    }
} 