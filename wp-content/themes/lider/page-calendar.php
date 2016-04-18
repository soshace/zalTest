<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/calendar.css"/>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/calendar_print_2.css"/>
    <body <?php body_class(); ?> >
    	<div class="wrapper">
    		<?php get_sidebar(); ?>
            <?php

                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $args = array(
                    'post_type' => 'calendar'
                  );
                  query_posts($args);
                  $col = 0;
                  ?>

                  <section class="section_t calendar"><div class="section_line_lr">
                          <a href="/calendar_print" target="blank" class="print">Версия для печати</a>
                        </div>
                        <div class="conteiner section_line_lr calendar_line_lr">
                        <div class="card_b">

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
          </div>
                  </div></section>

                  <section class="calendar section_tb">

          <?php

                  if (have_posts()) :


                    while (have_posts()) : the_post();
                      $col++;
                      global $wpdb;
                      $idDay = get_the_ID();
                      $val6 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='6:00'");
                      $selLineCLCount6 = count($val6);
                      $val7 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='7:00'");
                      $selLineCLCount7 = count($val7);
                      $val8 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='8:00'");
                      $selLineCLCount8 = count($val8);
                      $val9 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='9:00'");
                      $selLineCLCount9 = count($val9);
                      $val10 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='10:00'");
                      $selLineCLCount10 = count($val10);
                      $val11 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='11:00'");
                      $selLineCLCount11 = count($val11);
                      $val12 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='12:00'");
                      $selLineCLCount12 = count($val12);
                      $val13 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='13:00'");
                      $selLineCLCount13 = count($val13);
                      $val14 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='14:00'");
                      $selLineCLCount14 = count($val14);
                      $val15 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='15:00'");
                      $selLineCLCount15 = count($val15);
                      $val16 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='16:00'");
                      $selLineCLCount16 = count($val16);
                      $val17 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='17:00'");
                      $selLineCLCount17 = count($val17);
                      $val18 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='18:00'");
                      $selLineCLCount18 = count($val18);
                      $val19 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='19:00'");
                      $selLineCLCount19 = count($val19);
                      $val20 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='20:00'");
                      $selLineCLCount20 = count($val20);
                      $val21 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='21:00'");
                      $selLineCLCount21 = count($val21);
                      $val22 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='22:00'");
                      $selLineCLCount22 = count($val22);
                      $val23 = $wpdb->get_results("SELECT * FROM wp_calendar WHERE itemday= $idDay AND item_time='23:00'");
                      $selLineCLCount23 = count($val23);

                      if ($col == 1){ ?>
                        <div class="section_line_lr">';
                      <?php
                      }

                      ?>
                      <div class="block_float_l p33"><div class="card_t">
                          <div class="card_line_lr card_line_tb">
                              <h4><?php the_title(); ?></h4></div><ul class="card_line_lr">
                      <?php

                      if ($selLineCLCount6 != 0){
                          for ($iCLV=0; $iCLV < $selLineCLCount6; $iCLV++) {
                            $trenerIDuse = $val6[$iCLV]->item_treiner;
                            $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                            ?>
                            <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                            <span class="time">6:00</span>
                            <p class="description"><?php echo $val6[$iCLV]->item_content ?></p></li>
                            <?php
                          }
                      };
                      if ($selLineCLCount7 != 0){
                          for ($iCLV=0; $iCLV < $selLineCLCount7; $iCLV++) {
                            $trenerIDuse = $val7[$iCLV]->item_treiner;
                            $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                            ?>
                            <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                            <span class="time">7:00</span>
                            <p class="description"><?php echo $val7[$iCLV]->item_content ?></p></li>
                            <?php
                          }
                      };
                      if ($selLineCLCount8 != 0){
                          for ($iCLV=0; $iCLV < $selLineCLCount8; $iCLV++) {
                            $trenerIDuse = $val8[$iCLV]->item_treiner;
                            $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                            ?>
                            <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                            <span class="time">8:00</span>
                            <p class="description"><?php echo $val8[$iCLV]->item_content ?></p></li>
                            <?php
                          }
                      };
                      if ($selLineCLCount9 != 0){
                          for ($iCLV=0; $iCLV < $selLineCLCount9; $iCLV++) {
                            $trenerIDuse = $val9[$iCLV]->item_treiner;
                            $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                            ?>
                            <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                            <span class="time">9:00</span>
                            <p class="description"><?php echo $val9[$iCLV]->item_content ?></p></li>
                            <?php
                          }
                      };
                      if ($selLineCLCount10 != 0){
                          for ($iCLV=0; $iCLV < $selLineCLCount10; $iCLV++) {
                            $trenerIDuse = $val10[$iCLV]->item_treiner;
                            $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                            ?>
                            <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                            <span class="time">10:00</span>
                            <p class="description"><?php echo $val10[$iCLV]->item_content ?></p></li>
                            <?php
                          }
                      };
                      if ($selLineCLCount11 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount11; $iCLV++) {
                          $trenerIDuse = $val11[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">11:00</span>
                          <p class="description"><?php echo $val11[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount12 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount12; $iCLV++) {
                          $trenerIDuse = $val12[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">12:00</span>
                          <p class="description"><?php echo $val12[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount13 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount13; $iCLV++) {
                          $trenerIDuse = $val13[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">13:00</span>
                          <p class="description"><?php echo $val13[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount14 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount14; $iCLV++) {
                          $trenerIDuse = $val14[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">14:00</span>
                          <p class="description"><?php echo $val14[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount15 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount15; $iCLV++) {
                          $trenerIDuse = $val15[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">15:00</span>
                          <p class="description"><?php echo $val15[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount16 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount16; $iCLV++) {
                          $trenerIDuse = $val16[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">16:00</span>
                          <p class="description"><?php echo $val16[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount17 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount17; $iCLV++) {
                          $trenerIDuse = $val17[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">17:00</span>
                          <p class="description"><?php echo $val17[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount18 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount18; $iCLV++) {
                          $trenerIDuse = $val18[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">18:00</span>
                          <p class="description"><?php echo $val18[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount19 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount19; $iCLV++) {
                          $trenerIDuse = $val19[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">19:00</span>
                          <p class="description"><?php echo $val19[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount20 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount20; $iCLV++) {
                          $trenerIDuse = $val20[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">20:00</span>
                          <p class="description"><?php echo $val20[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount21 != 0){
                        for ($iCLV=0; $iCLV < $selLineCLCount21; $iCLV++) {
                          $trenerIDuse = $val21[$iCLV]->item_treiner;
                          $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                          ?>
                          <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                          <span class="time">21:00</span>
                          <p class="description"><?php echo $val21[$iCLV]->item_content ?></p></li>
                          <?php
                        }
                      };
                      if ($selLineCLCount22 != 0){
                          for ($iCLV=0; $iCLV < $selLineCLCount22; $iCLV++) {
                            $trenerIDuse = $val22[$iCLV]->item_treiner;
                            $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                            ?>
                            <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                            <span class="time">22:00</span>
                            <p class="description"><?php echo $val22[$iCLV]->item_content ?></p></li>
                            <?php
                          }
                      };
                      if ($selLineCLCount23 != 0){
                          for ($iCLV=0; $iCLV < $selLineCLCount23; $iCLV++) {
                            $trenerIDuse = $val23[$iCLV]->item_treiner;
                            $selLineCLcolorV = $wpdb->get_row("SELECT meta_value FROM wp_postmeta WHERE post_id = $trenerIDuse AND meta_key = 'color'");
                            ?>
                            <li class="card_line_tb time_line"><span style="background: <?php echo $selLineCLcolorV->meta_value ?>" class="marker"></span>
                            <span class="time">23:00</span>
                            <p class="description"><?php echo $val23[$iCLV]->item_content ?></p></li>
                            <?php
                          }
                      };
                      ?>

                      </ul></div></div>

                      <?php if ($col == 3){ ?>
                          </div>
                      <?php $col=0;
                      };

                    endwhile;
                  endif;



                    wpbeginner_numeric_posts_nav();

                    wp_reset_query();
                    wp_reset_postdata();

            ?>
        </section>
      </div>
      <?php get_footer(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#MenuButton").click(function(ev){
				$("#MobileMenu").slideToggle(300);
			});
		});
	</script>
</body>
</html>
