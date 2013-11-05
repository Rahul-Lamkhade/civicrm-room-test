<?php

/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.3                                                |
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

require_once 'CRM/Core/Form.php';
require_once 'CDM/DAO/Room.php';
require_once 'CDM/BAO/Room.php';

/**
 * This class generates form components for Civicrm room.
 *
 */
class CDM_Form_Room_Add extends CRM_Core_Form {
  /**
   * Function to build the form
   *
   * @return None
   * @access public
   */
  public function buildQuickForm() {
    parent::buildQuickForm();

    if ($this->_action & CRM_Core_Action::DELETE) {
      return;
    }

    $this->applyFilter('__ALL__', 'trim');
    $element =& $this->add('text',
      'label',
      ts('Room Label'),
      CRM_Core_DAO::getAttribute('CDM_DAO_Room', 'label'),
      true);
    $this->addRule('label',
      ts('Label can only consist of alpha-numeric characters'),
      'variable');
    if ($this->_action & CRM_Core_Action::UPDATE) {
      $element->freeze();
    }

    $this->add('text', 'room_no', ts('Room Number'), CRM_Core_DAO::getAttribute('CDM_DAO_Room', 'room_no'));
    $this->add('text', 'floor', ts('Floor'), CRM_Core_DAO::getAttribute('CDM_DAO_Room', 'floor'));
    $this->add('text', 'ext', ts('Room Extension'), CRM_Core_DAO::getAttribute('CDM_DAO_Room', 'ext'));    
    $this->addButtons(array( 
                                    array ( 'type'      => 'upload', 
                                            'name'      => ts('Add Room'), 
                                            'spacing'   => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 
                                            'isDefault' => true), 
                                    ) 
                              );
  }

  /**
   * Function to process the form
   *
   * @access public
   * @return None
   */
  public function postProcess() {
    $params = $this->exportValues();

    if ($this->_action & CRM_Core_Action::UPDATE) {
      $params['id'] = $this->_id;
    }

    $room = CDM_BAO_Room::add($params);

    CRM_Core_Session::setStatus(ts('Civicrm Room has been saved.',
      array(1 => $room->label)));
      
    $redirectURL = "rooms/list";
    CRM_Utils_System::redirect($redirectURL);
  }

}
