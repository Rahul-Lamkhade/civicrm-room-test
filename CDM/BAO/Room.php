<?php

/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.4                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2013                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*/

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2013
 * $Id$
 *
 */

require_once 'CDM/DAO/Room.php';

class CDM_BAO_Room extends CDM_DAO_Room {

  /**
   * class constructor
   */
  function __construct() {
    parent::__construct();
  }

  /**
   * Takes an associative array and creates a civicrm room
   *
   * This function extracts all the params it needs to initialize the created
   * room.
   *
   * @param array  $params (reference ) an assoc array of name/value pairs
   *
   * @return object CDM_BAO_Room object
   * @access public
   * @static
   */
  static function &add(&$params) {
    require_once 'CRM/Utils/Date.php';

    $item = new CDM_DAO_Room();
    $item->label = $params['label'];
    $item->room_no = $params['room_no'];
    $item->floor = $params['floor'];
    $item->ext = $params['ext'];

    if (! empty($params['id'])) {
      $item->id = $params['id'];
    }

    $id = empty($params['id']) ? NULL : $params['id'];
    $op = $id ? 'edit' : 'create';
    CRM_Utils_Hook::pre($op, 'CiviRoom', $id, $params);
    $item->save();
    CRM_Utils_Hook::post($op, 'CiviRoom', $item->id, $item);

    return $item;
  }

  /**
   * Takes a bunch of params that are needed to match certain criteria and
   * retrieves the relevant objects. Typically the valid params are only
   * room id. We'll tweak this function to be more full featured over a period
   * of time. This is the inverse function of create. It also stores all the retrieved
   * values in the default array
   *
   * @param array $params   (reference) an assoc array of name/value pairs
   * @param array $defaults (reference) an assoc array to hold the flattened values
   *
   * @return object CDM_BAO_Room object on success, null otherwise
   * @access public
   * @static
   */
  static function retrieve(&$params, &$defaults) {
    $item = new CDM_DAO_Room();
    $item->copyValues($params);
    if ($item->find(true)) {
      CRM_Core_DAO::storeValues($item, $defaults);
      return $item;
    }
    return null;
  }

  /**
   * Function to delete rooms
   *
   * @param  int  $itemID     ID of the discount code to be deleted.
   *
   * @access public
   * @static
   * @return true on success else false
   */
  static function del($itemID) {
    $item = new CDM_DAO_Item();
    $item->id = $itemID;

    if ($item->find(TRUE)) {
      CRM_Utils_Hook::pre('delete', 'CiviRoom', $item->id, $item);
      $item->delete();
      CRM_Utils_Hook::post('delete', 'CiviRoom', $item->id, $item);

      return TRUE;
    }

    return FALSE;
  }
}
