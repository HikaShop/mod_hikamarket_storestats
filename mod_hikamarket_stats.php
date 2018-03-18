<?php
/**
 * @author     Henrik Nielsen
 * @copyright  (C) 2018 Flexsus.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');

if(!defined('DS'))
	define('DS', DIRECTORY_SEPARATOR);
if(!include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_hikashop'.DS.'helpers'.DS.'helper.php')){
	echo 'This module can not work without the Hikashop Component';
	return;
}
if(!include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_hikamarket'.DS.'helpers'.DS.'helper.php')){
	echo 'This module can not work without the HikaMarket Component';
	return;
}

// Include the statistics functions only once.
require_once dirname(__FILE__) . '/helper.php';

$vendor_count			= modHikamarketStatsHelper::getTotalVendors($params);
$product_count			= modHikamarketStatsHelper::getTotalProducts($params);
$shipped_order_count	= modHikamarketStatsHelper::getTotalShippedOrders($params);
$online_num				= modHikamarketStatsHelper::getOnlineCount($params);
$total_users			= modHikamarketStatsHelper::getOnlineCount($params);
$ShowHideParams			= modHikamarketStatsHelper::getData($params);
require JModuleHelper::getLayoutPath('mod_hikamarket_stats');