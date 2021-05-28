<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php require "crawl.php" ?>

<?php

class crawldata
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getProducts($brandID)
	{
		$brandID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $brandID));
		$brandName = "";

		switch ($brandID) {
			case 16:
				$brandName = "samsung";
				break;
			case 15:
				$brandName = "xiaomi";
				break;
			case 18:
				$brandName = "apple-iphone";
				break;
			case 17:
				$brandName = "realme";
				break;
		}
		if ($brandName !== "") {
			$html =  file_get_html("https://www.thegioididong.com/dtdd-" . $brandName);
			$dataGets = $html->find("ul.listproduct li.item.ajaxed");
			$products = [];

			for ($i = 0; $i < 15; $i++) {
				$product = [];
				$product["brand"] = $brandID;
				$product["name"] = trim($dataGets[$i]->find("a h3", 0)->innertext);
				$product["price"] = $this->fm->getPrice(str_replace(".", "",  $dataGets[$i]->find("a strong.price", 0)->innertext));
				$product["desc"] = trim($dataGets[$i]->find("div.utility p", 0)->innertext . " " . $dataGets[$i]->find("div.utility p", 1)->innertext . " " . $dataGets[$i]->find("div.utility p", 2)->innertext);
				$product["image"] = trim($dataGets[$i]->find("div.item-img img.lazyload", 0)->{"data-src"});
				$products[] = $product;
			}

			return $products;
		}
		return false;
	}
}
?>