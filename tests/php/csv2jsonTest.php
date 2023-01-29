<?php
/**
 * test for tomk79\csv2json
 * 
 * $ cd (project dir)
 * $ ./vendor/phpunit/phpunit/phpunit tests/php/csv2jsonTest.php csv2json
 */

class csv2jsonTest extends PHPUnit\Framework\TestCase{
	private $fs;

	public function setUp() : void{
		mb_internal_encoding('UTF-8');
	}

	/**
	 * 普通にCSVを読み込むテスト
	 */
	public function testStandard(){

		$csv2json = new \tomk79\csv2json( __DIR__.'/../testData/standard.csv' );
		$assoc = $csv2json->fetch_assoc();

		$this->assertTrue( is_array( $assoc ) );
		$this->assertEquals( $assoc[0]['a'], '1' );
		$this->assertEquals( $assoc[9]['g'], 'g10' );
		$this->assertNull( $assoc[10]['g'] ?? null );
		$this->assertNull( $assoc[0]['empty'] ?? null );

		$json_string = $csv2json->to_json();
		$this->assertTrue( is_string( $json_string ) );

		$decoded_json = json_decode( $json_string );
		// var_dump($decoded_json);
		$this->assertEquals( $decoded_json[0]->a, '1' );
		$this->assertEquals( $decoded_json[9]->g, 'g10' );
		$this->assertNull( $decoded_json[10]->g ?? null );
		$this->assertNull( $decoded_json[0]->empty ?? null );

	}

}
