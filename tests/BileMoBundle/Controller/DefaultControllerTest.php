<?php

namespace BileMoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
	
	
	
    public function testAuthPhone()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/phones');
        $this->assertContains('A Token was not found in the TokenStorage', $client->getResponse()->getContent());
    }
    
    public function testAuthUsers()
    {
    	$client = static::createClient();    	
    	$crawler = $client->request('GET', '/users');
    	$this->assertContains('A Token was not found in the TokenStorage', $client->getResponse()->getContent());
    }
    
   
    
    private function Connection()
    {
    	$oauthHeaders = [
    			"client_id" => "1_64q8h9ndjhwcokk8wkwco44cg8oog8ogk8s84kokcgk0ogw4cs",
    			"client_secret" => "2u4ea92mez0go4sow80ogkoc84wo8gogwc0oc00coo4wo8cko4",
    			"grant_type" => "password",
    			"username" => "123",
    			"password" => "123"
    	];
    	
    	$client = static::createClient();
    	$crawler = $client->request('GET', '/oauth/v2/token', $oauthHeaders);
    	return $client->getResponse()->getContent();
    	 
    }
    
    public function testConnection()
    {
    	
    	$data = $this->Connection();
    	$this->assertContains('access_token', $data);
    	
    }
    
    public function testBadPassword()
    {
    	
    	$oauthHeaders = [
    			"client_id" => "1_64q8h9ndjhwcokk8wkwco44cg8oog8ogk8s84kokcgk0ogw4cs",
    			"client_secret" => "2u4ea92mez0go4sow80ogkoc84wo8gogwc0oc00coo4wo8cko4",
    			"grant_type" => "password",
    			"username" => "123",
    			"password" => "badpassword"
    	];
    	
    	$client = static::createClient();
    	$crawler = $client->request('GET', '/oauth/v2/token', $oauthHeaders);
    	$data = $client->getResponse()->getContent();
    	$this->assertContains('error', $data);
    	
    }
    
    public function testBadUser()
    {
    	
    	$oauthHeaders = [
    			"client_id" => "1_64q8h9ndjhwcokk8wkwco44cg8oog8ogk8s84kokcgk0ogw4cs",
    			"client_secret" => "2u4ea92mez0go4sow80ogkoc84wo8gogwc0oc00coo4wo8cko4",
    			"grant_type" => "password",
    			"username" => "badUser",
    			"password" => "123"
    	];
    	
    	$client = static::createClient();
    	$crawler = $client->request('GET', '/oauth/v2/token', $oauthHeaders);
    	$data = $client->getResponse()->getContent();
    	$this->assertContains('error', $data);
    }
    
    public function testError404()
    {
    	
    	$data = $this->Connection();
    	$json = json_decode($data);
    	$accessToken= $json->{'access_token'};
    	
    	$headers = array(
    			'HTTP_AUTHORIZATION' => "Bearer {$accessToken}",
    			'CONTENT_TYPE' => 'application/json',
    	);
    	
    	$client = static::createClient();
    	$crawler = $client->request('GET', '/page404', array(), array(), $headers);
    	$data = $client->getResponse()->getContent();
    	$this->assertContains('No route found', $data);
    }
    
    public function testPhones()
    {
    	
    	$data = $this->Connection();
    	$json = json_decode($data);
    	$accessToken= $json->{'access_token'};
    	
    	$headers = array(
    			'HTTP_AUTHORIZATION' => "Bearer {$accessToken}",
    			'CONTENT_TYPE' => 'application/json',
    	);
    	
    	$client = static::createClient();
    	$crawler = $client->request('GET', '/phones', array(), array(), $headers);
    	$data = $client->getResponse()->getContent();
    	$this->assertContains('phone_brand', $data);
    }
    
    public function testPhones_1()
    {
    	
    	$data = $this->Connection();
    	$json = json_decode($data);
    	$accessToken= $json->{'access_token'};
    	
    	$headers = array(
    			'HTTP_AUTHORIZATION' => "Bearer {$accessToken}",
    			'CONTENT_TYPE' => 'application/json',
    	);
    	
    	$client = static::createClient();
    	$crawler = $client->request('GET', '/phones/1', array(), array(), $headers);
    	$data = $client->getResponse()->getContent();
    	$this->assertContains('phone_brand', $data);
    }
    
    
    public function testUsers()
    {
    	
    	$data = $this->Connection();
    	$json = json_decode($data);
    	$accessToken= $json->{'access_token'};
    	
    	$headers = array(
    			'HTTP_AUTHORIZATION' => "Bearer {$accessToken}",
    			'CONTENT_TYPE' => 'application/json',
    	);
    	
    	$client = static::createClient();
    	$crawler = $client->request('GET', '/users', array(), array(), $headers);
    	$data = $client->getResponse()->getContent();
    	$this->assertContains('username', $data);
    }
    
    public function testUsers_1()
    {
    	
    	$data = $this->Connection();
    	$json = json_decode($data);
    	$accessToken= $json->{'access_token'};
    	
    	$headers = array(
    			'HTTP_AUTHORIZATION' => "Bearer {$accessToken}",
    			'CONTENT_TYPE' => 'application/json',
    	);
    	
    	$client = static::createClient();
    	$crawler = $client->request('GET', '/users/1', array(), array(), $headers);
    	$data = $client->getResponse()->getContent();
    	$this->assertContains('username', $data);
    }
    
    
    public function testPostUser()
    {
    	
    	$data = $this->Connection();
    	$json = json_decode($data);
    	$accessToken= $json->{'access_token'};
    	
    	$headers = array(
    			'HTTP_AUTHORIZATION' => "Bearer {$accessToken}",
    			'CONTENT_TYPE' => 'application/json',
    	);
    	
    	$param = '{
			    "username": "moi3",
			    "email": "moi_aussi_encore@pero.com",
			    "password": "pass"
			}';
    	
    	$paramArray = array('username' => 'moi4',
			    'email' => 'moi4_aussi_encore@pero.com',
			    'password' => 'pass');
    	
    	$client = static::createClient();
    	$crawler = $client->request('POST', '/users', array(),array(), $headers, json_encode($paramArray));
    	$data = $client->getResponse()->getContent();
    	$this->assertContains('username', $data);
    }
    
    public function testBadToken()
    {
    	    	
    	$headers = array(
    			'HTTP_AUTHORIZATION' => "Bearer FCsfdsijnosdnoicjhdxc",
    			'CONTENT_TYPE' => 'application/json',
    	);
    	
    	$client = static::createClient();
    	$crawler = $client->request('GET', '/phones/1', array(), array(), $headers);
    	$data = $client->getResponse()->getContent();
    	$this->assertContains('error', $data);
    }
}
