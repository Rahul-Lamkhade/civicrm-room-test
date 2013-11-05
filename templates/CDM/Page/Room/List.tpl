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
<div id="help">
  {ts}Rooms added by users.{/ts}
</div>

{if $rows}
  <div id="discount-list">
    {strip}
      <table id="options" class="display">
        <thead>
        <tr>
          <th>{ts}Room Label{/ts}</th>
          <th>{ts}Room Number{/ts}</th>
          <th>{ts}Floor{/ts}</th>
          <th>{ts}Extension{/ts}</th>
          <th></th>
        </tr>
        </thead>
        {foreach from=$rows item=row}
          <tr id="CiviDiscount_Item-{$row.id}" class="{$row.class}">
            <td>{$row.label}</td>
            <td>{$row.room_no}</td>
            <td>{$row.floor}</td>
            <td>{$row.ext}</td>
          </tr>
        {/foreach}
      </table>
    {/strip}

    <div class="action-link">
      <a href='{crmURL p='civicrm/add-room-ext' q="reset=1"}' id="newCivicrmRoom"
         class="button"><span>&raquo; {ts}New Civicrm Room{/ts}</span></a>
    </div>
  </div>
{else}
  <div class="messages status no-popup">
    <div class="icon inform-icon"></div>
    {capture assign=crmURL}{crmURL p='civicrm/add-room-ext' q="reset=1"}{/capture}
    {ts 1=$crmURL}There are no Civicrm Rooms. You can <a href='%1'>add one</a>.{/ts}
  </div>
{/if}
