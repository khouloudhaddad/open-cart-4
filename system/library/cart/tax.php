<?php
namespace Opencart\System\Library\Cart;
class Tax {
	private object $db;
	private object $config;
	private array $tax_rates = [];

	/**
	 * Constructor
	 *
	 * @param    object  $registry
	 */
	public function __construct(\Opencart\System\Engine\Registry $registry) {
		$this->db = $registry->get('db');
		$this->config = $registry->get('config');
	}

	/**
	 * setShippingAddress
	 *
	 * @param    int  $country_id
	 * @param    int  $zone_id
	 *
	 * @return   void
	 */
	public function setShippingAddress(int $country_id, int $zone_id): void {
		$tax_query = $this->db->query("SELECT tr1.`tax_class_id`, tr2.`tax_rate_id`, tr2.`name`, tr2.`rate`, tr2.`type`, tr1.`priority` FROM `" . DB_PREFIX . "tax_rule` tr1 LEFT JOIN `" . DB_PREFIX . "tax_rate` tr2 ON (tr1.`tax_rate_id` = tr2.`tax_rate_id`) INNER JOIN `" . DB_PREFIX . "tax_rate_to_customer_group` tr2cg ON (tr2.`tax_rate_id` = tr2cg.`tax_rate_id`) LEFT JOIN `" . DB_PREFIX . "zone_to_geo_zone` z2gz ON (tr2.`geo_zone_id` = z2gz.`geo_zone_id`) LEFT JOIN `" . DB_PREFIX . "geo_zone` gz ON (tr2.`geo_zone_id` = gz.`geo_zone_id`) WHERE tr1.`based` = 'shipping' AND tr2cg.`customer_group_id` = '" . (int)$this->config->get('config_customer_group_id') . "' AND z2gz.`country_id` = '" . (int)$country_id . "' AND (z2gz.`zone_id` = '0' OR z2gz.`zone_id` = '" . (int)$zone_id . "') ORDER BY tr1.`priority` ASC");

		foreach ($tax_query->rows as $result) {
			$this->tax_rates[$result['tax_class_id']][$result['tax_rate_id']] = [
				'tax_rate_id' => $result['tax_rate_id'],
				'name'        => $result['name'],
				'rate'        => $result['rate'],
				'type'        => $result['type'],
				'priority'    => $result['priority']
			];
		}
	}

	/**
	 * setPaymentAddress
	 *
	 * @param    int  $country_id
	 * @param    int  $zone_id
	 *
	 * @return   void
	 */
	public function setPaymentAddress(int $country_id, int $zone_id): void {
		$tax_query = $this->db->query("SELECT tr1.`tax_class_id`, tr2.`tax_rate_id`, tr2.`name`, tr2.`rate`, tr2.`type`, tr1.`priority` FROM `" . DB_PREFIX . "tax_rule` tr1 LEFT JOIN `" . DB_PREFIX . "tax_rate` tr2 ON (tr1.`tax_rate_id` = tr2.`tax_rate_id`) INNER JOIN `" . DB_PREFIX . "tax_rate_to_customer_group` tr2cg ON (tr2.`tax_rate_id` = tr2cg.`tax_rate_id`) LEFT JOIN `" . DB_PREFIX . "zone_to_geo_zone` z2gz ON (tr2.`geo_zone_id` = z2gz.`geo_zone_id`) LEFT JOIN `" . DB_PREFIX . "geo_zone` gz ON (tr2.`geo_zone_id` = gz.`geo_zone_id`) WHERE tr1.`based` = 'payment' AND tr2cg.`customer_group_id` = '" . (int)$this->config->get('config_customer_group_id') . "' AND z2gz.`country_id` = '" . (int)$country_id . "' AND (z2gz.`zone_id` = '0' OR z2gz.`zone_id` = '" . (int)$zone_id . "') ORDER BY tr1.`priority` ASC");

		foreach ($tax_query->rows as $result) {
			$this->tax_rates[$result['tax_class_id']][$result['tax_rate_id']] = [
				'tax_rate_id' => $result['tax_rate_id'],
				'name'        => $result['name'],
				'rate'        => $result['rate'],
				'type'        => $result['type'],
				'priority'    => $result['priority']
			];
		}
	}

	/**
	 * setStoreAddress
	 *
	 * @param    int  $country_id
	 * @param    int  $zone_id
	 *
	 * @return   void
	 */
	public function setStoreAddress(int $country_id, int $zone_id): void {
		$tax_query = $this->db->query("SELECT tr1.`tax_class_id`, tr2.`tax_rate_id`, tr2.`name`, tr2.`rate`, tr2.`type`, tr1.`priority` FROM `" . DB_PREFIX . "tax_rule` tr1 LEFT JOIN `" . DB_PREFIX . "tax_rate` tr2 ON (tr1.`tax_rate_id` = tr2.`tax_rate_id`) INNER JOIN `" . DB_PREFIX . "tax_rate_to_customer_group` tr2cg ON (tr2.`tax_rate_id` = tr2cg.`tax_rate_id`) LEFT JOIN `" . DB_PREFIX . "zone_to_geo_zone` z2gz ON (tr2.`geo_zone_id` = z2gz.`geo_zone_id`) LEFT JOIN `" . DB_PREFIX . "geo_zone` gz ON (tr2.`geo_zone_id` = gz.`geo_zone_id`) WHERE tr1.`based` = 'store' AND tr2cg.`customer_group_id` = '" . (int)$this->config->get('config_customer_group_id') . "' AND z2gz.`country_id` = '" . (int)$country_id . "' AND (z2gz.`zone_id` = '0' OR z2gz.`zone_id` = '" . (int)$zone_id . "') ORDER BY tr1.`priority` ASC");

		foreach ($tax_query->rows as $result) {
			$this->tax_rates[$result['tax_class_id']][$result['tax_rate_id']] = [
				'tax_rate_id' => $result['tax_rate_id'],
				'name'        => $result['name'],
				'rate'        => $result['rate'],
				'type'        => $result['type'],
				'priority'    => $result['priority']
			];
		}
	}

	/**
	 * Calculate
	 *
	 * @param    float  $value
	 * @param    int  $tax_class_id
	 * @param    bool  $calculate
	 *
	 * @return   float
	 */
	public function calculate(float $value, int $tax_class_id, bool $calculate = true): float {
		if ($tax_class_id && $calculate) {
			$amount = 0;

			$tax_rates = $this->getRates($value, $tax_class_id);

			foreach ($tax_rates as $tax_rate) {
				if ($calculate != 'P' && $calculate != 'F') {
					$amount += $tax_rate['amount'];
				} elseif ($tax_rate['type'] == $calculate) {
					$amount += $tax_rate['amount'];
				}
			}

			return $value + $amount;
		} else {
			return $value;
		}
	}

	/**
	 * getTax
	 *
	 * @param    float  $value
	 * @param    int  $tax_class_id
	 *
	 * @return   float
	 */
	public function getTax(float $value, int $tax_class_id): float {
		$amount = 0;

		$tax_rates = $this->getRates($value, $tax_class_id);

		foreach ($tax_rates as $tax_rate) {
			$amount += $tax_rate['amount'];
		}

		return $amount;
	}

	/**
	 * getRateName
	 *
	 * @param    int  $tax_rate_id
	 *
	 * @return   string
	 */
	public function getRateName(int $tax_rate_id): string {
		$tax_query = $this->db->query("SELECT `name` FROM `" . DB_PREFIX . "tax_rate` WHERE `tax_rate_id` = '" . (int)$tax_rate_id . "'");

		if ($tax_query->num_rows) {
			return $tax_query->row['name'];
		} else {
			return false;
		}
	}

	/**
	 * getRates
	 *
	 * @param    float  $value
	 * @param    int  $tax_class_id
	 *
	 * @return   array
	 */
	public function getRates(float $value, int $tax_class_id): array {
		$tax_rate_data = [];

		if (isset($this->tax_rates[$tax_class_id])) {
			foreach ($this->tax_rates[$tax_class_id] as $tax_rate) {
				if (isset($tax_rate_data[$tax_rate['tax_rate_id']])) {
					$amount = $tax_rate_data[$tax_rate['tax_rate_id']]['amount'];
				} else {
					$amount = 0;
				}

				if ($tax_rate['type'] == 'F') {
					$amount += $tax_rate['rate'];
				} elseif ($tax_rate['type'] == 'P') {
					$amount += ($value / 100 * $tax_rate['rate']);
				}

				$tax_rate_data[$tax_rate['tax_rate_id']] = [
					'tax_rate_id' => $tax_rate['tax_rate_id'],
					'name'        => $tax_rate['name'],
					'rate'        => $tax_rate['rate'],
					'type'        => $tax_rate['type'],
					'amount'      => $amount
				];
			}
		}

		return $tax_rate_data;
	}
	
	/**
	 * Clear
	 *
	 * @return   void
	 */
	public function clear(): void {
		$this->tax_rates = [];
	}
}
