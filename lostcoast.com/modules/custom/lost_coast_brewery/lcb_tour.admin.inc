<?php

/**
 *
 */
function lcb_tour_page(){
  drupal_add_css(drupal_get_path('module','lost_coast_brewery').'/fullcalendar/jquery-ui/jquery-ui.css',array('scope' => 'header'));

  drupal_add_js(drupal_get_path('module','lost_coast_brewery').'/fullcalendar/lib/moment.min.js',array('scope' => 'footer'));
  drupal_add_js(drupal_get_path('module','lost_coast_brewery').'/fullcalendar/fullcalendar.min.js',array('scope' => 'footer'));
  drupal_add_css(drupal_get_path('module','lost_coast_brewery').'/fullcalendar/fullcalendar.min.css',array('scope' => 'header'));
  drupal_add_js(drupal_get_path('module','lost_coast_brewery').'/js/calendar.js',array('scope' => 'footer'));

  $dates = array();
  $tours = entityform_load_multiple(FALSE, array('type' => 'beer_tour'));
  foreach($tours AS $tour){
    $tmp = _tour_item($tour);
    $dates[] = $tmp;
  }

  $tours = array(
    'lost_coast' => array(
      'key' => variable_get('lcb_key',''),
      'tours' => $dates
    )
  );

  drupal_add_js($tours,'setting');

  ctools_include('modal');
  ctools_modal_add_js();

  return "
<p>Manage the Beer Tours from here. Using this interactive calendar you can view registrations
for a particular tour as well as make modifications to existing tours.</p>

<div id='calendar'></div>";
}