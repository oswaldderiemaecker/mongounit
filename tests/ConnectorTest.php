<?php

use Zumba\PHPUnit\Extensions\Mongo\Client\Connector;

class ConnectorTest extends \PHPUnit_Framework_TestCase {

	public function testGeneralConnection() {
    //sleep(5);
    $connection = new Connector(new \MongoClient(
"mongodb://localhost:27017", 
    array(
        "socketTimeoutMS" => 100000
    ) 
));
		$connection->setDb('test');
		$this->assertInstanceOf('Zumba\PHPUnit\Extensions\Mongo\Client\Connector', $connection);
		$connection->collection('test')->insert(array(
			'document' => 'test document'
		));
		$this->assertCount(1, $connection->collection('test')->find());
		$connection->collection('test')->drop();
	}

}
