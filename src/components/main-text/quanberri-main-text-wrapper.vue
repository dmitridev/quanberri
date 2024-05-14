<template>
    <div class="main-text__wrapper">
        <slot></slot>
    </div>
</template>

<style>
    .main-text__wrapper{
        padding-top:150px;
    }

    @media screen and (max-width:1280px) {
        .main-text__wrapper{
            padding-top:107px;
        }
    }

    @media screen and (max-width:768px){
        .main-text__wrapper{
            padding-top:79px;
        }
    }

    @media screen and(max-width:414px){
        .main-text__wrapper{
            padding-top:90px;
        }
    }

    @media screen and(max-width:361px){
        .main-text__wrapper{
            padding-top:40px;
        }
    }
</style>