<?php

use OSM\Core\Collections\ChampionshipCollection;
use OSM\Core\Collections\CountryCollection;
use OSM\Frontend\Helpers\Html;
use OSM\Frontend\Modules\Site\ViewModels\RegistrationViewModel;
use OSM\Frontend\Templates\LayoutTypes;

$this->layout(LayoutTypes::TYPE_DEFAULT_OUTSIDE);

/** @var CountryCollection $countries */
/** @var ChampionshipCollection $championships */
/** @var RegistrationViewModel $model */

?>
<form method="post" action="/register">
    <?= Html::inputText('username', $model->username) ?>
    <?= Html::inputText('team_name', $model->teamName) ?>
    <?= Html::submitButton('Register') ?>
</form>
