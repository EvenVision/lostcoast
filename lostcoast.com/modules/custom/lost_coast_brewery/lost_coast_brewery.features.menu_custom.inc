<?php
/**
 * @file
 * lost_coast_brewery.features.menu_custom.inc
 */

/**
 * Implements hook_menu_default_menu_custom().
 */
function lost_coast_brewery_menu_default_menu_custom() {
  $menus = array();

  // Exported menu: main-menu.
  $menus['main-menu'] = array(
    'menu_name' => 'main-menu',
    'title' => 'Main menu',
    'description' => 'The <em>Main</em> menu is used on many sites to show the major sections of the site, often in a top navigation bar.',
  );
  // Exported menu: menu-footer-menu.
  $menus['menu-footer-menu'] = array(
    'menu_name' => 'menu-footer-menu',
    'title' => 'Footer Menu',
    'description' => 'List of menu items located in footer of website.',
  );
  // Exported menu: menu-social-media.
  $menus['menu-social-media'] = array(
    'menu_name' => 'menu-social-media',
    'title' => 'Social Media',
    'description' => 'These are social media links located in the header and footer of the site.',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Footer Menu');
  t('List of menu items located in footer of website.');
  t('Main menu');
  t('Social Media');
  t('The <em>Main</em> menu is used on many sites to show the major sections of the site, often in a top navigation bar.');
  t('These are social media links located in the header and footer of the site.');

  return $menus;
}
