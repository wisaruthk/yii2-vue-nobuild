<?php 
use yii\web\AssetManager;
use app\modules\service\assets\ServiceAppAsset;

use app\assets\VueAsset;

VueAsset::register($this);
// อัดเข้ามาตั้งแต่ vue main เลย
ServiceAppAsset::register($this);

?>
<div class="service-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>

<div class="site-index">
    <div id="app">
        <service-header :title="myTitle"></service-header>
    </div>
</div>
<span>พอใช้ได้ ไม่ต้องมา load แยกทีละ component</span>