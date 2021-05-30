<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php require "crawl.php" ?>

<?php

class crawldata
{
	public $db;
	public function __construct()
	{
		$this->fm = new Format();
		$this->db = new Database();
	}

	public function getNews()
	{
		$html =  file_get_html("https://www.techrum.vn");
		$getPosts = $html->find("div.block-container.porta-article-container");
		$posts = [];

		for ($i =  0; $i < 10; $i++) {
			$post = [];
			$post["title"] = trim($getPosts[$i]->find("h2.block-header a", 0)->innertext);
			$post["href"] = trim($getPosts[$i]->find("h2.block-header a", 0)->href);
			$post["author"] = trim($getPosts[$i]->find("ul.listInline.listInline--bullet a.u-concealed", 0)->innertext);
			$post["time"] = trim($getPosts[$i]->find("ul.listInline.listInline--bullet a.u-concealed time.u-dt", 0)->innertext);
			$post["view"] = trim($getPosts[$i]->find("div.message-attribution-opposite ul.listInline.listInline--bullet li", 0)->plaintext);
			$post["image"] = trim($getPosts[$i]->find("div.bbWrapper img", 0)->src);
			$post["content"] = trim($getPosts[$i]->find("div.bbWrapper ", 0)->plaintext);
			$posts[] = $post;
		}

		return $posts;
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