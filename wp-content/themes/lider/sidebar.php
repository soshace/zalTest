	<section id="MobileMenu"  class="section menu_mobile">
		<?php wp_nav_menu( array( 'container' => 'div', 'container_class' => 'section_line', 'menu_class' => '') ); ?>
	</section>
	<section class="header section">
		<div class="section_line_lr desktop">
			<a href="/" class="logo"></a>
			<div class="text">

				<p class="phone">+7 (921) 318-25-20 / 7-27-47</p>
				<p class="description">Центр культуры тела "Лидер"</p>
			</div>
			<ul class="social">
				<li>
					<a href="#" class="vk"></a>
				</li>
			</ul>
			<?php wp_nav_menu( array( 'container' => '', 'menu_class' => '') ); ?>
		</div>

		<div class="section_line_lr mobile">
			<a href="/index.html" class="logo"></a>
			<ul>
				<li><a href="javascript:void(0)" id="MenuButton" class="menu"></a></li>
			</ul>
		</div>
	</section>
