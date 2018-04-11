<?php
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>用户名</label>: <?= Html::encode($entryForm->name) ?></li>
    <li><label>邮箱</label>: <?= Html::encode($entryForm->email) ?></li>
</ul>