<template>

    <h2 class="competencies-header">Исследование, дизайн и<br> разработка в одном</h2>

    <div class="competencies">
        <div class="competence">
            <div>
                <h3>Исследование продукта</h3>
                <p>Находим точки роста бизнеса, строя и анализируя множество гипотез</p>
            </div>
            <img src="@/assets/images/competencies/product-research.svg" alt="Исследование продукта">
        </div>
        <div class="competence">
            <div>
                <h3>Создание продукта</h3>
                <p>Разрабатываем любые цифровые сервисы от идеи до готового продукта</p>
            </div>
            <img src="@/assets/images/competencies/product-create.svg" alt="Создание продукта">

        </div>
        <div class="competence">
            <div>
                <h3>Поддержка и развитие</h3>
                <p>Совершенствуем продукт на основе полученного опыта и сутуации на рынке</p>
            </div>
            <img src="@/assets/images/competencies/product-support-and-development.svg" alt="Поддержка и развитие">

        </div>
        <div class="competence">
            <div>
                <h3>Визуальная коммуникация</h3>
                <p>Создаем запоминающиеся визуальные образы со смыслом</p>
            </div>

            <img src="@/assets/images/competencies/visual-communication.svg" alt="Визуальная коммуникация">
        </div>
        <div class="competence">
            <div>
                <h3>Цифровизация бизнеса</h3>
                <p>Оптимизируем бизнес-процессы, внедряя цифровые технологий</p>
            </div>
            <img src="@/assets/images/competencies/digitalization.svg" alt="Цифровизация бизнеса">

        </div>
        <div class="competence">
            <div>
                <h3>Аутстаффинг специалистов</h3>
                <p>Предоставляем IT-специалистов под конкретные задачи</p>
            </div>
            <img src="@/assets/images/competencies/outstaffing-of-business.svg" alt="Аутстаффинг специалистов">

        </div>
    </div>
</template>

<style lang="scss" scoped>
.competencies-header {
    color:white;
    font-size:max(4vw,20px);
    margin-bottom:50px;
    margin-top:50px;
}

.competencies {
    display: flex;
    flex-flow: row wrap;
    gap: 11px;
    row-gap: 74px;
    justify-content:space-between;

    & .competence {
        position: relative;
        display: flex;
        flex-flow: row;
        width: 20vw;
        background: #191919;
        padding: 20px;
        justify-content:center;
        border-radius: 15px;

        & div {
            display: flex;
            gap: 19px;
            flex-flow: column wrap;

            & h3 {
                font-size: 1.8vw; //19.2px = 1vw
            }

            & p {
                font-size: 1vw;
                font-weight: 100;
                margin-bottom: 35px;
            }

        }

        & img {
            width: 4.63vw; // 19.2px = 1vw;
            height: 4.63vw;

            position: relative;
            top: -50px;
        }
    }

    @media screen and (max-width:500px){
        .competence{
            width:100%;
            & h3{
                font-size:6vw!important;
            }

            & p{
                font-size:5vw!important;
            }

            & img{
                width:89px;
                height:89px;
            }
        }
    }
}



.competencies * {
    color: white;
}
</style>
