	<section id="MobileMenu"  class="section menu_mobile">
		<?php wp_nav_menu( array( 'container' => 'div', 'container_class' => 'section_line', 'menu_class' => '') ); ?>
	</section>
	<section class="header section">
		<div class="section_line_lr desktop">
			<a href="/" class="logo"></a>
			<div class="text">

				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
						'post_type' => 'phones',
						'paged' => $paged,
						'has_archive' => true
					);
					query_posts($args);


					if (have_posts()) :

						while (have_posts()) : the_post();
						$mobPhone = get_field( "mobPhone" );
						$workphone = get_field( "workphone" );
						$vklider = get_field( "vklider" );
						?>
						<p class="phone"><?php echo $mobPhone ?> / <?php echo $workphone ?></p>
						<p class="description">Центр культуры тела "Лидер"</p>
						</div>
						<ul class="social">
							<li>
								<a href="<?php echo $vklider ?>" class="vk"></a>
							</li>
						</ul>
						<?php
						endwhile;
					endif;
					?>

			<?php wp_nav_menu( array( 'container' => '', 'menu_class' => '') ); ?>
		</div>

		<div class="section_line_lr mobile">
			<a href="/index.html" class="logo"></a>
			<ul>
				<li><a href="javascript:void(0)" id="MenuButton" class="menu"></a></li>
			</ul>
		</div>
	</section>
