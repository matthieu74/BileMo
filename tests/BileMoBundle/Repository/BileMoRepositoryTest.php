<?php
namespace Tests\BileMoBundle\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BileMoRepositoryTest extends KernelTestCase
{
	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $em;
	
	/**
	 * {@inheritDoc}
	 */
	protected function setUp()
	{
		self::bootKernel();
		
		$this->em = static::$kernel->getContainer()
		->get('doctrine')
		->getManager();
	}
	
	public function testSearchByIdPhone()
	{
		$phones = $this->em->getRepository('BileMoBundle:Phone')->find(1);
		
		$this->assertContains('Galaxy', $phones->getName());
		
		$this->assertContains('Galaxy', $phones->getDescription());
		
		$features = $phones->getFeature();
		
		
		$this->assertNotEmpty( $phones->getPriceExclTax());
		$this->assertNotEmpty( $phones->getPriceInclTax());
		
		$phoneBrand = $phones->getPhoneBrand();
		$this->assertContains('Samsung', $phoneBrand->getName());
		$this->assertNotEmpty($phoneBrand->getCountry());
		
		$phones->setName('name');
		$this->assertContains('name', $phones->getName());
		
		
		$phones->setDescription('name');
		$this->assertContains('name', $phones->getDescription());
		
	}
	
	
	public function testSearchByIdClient()
	{
		$client = $this->em->getRepository('ClientBundle:Customer')->find(1);
		
		
		$this->assertNotEmpty( $client->getName());
		$this->assertNotEmpty( $client->getPhoneNumber());
		$this->assertNotEmpty( $client->getAddress());
		$this->assertNotEmpty( $client->getCity());
		$this->assertNotEmpty( $client->getCountry());
		$this->assertNotEmpty( $client->getPostalCode());
	}
	
	
	
	/**
	 * {@inheritDoc}
	 */
	protected function tearDown()
	{
		parent::tearDown();
		
		$this->em->close();
		$this->em = null; // avoid memory leaks
	}
}