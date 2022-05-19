<?php
/**
 * @file
 * lost_coast_brewery.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function lost_coast_brewery_user_default_roles() {
  $roles = array();

  // Exported role: administrator.
  $roles['administrator'] = array(
    'name' => 'administrator',
    'weight' => 2,
  );

  return $roles;
}
