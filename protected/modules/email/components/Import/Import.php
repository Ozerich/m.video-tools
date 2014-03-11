<?php

class Import extends CApplicationComponent
{
    private function saveToModel(ImportLetter $data, $model)
    {
        $model->reff = $data->getReff();
        $model->images_url = $data->getImagesUrl();
        $model->top_text = $data->getHeaderText();
        $model->stocks = serialize($data->getFooterStocks());
        $model->name = "Рассылка №" . $model->id;

        foreach ($data->getHeaderBlocks() as $block) {
            $block->saveToLetter($model, LetterBlock::POSITION_HEADER);
        }

        foreach ($data->getFooterBlocks() as $block) {
            $block->saveToLetter($model, LetterBlock::POSITION_FOOTER);
        }

        $stocks = array();
        foreach ($data->getFooterStocks() as $stock) {
            $stocks[$stock->getName()] = $stock->getUrl();
        }
        $model->stocks = $stocks;


        foreach($data->getCatalogBlocks() as $block){
            $block->saveToLetter($model);
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


        $this->saveToModel($data, $model);

        return true;
    }
} 