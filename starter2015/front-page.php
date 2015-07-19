<?php $tpath = get_bloginfo('template_url').'/'; ?>
<?php get_header(); ?>

    <section id="slideshow">
        <div class="slide-desc">
          Стартеры и генераторы
          ремонт, продажа, комплектующие
          к импортным, отечественным
          Атомобилям и спецтехнике
        </div>
        <div class="slogan">
          Мы работаем для вас и вашего автомобиля!
        </div>
    </section>
	
    <section id="articles">
      <div class="left-col">
        <h3 class="mod-title">Статьи</h3>
        <a href="/" class="more">Все статьи</a>
        <div class="articles">
          <div class="article">
            <a href="/">Принцип работы стартера автомобиля</a>
            <div class="intro-text">
              Стартер представляет собой электромеханическое устройство. Это говорит о том, что принцип работы стартера заключается в использовании электрической энергии аккумулятора и преобразовании её в механическую.
            </div>
          </div>
          <div class="article">
            <a href="/">Десять «НЕ», которые могут привести к полному сгоранию стартера.</a>
            <div class="intro-text">
              Если нет необходимых знаний и опыта лучше не начинать самостоятельно ремонтировать стартер.
              • Нельзя держать стартер включенным дольше 15 секунд, даже если двигатель не завелся.
            </div>
          </div>
        </div>
      </div>
      <div class="right-col">
        <img src="<?php echo $tpath; ?>images/banner.jpg" alt="">
      </div>
    </section>
	
	
    <section id="products" class="products front-page">
      <h3 class="mod-title">Товары</h3>
      <a href="/" class="more">Все товары</a>
	  
		  <div class="filter">
			<form>
			
				<div class="field">
				  <label>Марка автомобиля:</label>
				  
				  <select name="mark" id="">
					<option value="all">Все марки</option>
					<option value="daewoo">Daewoo</option>
					<option value="hyundai">Hyundai</option>
					<option value="kia">Kia</option>
					<option value="mazda">Mazda	</option>
					<option value="mitsubishi">Mitsubishi</option>
					<option value="suzuki">Suzuki</option>
				  </select>
				  
				</div>
				
				<div class="field">
				  <label>Тип устройства:</label>
				  
				  <select name="type" id="">
					<option value="all">Все типы</option>
					<option value="starter">Стартер</option>
					<option value="generator">Генератор</option>
					<option value="other">Комплектующие</option>
				  </select>
				  
				</div>
				
				<div class="field">
				  <label>Состояние:</label>
				  
				  <label><input name="newold" type="radio" value="new" checked >Новое</label><label>/</label>
				  <label><input name="newold" type="radio" value="old">Б/У</label>
				  
				</div>
				
			</form>
		  </div>
	  
      <h3 class="cat-title">Стартеры</h3>
      <div class="list-products">
      </div>
	  <div class="loading"></div>
	</section>
	
	
    <section id="article">
      <h3 class="mod-title">Ремонт, продажа стартеров и генераторов  в Уфе и Республике Башкортостан</h3>
      <div class="intro-text">
        С момента основания, в 2003 году, основной задачей компании «СтартеР» является качественный  ремонт стартеров и генераторов любых моделей и любой сложности, продажа и установка.
         КОМПАНИЯ «СтартеР»  имеет безупречную репутацию на рынке уже более 12 лет,  и  является лидером в Уфе и Республики Башкортостан по ремонту стартеров и генераторов, для легковых, грузовых автомобилей, автобусов и специальной техники любых моделей отечественного и зарубежного производства.
        Мы работаем для вас и вашего автомобиля!
        Компания «СтартеР» предлагает следующие виды услуг:
        <ul>
          <li>Ремонт агрегатов любых моделей и любой сложности.</li>
          <li>Снятие и установка стартера и/или генератора.</li>
          <li>Диагностика на новейшем европейском оборудовании.</li>
          <li>Реставрация старых агрегатов.</li>
          <li>Заказ комплектующих  для любой модели агрегата и автомобиля.</li>
          <li>Продажа новых и отремонтированных агрегатов и комплектующих по доступным ценам.</li>
        </ul>
        На любой, отремонтированный нами агрегат, выдается гарантия. На нашем сайте есть вся информация о замене стартеров и генераторов, их ремонте, покупке. Позвонив нам, наши менеджеры дадут вам полную консультацию с исчерпывающей информацией.
      </div>
    </section>

<div class="over">
	<div class="form">
		<button class="btn close">× закрыть </button>

		<?php echo do_shortcode('[contact-form-7 id="233" title="Без названия"]'); ?>
	</div>

</div>
	
	
<?php get_footer(); ?>
