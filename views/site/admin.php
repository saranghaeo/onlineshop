<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="d-flex flex-column gap-5">
        <div class="d-flex flex-column">
            <h2>Списки</h2>
            <a href="?r=city/index">Город</a>
            <a href="?r=category/index">Категории товара</a>
            <a href="?r=currency/index">Валюты</a>
        </div>
        <div class="d-flex flex-column">
            <h2>Составные сущности</h2>
            <a href="?r=product/index">Продукт</a>
            <a href="?r=company/index">Компания</a>
            <a href="?r=manager-list/index">Список менеджеров</a>
        </div>
    </div>
</div>