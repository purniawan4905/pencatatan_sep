<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * pengguna_username_value_exist Model Action
     * @return array
     */
	function pengguna_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("pengguna");
		return $exist;
	}

	/**
     * pengguna_email_value_exist Model Action
     * @return array
     */
	function pengguna_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("pengguna");
		return $exist;
	}

	/**
     * getcount_rawatinap Model Action
     * @return Value
     */
	function getcount_rawatinap(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM rawat_inap";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_rawatjalan Model Action
     * @return Value
     */
	function getcount_rawatjalan(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM rawat_jalan";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_pengguna Model Action
     * @return Value
     */
	function getcount_pengguna(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pengguna";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* barchart_rawatinap Model Action
	* @return array
	*/
	function barchart_rawatinap(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  ri.id, ri.No_RM, COUNT(ri.No_SEP) AS count_of_No_SEP, ri.Nama_Pasien, ri.Tanggal_Masuk, ri.Tanggal_Keluar, ri.Keterangan FROM rawat_inap AS ri GROUP BY ri.Tanggal_Keluar";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_No_SEP');
		$dataset_labels =  array_column($dataset1, 'Tanggal_Keluar');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* barchart_rawatjalan Model Action
	* @return array
	*/
	function barchart_rawatjalan(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  rj.id, rj.No_RM, COUNT(rj.No_SEP) AS count_of_No_SEP, rj.Nama_Pasien, rj.Tanggal_Masuk, rj.Keterangan FROM rawat_jalan AS rj GROUP BY rj.Tanggal_Masuk";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_No_SEP');
		$dataset_labels =  array_column($dataset1, 'Tanggal_Masuk');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* barchart_rawatinapbytanggalmasuk Model Action
	* @return array
	*/
	function barchart_rawatinapbytanggalmasuk(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  ri.id, ri.No_RM, COUNT(ri.No_SEP) AS count_of_No_SEP, ri.Nama_Pasien, ri.Tanggal_Masuk, ri.Tanggal_Keluar, ri.Keterangan FROM rawat_inap AS ri GROUP BY ri.Tanggal_Masuk";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_No_SEP');
		$dataset_labels =  array_column($dataset1, 'Tanggal_Masuk');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

}
