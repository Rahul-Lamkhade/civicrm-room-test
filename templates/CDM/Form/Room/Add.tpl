{*
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
*}
{* this template is used for adding rooms  *}
<h3>
  {ts}Add Room{/ts}
</h3>
<div class="crm-block crm-form-block crm-discount-item-form-block">
    <table class="form-layout-compressed">
      <tr class="crm-discount-item-form-block-label">
        <td class="label">{$form.label.label}</td>
        <td>{$form.label.html}</td>
      </tr>
      <tr class="crm-discount-item-form-block-room_no">
        <td class="label">{$form.room_no.label}</td>
        <td>{$form.room_no.html}</td>
      </tr>
      <tr class="crm-discount-item-form-block-floor">
        <td class="label">{$form.floor.label}</td>
        <td>{$form.floor.html}
        </td>
      </tr>
      <tr class="crm-discount-item-form-block-ext">
        <td class="label">{$form.ext.label}</td>
        <td>{$form.ext.html}</td>
      </tr>
    </table>
  <div class="crm-submit-buttons">{include file="CRM/common/formButtons.tpl" location="bottom"}</div>
</div>
