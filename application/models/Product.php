<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Model {


	public function getCategories($productBazar = false)
	{
		return $this->get('category', false, 'status', 1);
	}


	public function getSubCategories($categoryId)
	{
		if (!is_null($categoryId)) {

			$where = array(
				'status' => 1,
				'categoryId' => $categoryId
			);
			$list = $this->get_by('subcategory', false, $where);

		} else {

			$list = $this->get('subcategory', false, 'status', 1);
		}
		return $list;
	}


	public function getProductDetails($productId, $sellerId = false)
	{
		$sql = "SELECT * 
				FROM products AS p
				LEFT JOIN subcategory AS s
				ON s.subcategoryId = p.subcategoryId
				WHERE p.productId = '".$productId."'";
		if ($sellerId != false) {
			$sql .= " AND p.sellerId = '".$sellerId."'";
		}
		$data = $this->fetch($sql, true);
		return $data;
	}


	public function getAllProductsListBySeller($sellerId = null, $where = '')
	{
		if ($sellerId != null) {
			$where .= " WHERE p.sellerId = $sellerId ";
		}
		$sql = "SELECT p.productId, p.productName, p.sku, p.price, p.maxPrice, p.stock, p.status,p.isFeatured, sc.subcategoryName, c.categoryName, (SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage, u.firstName, u.lastName
		FROM products AS p
		JOIN users AS u ON u.userId = p.sellerId
		JOIN subcategory AS sc ON sc.subcategoryId = p.subcategoryId
		JOIN category AS c ON c.categoryId = sc.categoryId
		$where
		ORDER BY p.productId DESC";
		$list = $this->fetch($sql);

		return $list;
	}


	public function getAllProductsListByCategory($categoryId, $userId = null)
	{
		$sql = "SELECT p.productId, p.productName, p.price, p.maxPrice, (SELECT pi.productImage FROM product_images AS pi WHERE pi.productId = p.productId LIMIT 1) AS productImage, p.stock 
		FROM subcategory AS sc
		JOIN products AS p
		ON p.subcategoryId = sc.subcategoryId
		WHERE sc.categoryId = '$categoryId'
		AND p.status = 1
		ORDER BY p.modified DESC";
		$list = $this->fetch($sql);
		return $list;
	}


	public function addProductToCart($userId, $productId, $quantity)
	{
		$where = array(
			'productId' => $productId,
			'userId' => $userId
		);
		$array = array(
			'productId' => $productId,
			'userId' => $userId,
			'quantity' => $quantity
		);
		if ($this->count('cart', $where) > 0) {

			if (!$this->update($array, 'cart', $where)) {
				return 'Could not update cart, please try again later.';
			} else {
				return 'updated';
			}

		} else {

			if (!$this->save('cart', $array)) {
				return 'Could add to cart, please try again later.';
			} else {
				return 'added';
			}
		}
	}


	public function CartList($userId)
	{
		$sql = "SELECT p.productId AS id, p.productName AS name, p.maxPrice AS actualPrice, p.price AS discountedPrice, 4.5 AS rating, 10 AS totalReviews, (SELECT pi.productImage FROM product_images AS pi WHERE pi.productId = p.productId LIMIT 1) AS baseImage, 1 AS isFavorite, c.quantity, p.stock AS maxQuantity 
		FROM cart AS c 
		LEFT JOIN products AS p 
		ON p.productId = c.productId 
		WHERE c.userId = '$userId'";
		return $this->fetch($sql);
	}


	public function addReviewOnProduct($data)
	{
		$where = array(
			'userId' => $data['userId'],
			'productId' => $data['productId']
		);
		$array = array(
			'userId' => $data['userId'],
			'productId' => $data['productId'],
			'title' => $data['title'],
			'starRating' => $data['starRating'],
			'review' => $data['review']
		);
		if ($this->count('product_rating', $where) == 0) {

			$array['created'] = date('Y-m-d H:i:s');

			if (!$this->save('product_rating', $array)) {
				return false; 
			} else {
				return true; 
			}

		} else {

			if (!$this->update($array, 'product_rating', $where)) {
				return false; 
			} else {
				return true; 
			}
		}
	}


	public function productAvgStarRating($productId)
	{
		$sql = "SELECT AVG(starRating) AS avgStarRating FROM product_rating WHERE productId = '$productId'";
		return $this->fetch($sql, true)->avgStarRating;
	}


	public function productReviewsList($productId)
	{
		$sql = "SELECT pr.userId, pr.title, u.firstName, u.lastName, pr.modified AS postedOn, pr.starRating, pr.review
		FROM product_rating AS pr
		LEFT JOIN users AS u
		ON u.userId = pr.userId
		WHERE pr.productId = '$productId'";
		return $this->fetch($sql);
	}

}

/* End of file Product.php */
/* Location: ./application/models/Product.php */