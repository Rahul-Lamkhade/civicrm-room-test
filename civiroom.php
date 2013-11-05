<?php

/**
 * Implementation of hook_civicrm_install()
 */
function civiroom_civicrm_install() {
  $civiroomRoot = dirname(__FILE__) . DIRECTORY_SEPARATOR;
  $civiroomSQL = $civiroomRoot . DIRECTORY_SEPARATOR . 'civiroom.sql';

  CRM_Utils_File::sourceSQLFile(CIVICRM_DSN, $civiroomSQL);

  // rebuild the menu so our path is picked up
  CRM_Core_Invoke::rebuildMenuAndCaches();
}

/**
 * Implementation of hook_civicrm_uninstall()
 */
function civiroom_civicrm_uninstall() {
  $civiroomRoot = dirname(__FILE__) . DIRECTORY_SEPARATOR;

  $civiroomSQL = $civiroomRoot . DIRECTORY_SEPARATOR . 'civiroom.uninstall.sql';

  CRM_Utils_File::sourceSQLFile(CIVICRM_DSN, $civiroomSQL);

  // rebuild the menu so our path is picked up
  CRM_Core_Invoke::rebuildMenuAndCaches();
}

/**
 * Implementation of hook_civicrm_config()
 */
function civiroom_civicrm_config(&$config) {
  $template =& CRM_Core_Smarty::singleton();

  $civiroomRoot =
    dirname(__FILE__) . DIRECTORY_SEPARATOR;

  $civiroomDir = $civiroomRoot . 'templates';

  if (is_array($template->template_dir)) {
    array_unshift($template->template_dir, $civiroomDir);
  }
  else {
    $template->template_dir = array($civiroomDir, $template->template_dir);
  }

  // also fix php include path
  $include_path = $civiroomRoot . PATH_SEPARATOR . get_include_path();
  set_include_path($include_path);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 */
function civiroom_civicrm_xmlMenu(&$files) {
  $files[] =
    dirname(__FILE__) . DIRECTORY_SEPARATOR .
    'xml'               . DIRECTORY_SEPARATOR .
    'Menu'              . DIRECTORY_SEPARATOR .
    'civiroom.xml';
}

/**
 * @param $params associated array of navigation menus
 */
function civiroom_civicrm_navigationMenu( &$params ) {
    // get the maximum key under adminster menu
    $maxKey = ( max( array_keys($params) ) );
    $params[$maxKey+1] =  array (
      'attributes' => array (
        'label'      => 'CiviRoom',
        'name'       => 'CiviRoom',
        'url'        => 'civicrm/rooms/list&reset=1',
        'operator'   => NULL,
        'separator'  => TRUE,
        'parentID'   => $administerMenuId,
        'navID'      => $maxKey+1,
        'active'     => 1
      )
    );
}

