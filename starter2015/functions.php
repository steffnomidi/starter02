<?php
$tpath = get_bloginfo('template_directory').'/'; // путь к теме

/* подключаем файлы */
function enqueue_style() { global $tpath;
	wp_enqueue_style( 'style', $tpath.'css/style.css', false ); 
}

function enqueue_script() { global $tpath;
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'script', $tpath.'js/scripts.js', false );
}

add_action( 'wp_enqueue_scripts', 'enqueue_style' );
add_action( 'wp_enqueue_scripts', 'enqueue_script' );

/* Разрешаим использовать картинки */
add_theme_support( 'post-thumbnails' );

/* Регистрируем тип и таксономию для товара */
// Register Custom Post Type
function product_custom_type() {

	$labels = array(
		'name'                => 'Продукция',
		'singular_name'       => 'Продукт',
		'menu_name'           => 'Продукция',
		'name_admin_bar'      => 'Продукт',
		'parent_item_colon'   => 'Parent Item:',
		'all_items'           => 'Вся продукция',
		'add_new_item'        => 'Добавить новый продукт',
		'add_new'             => 'Добавить продукт',
		'new_item'            => 'Новый продукт',
		'edit_item'           => 'Изменить продукт',
		'update_item'         => 'Обновить продукт',
		'view_item'           => 'Промотреть продукт',
		'search_items'        => 'Найти продукт',
		'not_found'           => 'Не найдено',
		'not_found_in_trash'  => 'Не найдено в корзине',
	);
	$args = array(
		'label'               => 'product',
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'product', $args );

}

// Hook into the 'init' action
add_action( 'init', 'product_custom_type', 0 );

// Register Custom Taxonomy
function custom_taxonomy_product() {

	$labels = array(
		'name'                       => 'Марка автомобиля',
		'singular_name'              => 'Марка автомобиля',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'auto_mark', array( 'product' ), $args );


	$labels = array(
		'name'                       => 'Тип устройства',
		'singular_name'              => 'Тип устройства',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'block_type', array( 'product' ), $args );


	$labels = array(
		'name'                       => 'Состояние',
		'singular_name'              => 'Состояние',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'health', array( 'product' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy_product', 0 );


/*******************************************************/
/*                                                     */
/*     Функция ajax для формирования списка товаров    */
/*                                                     */
/*******************************************************/

add_action( 'wp_ajax_products_list', 'prefix_ajax_products_list' );
add_action( 'wp_ajax_nopriv_products_list', 'prefix_ajax_products_list' );

function prefix_ajax_products_list() {
    global $tpath;
	$out=''; $ajax_query = $_POST['data'];
	$get=$_POST['data']['get'];
	/* 
	$ajax_query [
		get:
		mark: 
		newold: 
		type: 
		]
	*/
	if ( $ajax_query['mark'] !='all' ) {
		$tax_query_mark = array(
				'taxonomy' => 'auto_mark',
				'field'    => 'slug',
				'terms'    => $ajax_query['mark']
				);
	}
	
	if ( $ajax_query['newold'] ) {
		$tax_query_newold = array(
				'taxonomy' => 'health',
				'field'    => 'slug',
				'terms'    => $ajax_query['newold']
				);
	}
	
	if ( $ajax_query['type'] !='all' ) {
		$tax_query_type = array(
				'taxonomy' => 'block_type',
				'field'    => 'slug',
				'terms'    => $ajax_query['type']
				);
	}
	
	
	$query = array(
		'posts_per_page' => $get,
		'post_type' => 'product',
		'tax_query' => array(
			$tax_query_mark,
			$tax_query_newold,
			$tax_query_type
		)
	);
	
	//echo '<pre>' . print_r($query,true) . '</pre>'; //control
	
	$posts = get_posts ($query);
	//echo '<pre>' . print_r($posts[0],true) . '</pre>'; //control

	
	/*echo '  
        <div class="product">
          <div class="product-img">
            <img src="'.$tpath.'images/product1.jpg" alt="">
          </div>
          <div class="product-info">
            <a href="">
              Стартер Hyundai Santa Fe 2.7l Kia Sportage 2.7l
            </a>
            <div class="desc">
              <div class="desc-line">12V, 120Amp </div>
              <div class="desc-line">б/у</div>
              <div class="desc-line">цена 13500 руб</div>
              <div class="desc-line">(гарантия 3 месяца)</div>
            </div>
            <button class="order">Заказать</button>
          </div>
        </div>
	';
	*/
	if ($posts):
	foreach ($posts as $post):
	
		?>  
			<div class="product">
			  <div class="product-img">
				<?php echo get_the_post_thumbnail($post->ID); ?>
			  </div>
			  <div class="product-info">
				<a href="">
				  <?php echo $post->post_title; ?>
				</a>
				<div class="desc">
				  <?php echo $post->post_content; ?>
				</div>
				<button class="order" data-id="<?php echo $post->ID ?>" data-name="<?php echo $post->post_title; ?>" >Заказать</button>
				<?php if ( current_user_can( 'manage_options' ) ) {?>
				<a class="" href="<?php bloginfo('url') ?>/wp-admin/post.php?post=<?php echo $post->ID ?>&action=edit" >Изменить</a>
				<?php } ?>
			  </div>
			</div>
		<?php
	
	endforeach;
	else: echo '<br /><br /> <h3>Устройств с такими параметрами не найдено</h3><br /><br />';
	endif;

	die;
}

/* генерим адрес ajax-сервиса WP */
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
	?>
		<script type="text/javascript">
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var tpath = '<?php echo $tpath; ?>';
		</script>
	<?php
}














