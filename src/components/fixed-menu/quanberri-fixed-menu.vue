<template>
    <div class="site-menu-container">
        <div class="site-menu">
            <div class="icon">
                <img src="@/assets/images/fixed-menu/qb-fixed-menu-icon.png">
            </div>
            <div class="menu">
                <a class="menu-block">
                    Проекты
                </a>
                <a class="menu-block">
                    Команда
                </a>
                <a class="menu-block">
                    Контакты
                </a>
            </div>
        </div>
    </div>
</template>

<script setup></script>

<style scoped>
.site-menu-container {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.site-menu {
    position: fixed;
    bottom: 30px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 420px;
    height: 75px;
    background: #1b1b1b;
    border-radius: 8px;
    gap: 36px;
    z-index: 999999;
    opacity: 0.8;
}

.site-menu .icon {
    cursor: pointer;
    padding: 10px;
}

.site-menu .menu {
    background: #3e3e3e;
    border-radius: 8px;
    display: flex;
    justify-content: space-between;
    gap: 5px;
    height: 60px;
    display: flex;
    align-items: center;
    padding: 10px;
}

.site-menu .menu-block {
    display: block;
    padding: 13px 8px;
    width: 87px;
    height: 48px;
    cursor: pointer;
    border-radius: 8px;
    border: 1px solid #4e4e4e;
    font-size: 13px;
    display: flex;
    justify-content: center;
    align-items: center;
    color:var(--font-color);
}

.site-menu .menu-block:hover {
    border: 1px solid white;
}

.site-menu img {
    width: 60px;
    border-radius: 8px;
}
</style>