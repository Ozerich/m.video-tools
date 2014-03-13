<?php

class ImportBlockText extends ImportBlock
{
    private $text;

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    function saveToLetter($letter, $position = null)
    {
        if ($position == null) {
            throw new InvalidArgumentException();
        }

        $model = new LetterBlock();

        $model->position = $position;
        $model->letter_id = $letter->id;
        $model->type = LetterBlock::TYPE_TEXT;
        $model->text = $this->htmlToCode($this->getText());

        if (!$model->save()) {
            throw new ImportException("Ошибка сохранения текстового блока");
        }
    }
}