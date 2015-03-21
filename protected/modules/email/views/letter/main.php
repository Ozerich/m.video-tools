<? /* @var Letter $letter */ ?>
<? /* @var string $region */ ?>

<? $this->layout = 'none'; ?>

<? HtmlHelper::construct($letter->reff, isset($region) ? $region : null, $letter->images_url, $letter->utm_campaign); ?>

<? $this->renderPartial('/letter/header', array('letter' => $letter, 'encoding' => !isset($encoding) ? 'UTF-8' : $encoding)); ?>
<? $this->renderPartial('/letter/catalog', array('letter' => $letter)); ?>
<? $this->renderPartial('/letter/footer', array('letter' => $letter, 'reff' => $letter->reff)); ?>