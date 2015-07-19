<?php $tpath = get_bloginfo('template_url').'/'; ?>
<?php get_header(); ?>

	<nav>
		<div id="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
		</div>
	</nav>
	
    <section id="products" class="products">
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

<?php get_footer(); ?>
