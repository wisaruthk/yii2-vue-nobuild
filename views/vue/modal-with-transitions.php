<?php

/* @var $this yii\web\View */

$this->title = 'PDPA - ROPA : Record of Activities';
?>
<?php
    $apps = @Yii::$app->params['app_shortcuts'];
?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<div class="site-index">
    <div id="app">
    <button id="show-modal" @click="showModal = true">Show Modal</button>

    <teleport to="body">
        <!-- use the modal component, pass in the prop -->
        <modal :show="showModal" @close="showModal = false">
        <template #header>
            <h3>custom header</h3>
        </template>
        </modal>
    </teleport>
    </div>
</div>

<template id="modal-template">
    <transition name="modal">
        <div v-if="show" class="modal-mask">
            <div class="modal-container">
            <div class="modal-header">
                <slot name="header">default header</slot>
            </div>

            <div class="modal-body">
                <slot name="body">default body</slot>
            </div>

            <div class="modal-footer">
                <slot name="footer">
                default footer
                <button class="modal-default-button" @click="$emit('close')">
                    OK
                </button>
                </slot>
            </div>
            </div>
        </div>
    </transition>
</template>

<script type="module">
    const { createApp } = Vue
    import Modal from '/vue-modules/Modal.js'

    createApp({
        components: {
            Modal
        },
        data() {
            return {
                showModal: false
            }
        }
    }).mount('#app')
</script>

<style>
    .modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    transition: opacity 0.3s ease;
    }

    .modal-container {
    width: 300px;
    margin: auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    }

    .modal-header h3 {
    margin-top: 0;
    color: #42b983;
    }

    .modal-body {
    margin: 20px 0;
    }

    .modal-default-button {
    float: right;
    }

    /*
    * The following styles are auto-applied to elements with
    * transition="modal" when their visibility is toggled
    * by Vue.js.
    *
    * You can easily play with the modal transition by editing
    * these styles.
    */

    .modal-enter-from {
    opacity: 0;
    }

    .modal-leave-to {
    opacity: 0;
    }

    .modal-enter-from .modal-container,
    .modal-leave-to .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    }
</style>