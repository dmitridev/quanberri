<template>
    <div class="form-wrapper">
        <div class="form-for-project-start">
            <header>
                <h2></h2>
                <button @click="model = false"><img src="@/assets/images/buttons/button-close.svg"></button>
            </header>
            <form class="form-style" name="form-for-project-start" ref="form_ref">
                <div class="form-submitted-message">
                    <img src="@/assets/images/statuses/submit-success.svg">
                    <p>Форма заявки успешно <span style="color:yellow">заполнена</span></p>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
</script>