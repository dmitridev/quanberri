<template>
  <div class="white-background">
    <div class="container">
      <div class="advantages">
        <h2>В чём мы особенно хороши</h2>
        <div class="advantages-list">
          <div class="advantage">
            <p class="number">01</p>
            <p class="text">
              Строим цифровой продукт и производство: команду, процессы и
              технологии с нуля, передаём клиенту по достижении KPI
            </p>
          </div>
          <div class="advantage">
            <p class="number">02</p>
            <p class="text">
              Ищем и проверяем продуктовые гипотезы, запускаем цифровые продукты
              и масштабируем их на рынок
            </p>
          </div>
          <div class="advantage">
            <p class="number">03</p>
            <p class="text">
              Находим точки роста для текущих цифровых продуктов и команд,
              разрабатываем стратегию развития и помогаем ее реализовывать
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.advantages h2 {
  padding-top: 120px;
  padding-bottom: 80px;
  font-size: var(--advantages__header--font-size);
}

.advantages-list {
  display: flex;
  gap: 142px;
  padding-bottom: 120px;
}

.advantage {
  display: flex;
  flex-direction: column;
  gap: 64px;
}

.advantage .number {
  font-size: var(--advantages__advantage__number--font-size);
}

.advantage .text {
  font-size: var(--advantages__advantage__text--font-size);
  line-height:1.8em;
}

@media screen and (max-width: 1280px) {
  .advantages h2 {
    padding-top: 76px;
    padding-bottom: 108px;
  }
}

@media screen and (max-width: 768px){
  .advantages h2{
    padding-top: 63px;
    padding-bottom: 56px;
  }
}

@media screen and (max-width:414px){
  .advantages h2{
    padding-top:50px;
    padding-bottom:35px;
  }
}

@media screen and (max-width:360px){
  .advantages h2{
    padding-top:50px;
    padding-bottom:35px;
  }
}
</style>