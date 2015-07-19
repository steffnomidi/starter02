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
	
    <section id="article">
	
      <h3 class="mod-title"><?php the_title(); the_post(); ?></h3>
      
	  <div class="intro-text">
        <?php the_content(); ?>
      </div>
	  
    </section>


<?php get_footer(); ?>