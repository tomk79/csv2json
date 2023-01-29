<?php
/**
 * test for tomk79/csv2json
 */
class mainTest extends PHPUnit\Framework\TestCase{

	public function setUp() : void{
		mb_internal_encoding('UTF-8');
	}


	/**
	 * 普通にインスタンス化して実行してみるテスト
	 */
	public function testStandard(){
		$this->assertEquals( 1, 1 );
	}

}
