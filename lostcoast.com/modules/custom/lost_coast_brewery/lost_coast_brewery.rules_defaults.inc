<?php
/**
 * @file
 * lost_coast_brewery.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function lost_coast_brewery_default_rules_configuration() {
  $items = array();

  $items['rules_redirect_beer_pages'] = entity_import('rules_config', '{ "rules_redirect_beer_pages" : {
      "LABEL" : "Redirect Beer Pages",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "rules" ],
      "ON" : { "node_view--beer" : { "bundle" : "beer" } },
      "DO" : [ { "redirect" : { "url" : "beers" } } ]
    }
  }');
  return $items;
}
