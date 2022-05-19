<?php
/**
 * @file
 * lost_coast_brewery.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function lost_coast_brewery_taxonomy_default_vocabularies() {
  return array(
    'distributor_location' => array(
      'name' => 'Distributor Location',
      'machine_name' => 'distributor_location',
      'description' => 'Contains locations for distributors',
      'hierarchy' => 1,
      'module' => 'taxonomy',
      'weight' => 0,
      'rdf_mapping' => array(
        'rdftype' => array(
          0 => 'skos:ConceptScheme',
        ),
        'name' => array(
          'predicates' => array(
            0 => 'dc:title',
          ),
        ),
        'description' => array(
          'predicates' => array(
            0 => 'rdfs:comment',
          ),
        ),
      ),
    ),
  );
}
