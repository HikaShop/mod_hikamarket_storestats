<?php
/**
 * @author     Henrik Nielsen
 * @copyright  (C) 2018 Flexsus.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Helper for mod_hikamarket_stats
 */
class ModHikamarketStatsHelper
{
	/**
	 * Method to get total count of published vendors.
	 *
	 */
	public static function getTotalVendors() {
		$db			= JFactory::getDbo();
		$query		= $db->getQuery(true);
		
		$query->select('count(*)')
			->from('#__hikamarket_vendor')
			->where('vendor_published = 1');

		$db->setQuery($query);
		$vendor_count = $db->loadResult();
		
		return $vendor_count;
	}

	/**
	 * Method to get total count of published products.
	 *
	 */
	public static function getTotalProducts() {
		$db			= JFactory::getDbo();
		$query		= $db->getQuery(true);

		$query->select('count(*)')
			->from('#__hikashop_product')
			->where(array(
				'product_published = 1',
				'product_type = '.$db->Quote('main')
			));

		$db->setQuery($query);
		$product_count = $db->loadResult();

		return $product_count;
	}

	/**
	 * Method to get total count of shipped orders.
	 *
	 */
	public static function getTotalShippedOrders() {
		$db			= JFactory::getDbo();
		$query		= $db->getQuery(true);
		
		$query->select('count(*)')
		->from('#__hikashop_order')
		->where(array(
				'order_status = "shipped"'
		));
		
		$db->setQuery($query);
		$shipped_order_count = $db->loadResult();
		
		return $shipped_order_count;
	}

	/**
	 * Method to get frontend online users.
	 *
	 */
	public static function getOnlineCount() {
		$config 	= JFactory::getConfig();
		$db			= JFactory::getDbo();
		$query		= $db->getQuery(true);

		// Get the number of frontend logged in users if shared sessions is not enabled.
		$online_num = 0;
		if (!$config->get('shared_session', '0'))
		{
			$query->select('COUNT(session_id)')
				->from('#__session')
				->where(array(
					'guest = 1',
					'client_id = 0'
				));

			$db->setQuery($query);
			$online_num = (int) $db->loadResult();

			return $online_num;
		}

		// Get the number of logged in users if shared sessions is enabled.
		$total_users = 0;
		if ($config->get('shared_session', '0'))
		{
			$query->clear()
				->select('COUNT(session_id)')
				->from('#__session')
				->where('guest = 0');

			$db->setQuery($query);
			$total_users = (int) $db->loadResult();

			return $total_users;
		}
	}
}