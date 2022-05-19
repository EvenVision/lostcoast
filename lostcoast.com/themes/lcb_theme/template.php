<?php

/**
 * Implements template_preprocess_page().
 */
function lcb_theme_preprocess_page(&$variables){
  $settings = variable_get('lcb_settings',array());

  $variables['location'] = $settings['general_config']['location'];
  $variables['location']['phone_strip'] = preg_replace("/[^0-9]/","",$variables['location']['phone']);

  $variables['footer_menu'] = menu_navigation_links('menu-footer-menu');
  $variables['social_menu'] = menu_navigation_links('menu-social-media');
  $variables['theme_path'] = url(drupal_get_path('theme', 'lcb_theme')).'/';

  $variables['footer_classes'] = 'straight';

  if($variables['is_front']){
    $variables['footer_classes'] = '';
  }else{
    if(isset($variables['node'])){
      $node = $variables['node'];
      switch($node->nid){
        case 6:
          $variables['footer_classes'] = 'inverted';
          break;
      }
    }
  }

  $form = drupal_get_form('lcb_register_form');
  $variables['register_form'] = theme('modal',array('form' => $form));

  $blocks = array(
    'statement' => 'mission_statement',
    'address' => 'address',
    'beer_tour' => 'beer_tour'
  );
  foreach($blocks AS $key => $block) {
    $tmp = block_load('lost_coast_brewery', $block);
    $renderable_array = _block_get_renderable_array(_block_render_blocks(array($tmp)));
    $variables[$key] = drupal_render($renderable_array);
  }


}

/**
 * Implements theme_links__MENU().
 */
function lcb_theme_links__main_menu($variables) {
  $links = $variables['links'];
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    // Treat the heading first if it is present to prepend it to the
    // list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading
        // is a string.
        $heading = array(
          'text' => $heading,
          // Set the default level of the heading.
          'level' => 'h2',
        );
      }
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = array($key);

      // Add first, last and active classes to the list of links to help out
      // themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
        && (empty($link['language']) || $link['language']->language == $language_url->language)) {

        if($link['title'] != '<home>') {
          $class[] = 'active';
        }
      }

      if($link['title'] == '<home>'){
        $class[] = 'logo-holder';
        $class[] = 'hidden-xs';
      }

      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if($link['title'] == '<home>'){
        $url = url(drupal_get_path('theme','lcb_theme'));
        $output .= '
        <a class="logo" href="/">
          <img src="' . $url . '/images/logo.png" srcset="' . $url . '/images/logo-2x.png 2x" alt="Lost Coast Brewery" width="116" height="78">
        </a>
        ';
      }
      elseif (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for
        // adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

/**
 * Implements theme_links__MENU().
 */
function lcb_theme_links__menu_social_media($variables) {
  $links = $variables['links'];
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = array($key);

      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }

      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      $url = url($link['href']);
      $output .= '<a href="' . $url . '" class="' . implode(" ",$link['attributes']['class']) . '"><span class="path2"></span><span class="sr-only">' . $link['title'] . '</span></a>' . "\n";

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

/**
 * Implements template_preprocess_node().
 */
function lcb_theme_preprocess_node(&$variables){
  $node = $variables['node'];

  if($node->nid == 192) {
    $settings = variable_get('lcb_settings',array());

    $variables['events'] = views_embed_view('events','front_page');
    $variables['theme_path'] = url(drupal_get_path('theme', 'lcb_theme')).'/';
    $variables['spotlight'] = $settings['front_page']['feature_picture'];

    $variables['carousel'] = views_embed_view('header_images','default',3935);

    $blocks = array(
      'restaurant' => 'restaurant',
      'spotlighted_beer' => 'spotlighted_beer',
      'spotlighted_photo' => 'picture_spotlight',
      'front_beers' => 'front_beers'
    );
    foreach($blocks AS $key => $block) {
      $tmp = block_load('lost_coast_brewery', $block);
      $renderable_array = _block_get_renderable_array(_block_render_blocks(array($tmp)));
      $variables[$key] = drupal_render($renderable_array);
    }
  }

  if($node->type == 'event'){
    $default_banner = '/sites/default/files/images/img-22-2x.jpg';

    $wrapper = entity_metadata_wrapper('node', $node);
    $img = $wrapper->field_event_image->value()['uri'];
    $banner = file_create_url($img);
    $variables['banner'] = $banner;
    $variables['share'] = url('node/'. $node->nid, array('absolute' => true));

    drupal_add_js(drupal_get_path('theme','lcb_theme').'/js/share.js');
  }
}

function lcb_theme_preprocess_beer_page(&$variables){
  $variables['beers'] = array();

  drupal_add_js(drupal_get_path('theme','lcb_theme').'/js/jquery.ba-bbq.min.js');
  drupal_add_js(drupal_get_path('theme','lcb_theme').'/js/history.js/scripts/bundled/html4+html5/jquery.history.js');
  drupal_add_js(drupal_get_path('theme','lcb_theme').'/js/jquery.beers.js');

  $results = views_get_view_result('beers','order');
  foreach($results AS $result){
    if($result->node_status == 1){
      $tmp = array();

      //$tmp['img'] = file_create_url($result->field_field_beer_page_image[0]['raw']['uri']);
      $tmp['img'] = image_style_url('beer_bottle_size', $result->field_field_beer_page_image[0]['raw']['uri']);
      $tmp['title'] = $result->node_title;
      $tmp['abv'] = $result->field_field_abv[0]['raw']['value'].'%';
      $tmp['body'] = check_markup($result->field_body[0]['raw']['value'],'plain_text');

      $links = array();
      foreach($result->field_field_beer_links AS $link){
        $raw = $link['raw'];
        $raw['href'] = $raw['url'];
        $links[] = $raw;
      }
      $tmp['links'] = theme('links', array(
        'links' => $links,
        'attributes' => array('class' => array('awards-list','list-unstyled'))
      ));
      $variables['beers'][] = $tmp;
    }
  }

  $blocks = array(
    'beer_header' => 'beer_header',
  );
  foreach($blocks AS $key => $block) {
    $tmp = block_load('lost_coast_brewery', $block);
    $renderable_array = _block_get_renderable_array(_block_render_blocks(array($tmp)));
    $variables[$key] = drupal_render($renderable_array);
  }
}

function lcb_theme_preprocess_home_page(&$variables){
  $settings = variable_get('lcb_settings',array());

  $variables['events'] = views_embed_view('events','front_page');
  $variables['theme_path'] = url(drupal_get_path('theme', 'lcb_theme')).'/';
  $variables['spotlight'] = $settings['front_page']['feature_picture'];

  $variables['carousel'] = views_embed_view('header_images','default',3935);

  $blocks = array(
    'restaurant' => 'restaurant',
    'spotlighted_beer' => 'spotlighted_beer',
    'spotlighted_photo' => 'picture_spotlight',
    'front_beers' => 'front_beers'
  );
  foreach($blocks AS $key => $block) {
    $tmp = block_load('lost_coast_brewery', $block);
    $renderable_array = _block_get_renderable_array(_block_render_blocks(array($tmp)));
    $variables[$key] = drupal_render($renderable_array);
  }
}

function lcb_theme_preprocess_find_beer(&$variables){
  $variables['us_vendors'] = views_embed_view('distributors','us');
  $variables['international_vendors'] = views_embed_view('distributors','international');
}

/**
 * Implements theme_preprocess_block().
 */
function lcb_theme_preprocess_block(&$vars) {
  $block = $vars['block'];
  if($block->module == 'lost_coast_brewery' && $block->delta == 'address'){
    $vars['classes_array'][] = drupal_clean_css_identifier('address', array());
  }elseif($block->module == 'lost_coast_brewery' && $block->delta == 'beer_tour'){
    $vars['classes_array'][] = drupal_clean_css_identifier('more', array());
  }
}

function lcb_theme_preprocess_views_view(&$vars){
  $view = $vars['view'];

  if($view->name == 'distributors') {
    $vocab = taxonomy_vocabulary_machine_name_load('distributor_location');
    drupal_add_js(drupal_get_path('theme','lcb_theme').'/js/filter_distributors.js');
    if ($view->current_display == 'us') {
      $terms = taxonomy_get_tree($vocab->vid, 1);

      $select = array('' => 'All');
      foreach ($terms AS $term) {
        $select['group-' . $term->tid] = $term->name;
      }
      $vars['selects'] = $select;
    }elseif ($view->current_display == 'international') {
      $select = array('' => 'All');

      $terms = taxonomy_get_tree($vocab->vid, 36);

      foreach ($terms AS $term) {
        if($term->tid != 1) {
          $select['group-' . $term->tid] = $term->name;
        }
      }
      $vars['selects'] = $select;
    }
  }
}