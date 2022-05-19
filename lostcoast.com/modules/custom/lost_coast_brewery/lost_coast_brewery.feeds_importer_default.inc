<?php
/**
 * @file
 * lost_coast_brewery.feeds_importer_default.inc
 */

/**
 * Implements hook_feeds_importer_default().
 */
function lost_coast_brewery_feeds_importer_default() {
  $export = array();

  $feeds_importer = new stdClass();
  $feeds_importer->disabled = FALSE; /* Edit this to true to make a default feeds_importer disabled initially */
  $feeds_importer->api_version = 1;
  $feeds_importer->id = 'distributor_importer';
  $feeds_importer->config = array(
    'name' => 'Distributor Importer',
    'description' => '',
    'fetcher' => array(
      'plugin_key' => 'FeedsFileFetcher',
      'config' => array(
        'allowed_extensions' => 'txt csv tsv xml opml',
        'direct' => FALSE,
        'directory' => 'private://feeds',
        'allowed_schemes' => array(
          0 => 'public',
          1 => 'private',
        ),
      ),
    ),
    'parser' => array(
      'plugin_key' => 'FeedsCSVParser',
      'config' => array(
        'delimiter' => ',',
        'encoding' => 'UTF-8',
        'no_headers' => 0,
      ),
    ),
    'processor' => array(
      'plugin_key' => 'FeedsEntityProcessorEntityform',
      'config' => array(
        'values' => array(
          'created' => '1466549480',
          'draft' => '',
          'user' => '1',
        ),
        'authorize' => TRUE,
        'mappings' => array(
          0 => array(
            'source' => 'ID',
            'target' => 'guid',
            'unique' => 1,
          ),
          1 => array(
            'source' => 'NAME',
            'target' => 'field_distributor_name',
            'unique' => FALSE,
            'language' => 'und',
          ),
          2 => array(
            'source' => 'AREA',
            'target' => 'field_distributor_area',
            'term_search' => '0',
            'autocreate' => 0,
            'language' => 'und',
          ),
          3 => array(
            'source' => 'LOCATION',
            'target' => 'field_distributor_location',
            'unique' => FALSE,
            'language' => 'und',
          ),
          4 => array(
            'source' => 'PHONE',
            'target' => 'field_distributor_phone_number',
            'unique' => FALSE,
            'language' => 'und',
          ),
        ),
        'insert_new' => '1',
        'update_existing' => '2',
        'update_non_existent' => 'skip',
        'input_format' => 'plain_text',
        'skip_hash_check' => 0,
        'bundle' => 'distributor',
        'language' => 'und',
      ),
    ),
    'content_type' => '',
    'update' => 0,
    'import_period' => '-1',
    'expire_period' => 3600,
    'import_on_create' => 1,
    'process_in_background' => 0,
  );
  $export['distributor_importer'] = $feeds_importer;

  return $export;
}
