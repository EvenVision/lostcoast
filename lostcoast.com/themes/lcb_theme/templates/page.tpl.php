<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<!-- main container of all the page elements -->
<div id="wrapper">
  <div class="w1">
    <!-- header of the page -->
    <header id="header">
      <nav class="navbar">
        <div class="container">
          <div class="navbar-header">
            <!-- page logo -->
            <a class="navbar-brand visible-xs-block" href="/">
              <img src="<?php print $theme_path; ?>images/logo.png"
                   srcset="<?php print $theme_path; ?>images/logo-2x.png 2x"
                   alt="Lost Coast Brewery" width="116" height="78">
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
              print theme('links__main_menu', array(
                'links' => $main_menu,
                'attributes' => array(
                  'id' => 'main-menu',
                  'class' => array('nav')
                )
              ));

              print theme('links__menu_social_media', array(
                'links' => $social_menu,
                'attributes' => array(
                  'id' => '',
                  'class' => array(
                    'socials',
                    'list-unstyled',
                    'list-inline'
                  )
                )
              ));
            ?>
          </div>
        </div>
      </nav>
    </header>
    <!-- contain main informative part of the site -->
    <main id="main">
      <?php print render($page['content']); ?>
      <div id="overlay">
        <div>
          <div class="line1">You&rsquo;ve got to be 21 or older<br/>to enter.</div>
          <div class="line2" id="accept">I&rsquo;m 21, Lets Party</div>
        </div>
      </div>
    </main>
    <!-- footer of the page -->
    <footer id="footer" class="<?php print $footer_classes; ?>">
      <div class="container">
        <div class="footer-boxes">
          <div class="coast"><?php print $statement; ?></div>
          <?php
            print theme('links__menu_footer_menu', array(
              'links' => $footer_menu,
              'attributes' => array(
                'id' => 'footer-menu',
                'class' => array(
                  'links',
                  'inline',
                  'clearfix',
                  'footer-list',
                  'list-unstyled'
                )
              )
            ));

          print $address;

          print theme('links__menu_social_media', array(
            'links' => $social_menu,
            'attributes' => array(
              'id' => '',
              'class' => array(
                'footer-socials',
                'list-unstyled',
                'list-inline'
              )
            )
          ));
          ?>
        </div>
        <div class="statement-link"><a href="/accessibility-statement" >Accessibility Statement</a></div>
      </div>
    </footer>
    <?php print $beer_tour; ?>
  </div>
</div>

<?php print $register_form; ?>