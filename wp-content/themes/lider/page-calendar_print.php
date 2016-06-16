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
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
    <body <?php body_class(); ?> >
			<table cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
								<td rowspan="2" &nbsp;</td>
								<td colspan="7"><h2>Расписание занятий</h2></td>
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
		$valN = $wpdb->get_results("SELECT wp_postmeta.meta_value,wp_calendar.item_content, wp_calendar.item_treiner, wp_calendar.itemday FROM wp_calendar INNER JOIN wp_postmeta ON wp_calendar.item_treiner=wp_postmeta.post_id AND wp_postmeta.meta_key = 'color' AND wp_calendar.item_time = '$timeTableText'");
		$selLineCLCountN = count($valN);
			if ($selLineCLCountN != 0){
				?>
				<tr><td class="vertMid"><b><?php echo $timeTableText ?></b></td>

					<td class="colorList">
							<ul>
				<?php
				for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {
					$idday = $valN[$iCLV]->itemday;
					$idday = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
					if ($idday->post_title == 'Понедельник'){
						?>
								<li style="background: <?php echo $valN[$iCLV]->meta_value ?>">
									<?php echo $valN[$iCLV]->item_content ?>
								</li>
						<?php
						}
					}

					?>
								</ul>
						</td>
						<td class="colorList">
								<ul>
					<?php
					for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {
						$idday = $valN[$iCLV]->itemday;
						$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
						if ($idday->post_title == 'Вторник'){
							?>
									<li style="background: <?php echo $valN[$iCLV]->meta_value ?>">
										<?php echo $valN[$iCLV]->item_content ?>
									</li>
							<?php
							}
						}

						?>
									</ul>
							</td>
							<td class="colorList">
									<ul>
						<?php
						for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {
							$idday = $valN[$iCLV]->itemday;
							$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
							if ($idday->post_title == 'Среда'){
								?>
										<li style="background: <?php echo $valN[$iCLV]->meta_value ?>">
											<?php echo $valN[$iCLV]->item_content ?>
										</li>
								<?php
								}
							}

							?>
										</ul>
								</td>
								<td class="colorList">
										<ul>
							<?php
							for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {
								$idday = $valN[$iCLV]->itemday;
								$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
								if ($idday->post_title == 'Четверг'){
									?>
											<li style="background: <?php echo $valN[$iCLV]->meta_value ?>">
												<?php echo $valN[$iCLV]->item_content ?>
											</li>
									<?php
									}
								}

								?>
											</ul>
									</td>
									<td class="colorList">
											<ul>
								<?php
								for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {
									$idday = $valN[$iCLV]->itemday;
									$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
									if ($idday->post_title == 'Пятница'){
										?>
												<li style="background: <?php echo $valN[$iCLV]->meta_value ?>">
													<?php echo $valN[$iCLV]->item_content ?>
												</li>
										<?php
										}
									}

									?>
												</ul>
										</td>
										<td class="colorList">
												<ul>
									<?php
									for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {
										$idday = $valN[$iCLV]->itemday;
										$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
										if ($idday->post_title == 'Суббота'){
											?>
													<li style="background: <?php echo $valN[$iCLV]->meta_value ?>">
														<?php echo $valN[$iCLV]->item_content ?>
													</li>
											<?php
											}
										}

										?>
													</ul>
											</td>
											<td class="colorList">
													<ul>
										<?php
										for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {
											$idday = $valN[$iCLV]->itemday;
											$idday  = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE ID = $idday");
											if ($idday->post_title == 'Воскресенье'){
												?>
														<li style="background: <?php echo $valN[$iCLV]->meta_value ?>">
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
<script type="text/javascript">
	$(document).ready(function() {
		$( "td.colorList" ).each(function( index ) {
			var liLast = $(this).find("li:last");
			if (liLast) {
				var liLastBg = liLast.css("background-color");
				$(this).css("background-color", liLastBg);
			}
		});
	});
</script>
  </body>
</html>
