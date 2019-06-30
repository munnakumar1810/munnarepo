<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends MY_Model {

	public function document_type_list($businessTypeId = NULL)
	{
		if (!is_null($businessTypeId)) {

			$sql = "SELECT dt.*
					FROM business_document_type AS bdt
					LEFT JOIN document_type AS dt
					ON bdt.documentTypeId = dt.documentTypeId
					WHERE bdt.businessTypeId = '".$businessTypeId."'";

			$list = $this->fetch($sql);

		} else {

			$list = $this->get('document_type');
		}
		return $list;
	}


	public function documentType_list($businessTypeId = NULL)
	{
		if (!is_null($businessTypeId)) {

			$sql = "SELECT dt.documentTypeId AS id, dt.documentTypeName AS documentName
					FROM business_document_type AS bdt
					LEFT JOIN document_type AS dt
					ON bdt.documentTypeId = dt.documentTypeId
					WHERE bdt.businessTypeId = '".$businessTypeId."'";
			$list = $this->fetch($sql);

		} else {

			$list = $this->get('document_type');
		}
		return $list;
	}


	public function getSellerDocuments($sellerId)
	{
		return $this->get('seller_document', false, 'sellerId', $sellerId);
	}


	public function getBusinessArray($documentTypeId)
	{
		$array = $list = array();
		$list = $this->get('business_document_type', false, 'documentTypeId', $documentTypeId);
		if (count($list) > 0) {
			foreach ($list as $key => $v) {
				array_push($array, $v->businessTypeId);
			}
		}
		return $array;
	}

}

/* End of file Business.php */
/* Location: ./application/models/Business.php */