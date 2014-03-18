<? /* @var $letter Letter */ ?>

<? $this->layout = 'none'; ?>

<? HtmlHelper::construct($letter->reff, $letter->images_url); ?>

<? $this->renderPartial('/letter/header', array('letter' => $letter, 'encoding' => !isset($encoding) ? 'UTF-8' : $encoding)); ?>
<? $this->renderPartial('/letter/catalog', array('letter' => $letter)); ?>
<? $this->renderPartial('/letter/footer', array('letter' => $letter, 'reff' => $letter->reff)); ?>