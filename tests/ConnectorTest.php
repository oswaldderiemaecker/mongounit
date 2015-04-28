<?php

use Zumba\PHPUnit\Extensions\Mongo\Client\Connector;

class ConnectorTest extends \PHPUnit_Framework_TestCase {

	public function testGeneralConnection() {
		$connection = new Connector(new \MongoClient("mongodb://127.0.0.1"));
		$connection->setDb('test');
		$this->assertInstanceOf('Zumba\PHPUnit\Extensions\Mongo\Client\Connector', $connection);
		$connection->collection('test')->insert(array(
			'document' => 'test document'
		));
		$this->assertCount(1, $connection->collection('test')->find());
		$connection->collection('test')->drop();
	}

}
