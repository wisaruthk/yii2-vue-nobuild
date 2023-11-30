<?php 
use yii\web\AssetManager;
use app\modules\service\assets\ServiceAsset;
use app\assets\VueAsset;

VueAsset::register($this);
$bundle = ServiceAsset::register($this);
// ไม่ดี load js 2 รอบ ไม่สามารถหา url ของ asset ได้จนกว่าจะ regsiter
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
<span>ไม่ดีตรงที่ต้องอัด PHP เข้าไปใน JS Script</span>
<script type="module">
    const { createApp } = Vue
    const { createVuetify } = Vuetify
    import ServiceHeader from '<?=$bundle->baseUrl.'/vuejs/ServiceHeader.js'?>'

    const vuetify = createVuetify()
    
    const app = createApp({
        components: {
            ServiceHeader
        },
        data: () => ({
            myTitle: 'Hello'
        })
    })
    
    app.use(vuetify).mount('#app')
</script>