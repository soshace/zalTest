<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" />
	<?php
		wp_head();
	?>
  	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/60em/fonts.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/calendar_print_2.css"/>
    <body <?php body_class(); ?> >
			<table cellspacing="0" cellpadding="0">
					<tbody><tr>
							<td rowspan="2" &nbsp;<="" td="">
							</td><td colspan="7"><h2>Расписание занятий</h2></td>
					</tr>
					<tr>
							<td class="vertMid">Понедельник</td>
							<td class="vertMid">Вторник</td>
							<td class="vertMid">Среда</td>
							<td class="vertMid">Четверг</td>
							<td class="vertMid">Пятница</td>
							<td class="vertMid">Суббота</td>
							<td class="vertMid">Воскресенье</td>
					</tr>
					<?php
if (have_posts()) :
	for ($timeTable=6; $timeTable <=23 ; $timeTable++) {
		global $wpdb;
		$timeTableText = $timeTable .':00';

		$valN = $wpdb->get_results("SELECT * FROM wp_calendar WHERE item_time = '$timeTableText'");
		// var_dump($valN);
		$selLineCLCountN = count($valN);
			if ($selLineCLCountN != 0){
				?>
				<tr><td class="vertMid"><b><?php echo $timeTableText ?></b></td>
					<td>
							<ul>
				<?php
				for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {
					// echo $timeTableText;
					$trenerIDuse = $valN[$iCLV]->item_treiner;
					$selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
					$idday = $valN[$iCLV]->itemday;
					$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
					if ($idday->post_title == 'Понедельник'){
						?>
								<li style="background: <?php echo $selLineCLcolorV->meta_value ?>">
									<?php echo $valN[$iCLV]->item_content ?>
								</li>
						<?php
						}
					}

					?>
								</ul>
						</td>
						<td>
								<ul>
					<?php
					for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {

						$trenerIDuse = $valN[$iCLV]->item_treiner;
						$selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
						$idday = $valN[$iCLV]->itemday;
						$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
						if ($idday->post_title == 'Вторник'){
							?>
									<li style="background: <?php echo $selLineCLcolorV->meta_value ?>">
										<?php echo $valN[$iCLV]->item_content ?>
									</li>
							<?php
							}
						}

						?>
									</ul>
							</td>
							<td>
									<ul>
						<?php
						for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {

							$trenerIDuse = $valN[$iCLV]->item_treiner;
							$selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
							$idday = $valN[$iCLV]->itemday;
							$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
							if ($idday->post_title == 'Среда'){
								?>
										<li style="background: <?php echo $selLineCLcolorV->meta_value ?>">
											<?php echo $valN[$iCLV]->item_content ?>
										</li>
								<?php
								}
							}

							?>
										</ul>
								</td>
								<td>
										<ul>
							<?php
							for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {

								$trenerIDuse = $valN[$iCLV]->item_treiner;
								$selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
								$idday = $valN[$iCLV]->itemday;
								$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
								if ($idday->post_title == 'Четверг'){
									?>
											<li style="background: <?php echo $selLineCLcolorV->meta_value ?>">
												<?php echo $valN[$iCLV]->item_content ?>
											</li>
									<?php
									}
								}

								?>
											</ul>
									</td>
									<td>
											<ul>
								<?php
								for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {

									$trenerIDuse = $valN[$iCLV]->item_treiner;
									$selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
									$idday = $valN[$iCLV]->itemday;
									$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
									if ($idday->post_title == 'Пятница'){
										?>
												<li style="background: <?php echo $selLineCLcolorV->meta_value ?>">
													<?php echo $valN[$iCLV]->item_content ?>
												</li>
										<?php
										}
									}

									?>
												</ul>
										</td>
										<td>
												<ul>
									<?php
									for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {

										$trenerIDuse = $valN[$iCLV]->item_treiner;
										$selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
										$idday = $valN[$iCLV]->itemday;
										$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
										if ($idday->post_title == 'Суббота'){
											?>
													<li style="background: <?php echo $selLineCLcolorV->meta_value ?>">
														<?php echo $valN[$iCLV]->item_content ?>
													</li>
											<?php
											}
										}

										?>
													</ul>
											</td>
											<td>
													<ul>
										<?php
										for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {

											$trenerIDuse = $valN[$iCLV]->item_treiner;
											$selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
											$idday = $valN[$iCLV]->itemday;
											$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
											if ($idday->post_title == 'Воскресенье'){
												?>
														<li style="background: <?php echo $selLineCLcolorV->meta_value ?>">
															<?php echo $valN[$iCLV]->item_content ?>
														</li>
												<?php
												}
											}

											?>
														</ul>
												</td>

					</tr>
					<?php
			}
			}
		endif;

		?>

</tbody>
</table>
  </body>
</html>
