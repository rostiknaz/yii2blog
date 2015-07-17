<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\blog\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?foreach ($posts as $arr) { ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="<?echo $arr->img?>">
            <div class="caption">
                <h3><?echo $arr->title?></h3>
                <p><?echo $arr->description?></p>
                <p><a href="/blog/default/view?id=<?echo $arr->id?>" class = "btn btn-primary" role = "button">Посмотреть </a></p>
            </div>    
        </div>
    </div>
    <? } ?>
</div>
<? echo \yii\widgets\LinkPager::widget([
    'pagination'=> $pages,
    ]);
?>