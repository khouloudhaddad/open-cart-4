<?php
namespace Opencart\Admin\Model\Extension\Opencart\Report;
class ProductViewed extends \Opencart\System\Engine\Model {
	public function install(): void {
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "product_viewed` (
		  `product_id` INT(11) NOT NULL,
		  `viewed` INT(11) NOT NULL,
		  PRIMARY KEY (`product_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
	}

	public function uninstall(): void {
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "product_viewed`");
	}

	public function addReport(int $product_id, int $viewed) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "product_viewed` SET `product_id` = '" . (int)$product_id . "', `viewed` = '" . (int)$viewed . "'");
	}

	public function getViewed(int $start = 0, int $limit = 10): array {
		if ($start < 0) {
			$start = 0;
		}

		if ($limit < 1) {
			$limit = 10;
		}

		$query = $this->db->query("SELECT `product_id`, `viewed` FROM `" . DB_PREFIX . "product_viewed` ORDER BY `viewed` DESC LIMIT " . (int)$start . "," . (int)$limit);

		return $query->rows;
	}

	public function getTotalViewed(): int {
		$query = $this->db->query("SELECT COUNT(*) AS `total` FROM `" . DB_PREFIX . "product_viewed`");

		return (int)$query->row['total'];
	}

	public function getTotal(): int {
		$query = $this->db->query("SELECT SUM(`viewed`) AS `total` FROM `" . DB_PREFIX . "product_viewed`");

		return (int)$query->row['total'];
	}

	public function clear(): void {
		$this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "product_viewed`");
	}
}
