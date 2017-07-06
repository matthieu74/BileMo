<?php
namespace AuthBundle\Command;

use ClientBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class CreateOauthUserCommand extends Command
{
	const USERNAME = 'username';
	const EMAIL = 'email';
	const PASSWORD = 'password';
	const CUSTOMER = 'customer';
	const ROLE = 'role';
	const PATTERN = '/^[a-zA-Z0-9]+$/';
	
	private $entityManager;
	
	public function __construct(EntityManagerInterface $entityManager)
	{
		parent::__construct();
		
		$this->entityManager = $entityManager;
	}
	
	protected function configure()
	{
		$this
			->setName('create:oauth:user')
			->setDescription('Creates a new OAuth user.')
			->addOption(
					self::USERNAME,
					null,
					InputOption::VALUE_REQUIRED,
					'Sets username for user.'
					)
			->addOption(
					self::CUSTOMER,
					null,
					InputOption::VALUE_REQUIRED,
					'Sets customer for user.'
					)
			->addOption(
					self::PASSWORD,
					null,
					InputOption::VALUE_REQUIRED,
					'Sets password for user.'
					)
			->addOption(
					self::EMAIL,
					null,
					InputOption::VALUE_REQUIRED,
					'Sets email for user.'
					);
	}
	
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->validatePassword($input->getOption(self::PASSWORD));
		$this->validateEmail($input->getOption(self::EMAIL));
		$id = $input->getOption(self::CUSTOMER);
		$output->writeln(var_dump($id));
		$client =  $this->entityManager->getRepository('ClientBundle:Customer')->find($id);
		
		
		$user = new User();
		$user->setUsername($input->getOption(self::USERNAME));
		$encoder = $this->getApplication()->getKernel()->getContainer()->get('security.password_encoder');
		$password = $input->getOption(self::PASSWORD);
		$encoded = $encoder->encodePassword($user, $password);
		$user->setPassword($encoded);
		$user->setCustomer($client);
		$user->setEmail($input->getOption(self::EMAIL));
		
		$this->entityManager->persist($user);
		$this->entityManager->flush();
		
		$this->echoCredentials($input, $output);
	}
	
	private function validatePassword($password)
	{
		if (!preg_match(self::PATTERN, $password)) {
			throw new BadCredentialsException(sprintf('Password must contain only numbers and letters.'));
		}
	}
	
	private function validateEmail($email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new BadCredentialsException(sprintf('Email must be a valid value.'));
		}
	}
	
	
	private function echoCredentials(InputInterface $input, OutputInterface $output)
	{
		$output->writeln('OAuth user has been created...');
		$output->writeln(sprintf('Username: %s', $input->getOption(self::USERNAME)));
		$output->writeln(sprintf('Password: %s', $input->getOption(self::PASSWORD)));
	}
}