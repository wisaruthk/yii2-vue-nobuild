<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        

        <p class="lead">Yii2 with Vue3 - no build</p>
        <p class="lead">Use CDN and javascript module</p>

      
    </div>

    <div class="body-content">

        <div class="row">
            <ul>
                <li><a href="/vue/user">user</a> ตัวอย่างดึงข้อมูลจาก ajax การใช้  v-data-table-server</li>
                <li><a href="/vue/ropa">ropa</a> ตัวอย่างการใช้ component</li>
                <li><a href="/vue/modal-with-transitions">Modal with Transitions</a> ตัวอย่างการทำ Modal การใช้ template</li>
                <li><a href="/vue/vuetify">Vuetify</a> ตัวอย่างการดึง vuetify มาใช้ / การ Initial Resource ด้วย PHP Yii</li>
                <li><a href="/vue/vuetify-dialog">Vuetify Dialog</a> ตัวอย่างการใช้ component Dialog Vuetify</li>
                <li><a href="/vue/vuetify-dialog-importmap">Vuetify Dialog Importmap</a> ตัวอย่างการ import js แบบ Import Map</li>
                <li><a href="/vue/vuetify-dialog-template">Vuetify Dialog Template</a> ตัวอย่างการใช้ template</li>
                <li><a href="/vue/router">Router</a> ตัวอย่างยการใช้ Router</li>
                <li><a href="/vue/vuex">Vuex</a> ตัวอย่างยการใช้ Vuex</li>
                <li><a href="/vue/vuex-fetch">Vuex Fetch</a> ตัวอย่างยการใช้ Vuex ร่วมกับการ fetch data จาก backend</li>
                <li><a href="/service/default/index">แยกเขียน JS ใน Module แบบ 1</a> ใช้ Asset Bundle ในการแยก JS ไว้ใน Module</li>
                <li><a href="/service/default/app">แยกเขียน JS ใน Module แบบ 2 (แนะนำ)</a> แยก js ตั้งแต่การสร้าง createVue เลย ทำให้ import component ได้ง่ายขึ้น</li>
            </ul>
        </div>

    </div>
</div>
