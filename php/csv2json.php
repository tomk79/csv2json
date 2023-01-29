<?php
/**
 * csv2json.php
 */
namespace tomk79;

/**
 * class csv2json
 */
class csv2json {
	private $fs;
	private $path_csv;
	private $key_index;
	private $rows;

	/**
	 * constructor
	 * @param $path_csv string CSVのパス
	 */
	public function __construct( $path_csv ){
		$this->fs = new filesystem();
		$this->path_csv = $path_csv;

		$csv = $this->fs->read_csv( $this->path_csv );
		$this->key_index = array_shift( $csv );

		$this->rows = array();
		foreach( $csv as $csv_row ){
			$row = array();
			foreach( $this->key_index as $idx=>$key ){
				if( !strlen( $key ) ){ continue; }
				$row[$key] = $csv_row[$idx];
			}
			array_push( $this->rows, $row );
		}
	}

	/**
	 * CSVの内容を連想配列で受け取る
	 * 
	 * @return array 連想配列
	 */
	public function fetch_assoc(){
		$rtn = $this->rows;
		return $rtn;
	}

	/**
	 * CSVの内容をJSON形式のテキストで受け取る
	 * 
	 * @return string JSONテキスト
	 */
	public function to_json(){
		$rtn = $this->rows;
		$rtn = json_encode($rtn);
		return $rtn;
	}

}
