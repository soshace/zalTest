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
            <?php

                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $args = array(
                    'post_type' => 'calendar'
                  );
                  query_posts($args);

                  $val10 = array();
                  $val11 = array();
                  $val12 = array();
                  $val15 = array();
                  $val16 = array();
                  $val17 = array();
                  $val17_1 = array();
                  $val18 = array();
                  $val18_1 = array();;
                  $val19 = array();
                  $val19_1 = array();
                  $val19_2 = array();
                  $val20 = array();
                  $val20_1 = array();
                  $val20_2 = array();
                  $val21 = array();

                  if (have_posts()) :

                    while (have_posts()) : the_post();
                      array_push($val10, get_field( "t10" ));
                      array_push($val11, get_field( "11:00" ));
                      array_push($val12, get_field( "12:00" ));
                      array_push($val15, get_field( "15:00" ));
                      array_push($val16, get_field( "16:00" ));
                      array_push($val17, get_field( "17:00" ));
                      array_push($val17_1, get_field( "17:00(1)" ));
                      array_push($val18, get_field( "18:00" ));
                      array_push($val18_1, get_field( "18:00(1)" ));
                      array_push($val19, get_field( "19:00" ));
                      array_push($val19_1, get_field( "19:00(1)" ));
                      array_push($val19_2, get_field( "19:00(2)" ));
                      array_push($val20, get_field( "20:00" ));
                      array_push($val20_1, get_field( "20:00(1)" ));
                      array_push($val20_2, get_field( "20:00(2)" ));
                      array_push($val21, get_field( "21:00" ));
                    endwhile;
                  endif;

            ?>

            <table cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td rowspan="2" &nbsp;<="" td="">
                    </td><td colspan="7"><h2>Расписание занятий</h2></td>
                </tr>
                <tr>
                    <td>Понедельник</td>
                    <td>Вторник</td>
                    <td>Среда</td>
                    <td>Четверг</td>
                    <td>Пятница</td>
                    <td>Суббота</td>
                    <td>Воскресенье</td>
                </tr>
                <tr>
                    <td><b>10:00</b></td>
                    <td>
                        <ul>
                            <?php if($val10[0]){?>
                              <li>
                                <?php echo $val10[0]; ?>
                              </li>
                            <?php }?>
                        </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val10[1]){?>
                          <li>
                            <?php echo $val10[1]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val10[2]){?>
                          <li>
                            <?php echo $val10[2]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val10[3]){?>
                          <li>
                            <?php echo $val10[3]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val10[4]){?>
                          <li>
                            <?php echo $val10[4]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val10[5]){?>
                          <li>
                            <?php echo $val10[5]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val10[6]){?>
                          <li>
                            <?php echo $val10[6]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                </tr>
                <tr>
                  <td><b>11:00</b></td>
                  <td>
                      <ul>
                          <?php if($val11[0]){?>
                            <li>
                              <?php echo $val11[0]; ?>
                            </li>
                          <?php }?>
                      </ul>
                  </td>
                  <td>
                    <ul>
                      <?php if($val11[1]){?>
                        <li>
                          <?php echo $val11[1]; ?>
                        </li>
                      <?php }?>
                    </ul>
                  </td>
                  <td>
                    <ul>
                      <?php if($val11[2]){?>
                        <li>
                          <?php echo $val11[2]; ?>
                        </li>
                      <?php }?>
                    </ul>
                  </td>
                  <td>
                    <ul>
                      <?php if($val11[3]){?>
                        <li>
                          <?php echo $val11[3]; ?>
                        </li>
                      <?php }?>
                    </ul>
                  </td>
                  <td>
                    <ul>
                      <?php if($val11[4]){?>
                        <li>
                          <?php echo $val11[4]; ?>
                        </li>
                      <?php }?>
                    </ul>
                  </td>
                  <td>
                    <ul>
                      <?php if($val11[5]){?>
                        <li>
                          <?php echo $val11[5]; ?>
                        </li>
                      <?php }?>
                    </ul>
                  </td>
                  <td>
                    <ul>
                      <?php if($val11[6]){?>
                        <li>
                          <?php echo $val11[6]; ?>
                        </li>
                      <?php }?>
                    </ul>
                  </td>
                </tr>
                <tr>
                    <td><b>12:00</b></td>
                    <td>
                        <ul>
                            <?php if($val12[0]){?>
                              <li>
                                <?php echo $val12[0]; ?>
                              </li>
                            <?php }?>
                        </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val12[1]){?>
                          <li>
                            <?php echo $val12[1]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val12[2]){?>
                          <li>
                            <?php echo $val12[2]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val12[3]){?>
                          <li>
                            <?php echo $val12[3]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val12[4]){?>
                          <li>
                            <?php echo $val12[4]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val12[5]){?>
                          <li>
                            <?php echo $val12[5]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val12[6]){?>
                          <li>
                            <?php echo $val12[6]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                </tr>
                <tr>
                    <td><b>15:00</b></td>
                    <td>
                        <ul>
                            <?php if($val15[0]){?>
                              <li>
                                <?php echo $val15[0]; ?>
                              </li>
                            <?php }?>
                        </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val15[1]){?>
                          <li>
                            <?php echo $val15[1]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val15[2]){?>
                          <li>
                            <?php echo $val15[2]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val15[3]){?>
                          <li>
                            <?php echo $val15[3]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val15[4]){?>
                          <li>
                            <?php echo $val15[4]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val15[5]){?>
                          <li>
                            <?php echo $val15[5]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val15[6]){?>
                          <li>
                            <?php echo $val15[6]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                </tr>
                <tr>
                    <td><b>16:00</b></td>
                    <td>
                        <ul>
                            <?php if($val16[0]){?>
                              <li>
                                <?php echo $val16[0]; ?>
                              </li>
                            <?php }?>
                        </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val16[1]){?>
                          <li>
                            <?php echo $val16[1]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val16[2]){?>
                          <li>
                            <?php echo $val16[2]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val16[3]){?>
                          <li>
                            <?php echo $val16[3]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val16[4]){?>
                          <li>
                            <?php echo $val16[4]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val16[5]){?>
                          <li>
                            <?php echo $val16[5]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val16[6]){?>
                          <li>
                            <?php echo $val16[6]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                </tr>
                <tr>
                    <td><b>17:00</b></td>
                    <td>
                        <ul>
                            <?php if($val17[0]){?>
                              <li>
                                <?php echo $val17[0]; ?>
                              </li>
                            <?php }?>
                            <?php if($val17_1[0]){?>
                              <li>
                                <?php echo $val17_1[0]; ?>
                              </li>
                            <?php }?>
                        </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val17[1]){?>
                          <li>
                            <?php echo $val17[1]; ?>
                          </li>
                        <?php }?>
                        <?php if($val17_1[1]){?>
                          <li>
                            <?php echo $val17_1[1]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val17[2]){?>
                          <li>
                            <?php echo $val17[2]; ?>
                          </li>
                        <?php }?>
                        <?php if($val17_1[2]){?>
                          <li>
                            <?php echo $val17_1[2]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val17[3]){?>
                          <li>
                            <?php echo $val17[3]; ?>
                          </li>
                        <?php }?>
                        <?php if($val17_1[3]){?>
                          <li>
                            <?php echo $val17_1[3]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val17[4]){?>
                          <li>
                            <?php echo $val17[4]; ?>
                          </li>
                        <?php }?>
                        <?php if($val17_1[4]){?>
                          <li>
                            <?php echo $val17_1[4]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val17[5]){?>
                          <li>
                            <?php echo $val17[5]; ?>
                          </li>
                        <?php }?>
                        <?php if($val17_1[5]){?>
                          <li>
                            <?php echo $val17_1[5]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val17[6]){?>
                          <li>
                            <?php echo $val17[6]; ?>
                          </li>
                        <?php }?>
                        <?php if($val17_1[6]){?>
                          <li>
                            <?php echo $val17_1[6]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                </tr>
                <tr>
                    <td><b>18:00</b></td>
                    <td>
                        <ul>
                            <?php if($val18[0]){?>
                              <li>
                                <?php echo $val18[0]; ?>
                              </li>
                            <?php }?>
                            <?php if($val18_1[0]){?>
                              <li>
                                <?php echo $val18_1[0]; ?>
                              </li>
                            <?php }?>
                        </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val18[1]){?>
                          <li>
                            <?php echo $val18[1]; ?>
                          </li>
                        <?php }?>
                        <?php if($val18_1[1]){?>
                          <li>
                            <?php echo $val18_1[1]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val18[2]){?>
                          <li>
                            <?php echo $val18[2]; ?>
                          </li>
                        <?php }?>
                        <?php if($val18_1[2]){?>
                          <li>
                            <?php echo $val18_1[2]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val18[3]){?>
                          <li>
                            <?php echo $val18[3]; ?>
                          </li>
                        <?php }?>
                        <?php if($val18_1[3]){?>
                          <li>
                            <?php echo $val18_1[3]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val18[4]){?>
                          <li>
                            <?php echo $val18[4]; ?>
                          </li>
                        <?php }?>
                        <?php if($val18_1[4]){?>
                          <li>
                            <?php echo $val18_1[4]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val18[5]){?>
                          <li>
                            <?php echo $val18[5]; ?>
                          </li>
                        <?php }?>
                        <?php if($val18_1[5]){?>
                          <li>
                            <?php echo $val18_1[5]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val18[6]){?>
                          <li>
                            <?php echo $val18[6]; ?>
                          </li>
                        <?php }?>
                        <?php if($val18_1[6]){?>
                          <li>
                            <?php echo $val18_1[6]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                </tr>
                <tr>
                    <td><b>19:00</b></td>
                    <td>
                        <ul>
                            <?php if($val19[0]){?>
                              <li>
                                <?php echo $val19[0]; ?>
                              </li>
                            <?php }?>
                            <?php if($val19_1[0]){?>
                              <li>
                                <?php echo $val19_1[0]; ?>
                              </li>
                            <?php }?>
                            <?php if($val19_2[0]){?>
                              <li>
                                <?php echo $val19_2[0]; ?>
                              </li>
                            <?php }?>
                        </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[1]){?>
                          <li>
                            <?php echo $val19[1]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_1[1]){?>
                          <li>
                            <?php echo $val19_1[1]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_2[1]){?>
                          <li>
                            <?php echo $val19_2[1]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[2]){?>
                          <li>
                            <?php echo $val19[2]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_1[2]){?>
                          <li>
                            <?php echo $val19_1[2]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_2[2]){?>
                          <li>
                            <?php echo $val19_2[2]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[3]){?>
                          <li>
                            <?php echo $val19[3]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_1[3]){?>
                          <li>
                            <?php echo $val19_1[3]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_2[3]){?>
                          <li>
                            <?php echo $val19_2[3]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[4]){?>
                          <li>
                            <?php echo $val19[4]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_1[4]){?>
                          <li>
                            <?php echo $val19_1[4]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_2[4]){?>
                          <li>
                            <?php echo $val19_2[4]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[5]){?>
                          <li>
                            <?php echo $val19[5]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_1[5]){?>
                          <li>
                            <?php echo $val19_1[5]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_2[5]){?>
                          <li>
                            <?php echo $val19_2[5]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[6]){?>
                          <li>
                            <?php echo $val19[6]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_1[6]){?>
                          <li>
                            <?php echo $val19_1[6]; ?>
                          </li>
                        <?php }?>
                        <?php if($val19_2[6]){?>
                          <li>
                            <?php echo $val19_2[6]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                </tr>
                <tr>
                    <td><b>20:00</b></td>
                    <td>
                        <ul>
                            <?php if($val20[0]){?>
                              <li>
                                <?php echo $val20[0]; ?>
                              </li>
                            <?php }?>
                            <?php if($val20_1[0]){?>
                              <li>
                                <?php echo $val20_1[0]; ?>
                              </li>
                            <?php }?>
                        </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val20[1]){?>
                          <li>
                            <?php echo $val20[1]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_1[1]){?>
                          <li>
                            <?php echo $val20_1[1]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_2[1]){?>
                          <li>
                            <?php echo $val20_2[1]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val20[2]){?>
                          <li>
                            <?php echo $val20[2]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_1[2]){?>
                          <li>
                            <?php echo $val20_1[2]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_2[2]){?>
                          <li>
                            <?php echo $val20_2[2]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val20[3]){?>
                          <li>
                            <?php echo $val20[3]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_1[3]){?>
                          <li>
                            <?php echo $val20_1[3]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_2[3]){?>
                          <li>
                            <?php echo $val20_2[3]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val20[4]){?>
                          <li>
                            <?php echo $val20[4]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_1[4]){?>
                          <li>
                            <?php echo $val20_1[4]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_2[4]){?>
                          <li>
                            <?php echo $val20_2[4]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val20[5]){?>
                          <li>
                            <?php echo $val20[5]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_1[5]){?>
                          <li>
                            <?php echo $val20_1[5]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_2[5]){?>
                          <li>
                            <?php echo $val20_2[5]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val20[6]){?>
                          <li>
                            <?php echo $val20[6]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_1[6]){?>
                          <li>
                            <?php echo $val20_1[6]; ?>
                          </li>
                        <?php }?>
                        <?php if($val20_2[6]){?>
                          <li>
                            <?php echo $val20_2[6]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                </tr>
                <tr>
                    <td><b>21:00</b></td>
                    <td>
                        <ul>
                            <?php if($val19[0]){?>
                              <li>
                                <?php echo $val19[0]; ?>
                              </li>
                            <?php }?>
                        </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[1]){?>
                          <li>
                            <?php echo $val19[1]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[2]){?>
                          <li>
                            <?php echo $val19[2]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[3]){?>
                          <li>
                            <?php echo $val19[3]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[4]){?>
                          <li>
                            <?php echo $val19[4]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[5]){?>
                          <li>
                            <?php echo $val19[5]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <?php if($val19[6]){?>
                          <li>
                            <?php echo $val19[6]; ?>
                          </li>
                        <?php }?>
                      </ul>
                    </td>
                </tr>
            </tbody></table>
    </table>
  </body>
</html>
