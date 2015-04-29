<?php

use Zumba\PHPUnit\Extensions\Mongo\Client\Connector;

class ConnectorTest extends \PHPUnit_Framework_TestCase {

	public function testGeneralConnection() {
    //sleep(30);
		$connection = new Connector(new \MongoClient());
		$connection->setDb('test');
		$this->assertInstanceOf('Zumba\PHPUnit\Extensions\Mongo\Client\Connector', $connection);
		$connection->collection('test')->insert(array(
			'document' => 'test document'
		));
		$this->assertCount(1, $connection->collection('test')->find());
		$connection->collection('test')->drop();
	}

}
