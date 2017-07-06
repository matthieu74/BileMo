<?php
namespace AuthBundle\Command;

use FOS\OAuthServerBundle\Entity\Client;
use FOS\OAuthServerBundle\Entity\ClientManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateOauthClientCommand extends Command
{
	const GRANT_TYPE = 'grant-type';
	
	private $clientManager;
	
	public function __construct(ClientManager $clientManager)
	{
		parent::__construct();
		
		$this->clientManager = $clientManager;
	}
	
	protected function configure()
	{
		$this
		->setName('create:oauth:client')
		->setDescription('Creates a new OAuth client.')
		->addOption(
				self::GRANT_TYPE,
				null,
				InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
				'Sets allowed grant type for client. Can be used multiple times.'
				);
	}
	
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		/** @var Client $client */
		$client = $this->clientManager->createClient();
		$client->setAllowedGrantTypes($input->getOption(self::GRANT_TYPE));
		
		$this->clientManager->updateClient($client);
		
		$this->echoCredentials($output, $client);
	}
	
	private function echoCredentials(OutputInterface $output, Client $client)
	{
		$output->writeln('OAuth client has been created...');
		$output->writeln(sprintf('Public ID: %s', $client->getPublicId()));
		$output->writeln(sprintf('Secret ID: %s', $client->getSecret()));
	}
}