<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app/config/config.neon 
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app/config/config.local.neon 

class Container_79c4e50a4e extends Nette\DI\Container
{
	protected $meta = [
		'types' => [
			'Nette\Application\Application' => [1 => ['application.application']],
			'Nette\Application\IPresenterFactory' => [1 => ['application.presenterFactory']],
			'Nette\Application\LinkGenerator' => [1 => ['application.linkGenerator']],
			'Nette\Caching\Storages\IJournal' => [1 => ['cache.journal']],
			'Nette\Caching\IStorage' => [1 => ['cache.storage']],
			'Nette\Database\Connection' => [1 => ['database.default.connection']],
			'Nette\Database\IStructure' => [1 => ['database.default.structure']],
			'Nette\Database\Structure' => [1 => ['database.default.structure']],
			'Nette\Database\IConventions' => [1 => ['database.default.conventions']],
			'Nette\Database\Conventions\DiscoveredConventions' => [1 => ['database.default.conventions']],
			'Nette\Database\Context' => [1 => ['database.default.context']],
			'Nette\Http\RequestFactory' => [1 => ['http.requestFactory']],
			'Nette\Http\IRequest' => [1 => ['http.request']],
			'Nette\Http\Request' => [1 => ['http.request']],
			'Nette\Http\IResponse' => [1 => ['http.response']],
			'Nette\Http\Response' => [1 => ['http.response']],
			'Nette\Http\Context' => [1 => ['http.context']],
			'Nette\Bridges\ApplicationLatte\ILatteFactory' => [1 => ['latte.latteFactory']],
			'Nette\Application\UI\ITemplateFactory' => [1 => ['latte.templateFactory']],
			'Nette\Mail\IMailer' => [1 => ['mail.mailer']],
			'Nette\Application\IRouter' => [1 => ['routing.router']],
			'Nette\Security\IUserStorage' => [1 => ['security.userStorage']],
			'Nette\Security\User' => [1 => ['security.user']],
			'Nette\Http\Session' => [1 => ['session.session']],
			'Tracy\ILogger' => [1 => ['tracy.logger']],
			'Tracy\BlueScreen' => [1 => ['tracy.blueScreen']],
			'Tracy\Bar' => [1 => ['tracy.bar']],
			'Nette\Object' => [
				['cronner.timestampStorage', 'cronner.criticalSection'],
				['cronner.runner'],
			],
			'stekycz\Cronner\ITimestampStorage' => [['cronner.timestampStorage']],
			'stekycz\Cronner\TimestampStorage\FileStorage' => [['cronner.timestampStorage']],
			'stekycz\Cronner\CriticalSection' => [['cronner.criticalSection']],
			'stekycz\Cronner\Cronner' => [1 => ['cronner.runner']],
			'App\FrontModule\Forms\DeviceAddFormFactory' => [1 => ['27_App_FrontModule_Forms_DeviceAddFormFactory']],
			'App\FrontModule\Forms\DeviceEditFormFactory' => [1 => ['28_App_FrontModule_Forms_DeviceEditFormFactory']],
			'App\FrontModule\Forms\FormFactory' => [1 => ['29_App_FrontModule_Forms_FormFactory']],
			'App\FrontModule\Forms\ResultIgnoreFormFactory' => [1 => ['30_App_FrontModule_Forms_ResultIgnoreFormFactory']],
			'App\FrontModule\Forms\ResultToleranceFormFactory' => [1 => ['31_App_FrontModule_Forms_ResultToleranceFormFactory']],
			'App\FrontModule\Forms\ShootAddFormFactory' => [1 => ['32_App_FrontModule_Forms_ShootAddFormFactory']],
			'App\FrontModule\Forms\SignInFormFactory' => [1 => ['33_App_FrontModule_Forms_SignInFormFactory']],
			'App\FrontModule\Forms\SignUpFormFactory' => [1 => ['34_App_FrontModule_Forms_SignUpFormFactory']],
			'App\FrontModule\Forms\UserAddFormFactory' => [1 => ['35_App_FrontModule_Forms_UserAddFormFactory']],
			'App\FrontModule\Forms\UserEditFormFactory' => [1 => ['36_App_FrontModule_Forms_UserEditFormFactory']],
			'App\FrontModule\Model\DeviceManager' => [1 => ['37_App_FrontModule_Model_DeviceManager']],
			'App\FrontModule\Model\DeviceTypeManager' => [1 => ['38_App_FrontModule_Model_DeviceTypeManager']],
			'App\FrontModule\Model\ResultManager' => [1 => ['39_App_FrontModule_Model_ResultManager']],
			'App\FrontModule\Model\SessionManager' => [1 => ['40_App_FrontModule_Model_SessionManager']],
			'App\FrontModule\Model\ShootManager' => [1 => ['41_App_FrontModule_Model_ShootManager']],
			'Nette\Security\IAuthenticator' => [1 => ['42_App_FrontModule_Model_UserManager']],
			'App\FrontModule\Model\UserManager' => [1 => ['42_App_FrontModule_Model_UserManager']],
			'App\FrontModule\Model\UserRoleManager' => [1 => ['43_App_FrontModule_Model_UserRoleManager']],
			'App\FrontModule\Presenters\BasePresenter' => [
				1 => [
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\Application\UI\Presenter' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\Application\UI\Control' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\Application\UI\Component' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\ComponentModel\Container' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\ComponentModel\Component' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\Application\UI\IRenderable' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\ComponentModel\IContainer' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\ComponentModel\IComponent' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\Application\UI\ISignalReceiver' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\Application\UI\IStatePersistent' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'ArrayAccess' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
				],
			],
			'Nette\Application\IPresenter' => [
				[
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
				],
			],
			'App\FrontModule\Presenters\ComparePresenter' => [1 => ['application.1']],
			'App\FrontModule\Presenters\CronPresenter' => [1 => ['application.2']],
			'App\FrontModule\Presenters\DevicePresenter' => [1 => ['application.3']],
			'App\FrontModule\Presenters\Error4xxPresenter' => [1 => ['application.4']],
			'App\FrontModule\Presenters\ErrorPresenter' => [1 => ['application.5']],
			'App\FrontModule\Presenters\HomepagePresenter' => [1 => ['application.6']],
			'App\FrontModule\Presenters\ShootPresenter' => [1 => ['application.7']],
			'App\FrontModule\Presenters\SignPresenter' => [1 => ['application.8']],
			'App\FrontModule\Presenters\UserPresenter' => [1 => ['application.9']],
			'NetteModule\ErrorPresenter' => [1 => ['application.10']],
			'NetteModule\MicroPresenter' => [1 => ['application.11']],
			'Nette\DI\Container' => [1 => ['container']],
		],
		'services' => [
			'27_App_FrontModule_Forms_DeviceAddFormFactory' => 'App\FrontModule\Forms\DeviceAddFormFactory',
			'28_App_FrontModule_Forms_DeviceEditFormFactory' => 'App\FrontModule\Forms\DeviceEditFormFactory',
			'29_App_FrontModule_Forms_FormFactory' => 'App\FrontModule\Forms\FormFactory',
			'30_App_FrontModule_Forms_ResultIgnoreFormFactory' => 'App\FrontModule\Forms\ResultIgnoreFormFactory',
			'31_App_FrontModule_Forms_ResultToleranceFormFactory' => 'App\FrontModule\Forms\ResultToleranceFormFactory',
			'32_App_FrontModule_Forms_ShootAddFormFactory' => 'App\FrontModule\Forms\ShootAddFormFactory',
			'33_App_FrontModule_Forms_SignInFormFactory' => 'App\FrontModule\Forms\SignInFormFactory',
			'34_App_FrontModule_Forms_SignUpFormFactory' => 'App\FrontModule\Forms\SignUpFormFactory',
			'35_App_FrontModule_Forms_UserAddFormFactory' => 'App\FrontModule\Forms\UserAddFormFactory',
			'36_App_FrontModule_Forms_UserEditFormFactory' => 'App\FrontModule\Forms\UserEditFormFactory',
			'37_App_FrontModule_Model_DeviceManager' => 'App\FrontModule\Model\DeviceManager',
			'38_App_FrontModule_Model_DeviceTypeManager' => 'App\FrontModule\Model\DeviceTypeManager',
			'39_App_FrontModule_Model_ResultManager' => 'App\FrontModule\Model\ResultManager',
			'40_App_FrontModule_Model_SessionManager' => 'App\FrontModule\Model\SessionManager',
			'41_App_FrontModule_Model_ShootManager' => 'App\FrontModule\Model\ShootManager',
			'42_App_FrontModule_Model_UserManager' => 'App\FrontModule\Model\UserManager',
			'43_App_FrontModule_Model_UserRoleManager' => 'App\FrontModule\Model\UserRoleManager',
			'application.1' => 'App\FrontModule\Presenters\ComparePresenter',
			'application.10' => 'NetteModule\ErrorPresenter',
			'application.11' => 'NetteModule\MicroPresenter',
			'application.2' => 'App\FrontModule\Presenters\CronPresenter',
			'application.3' => 'App\FrontModule\Presenters\DevicePresenter',
			'application.4' => 'App\FrontModule\Presenters\Error4xxPresenter',
			'application.5' => 'App\FrontModule\Presenters\ErrorPresenter',
			'application.6' => 'App\FrontModule\Presenters\HomepagePresenter',
			'application.7' => 'App\FrontModule\Presenters\ShootPresenter',
			'application.8' => 'App\FrontModule\Presenters\SignPresenter',
			'application.9' => 'App\FrontModule\Presenters\UserPresenter',
			'application.application' => 'Nette\Application\Application',
			'application.linkGenerator' => 'Nette\Application\LinkGenerator',
			'application.presenterFactory' => 'Nette\Application\IPresenterFactory',
			'cache.journal' => 'Nette\Caching\Storages\IJournal',
			'cache.storage' => 'Nette\Caching\IStorage',
			'container' => 'Nette\DI\Container',
			'cronner.criticalSection' => 'stekycz\Cronner\CriticalSection',
			'cronner.runner' => 'stekycz\Cronner\Cronner',
			'cronner.timestampStorage' => 'stekycz\Cronner\TimestampStorage\FileStorage',
			'database.default.connection' => 'Nette\Database\Connection',
			'database.default.context' => 'Nette\Database\Context',
			'database.default.conventions' => 'Nette\Database\Conventions\DiscoveredConventions',
			'database.default.structure' => 'Nette\Database\Structure',
			'http.context' => 'Nette\Http\Context',
			'http.request' => 'Nette\Http\Request',
			'http.requestFactory' => 'Nette\Http\RequestFactory',
			'http.response' => 'Nette\Http\Response',
			'latte.latteFactory' => 'Latte\Engine',
			'latte.templateFactory' => 'Nette\Application\UI\ITemplateFactory',
			'mail.mailer' => 'Nette\Mail\IMailer',
			'routing.router' => 'Nette\Application\IRouter',
			'security.user' => 'Nette\Security\User',
			'security.userStorage' => 'Nette\Security\IUserStorage',
			'session.session' => 'Nette\Http\Session',
			'tracy.bar' => 'Tracy\Bar',
			'tracy.blueScreen' => 'Tracy\BlueScreen',
			'tracy.logger' => 'Tracy\ILogger',
		],
		'tags' => [
			'inject' => [
				'application.1' => TRUE,
				'application.10' => TRUE,
				'application.11' => TRUE,
				'application.2' => TRUE,
				'application.3' => TRUE,
				'application.4' => TRUE,
				'application.5' => TRUE,
				'application.6' => TRUE,
				'application.7' => TRUE,
				'application.8' => TRUE,
				'application.9' => TRUE,
				'cronner.criticalSection' => FALSE,
				'cronner.timestampStorage' => FALSE,
			],
			'nette.presenter' => [
				'application.1' => 'App\FrontModule\Presenters\ComparePresenter',
				'application.10' => 'NetteModule\ErrorPresenter',
				'application.11' => 'NetteModule\MicroPresenter',
				'application.2' => 'App\FrontModule\Presenters\CronPresenter',
				'application.3' => 'App\FrontModule\Presenters\DevicePresenter',
				'application.4' => 'App\FrontModule\Presenters\Error4xxPresenter',
				'application.5' => 'App\FrontModule\Presenters\ErrorPresenter',
				'application.6' => 'App\FrontModule\Presenters\HomepagePresenter',
				'application.7' => 'App\FrontModule\Presenters\ShootPresenter',
				'application.8' => 'App\FrontModule\Presenters\SignPresenter',
				'application.9' => 'App\FrontModule\Presenters\UserPresenter',
			],
		],
		'aliases' => [
			'application' => 'application.application',
			'cacheStorage' => 'cache.storage',
			'database.default' => 'database.default.connection',
			'httpRequest' => 'http.request',
			'httpResponse' => 'http.response',
			'nette.cacheJournal' => 'cache.journal',
			'nette.database.default' => 'database.default',
			'nette.database.default.context' => 'database.default.context',
			'nette.httpContext' => 'http.context',
			'nette.httpRequestFactory' => 'http.requestFactory',
			'nette.latteFactory' => 'latte.latteFactory',
			'nette.mailer' => 'mail.mailer',
			'nette.presenterFactory' => 'application.presenterFactory',
			'nette.templateFactory' => 'latte.templateFactory',
			'nette.userStorage' => 'security.userStorage',
			'router' => 'routing.router',
			'session' => 'session.session',
			'user' => 'security.user',
		],
	];


	public function __construct()
	{
		parent::__construct([
			'appDir' => 'C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app',
			'wwwDir' => 'C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\www',
			'debugMode' => FALSE,
			'productionMode' => TRUE,
			'consoleMode' => FALSE,
			'tempDir' => 'C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app/../temp',
		]);
	}


	/**
	 * @return App\FrontModule\Forms\DeviceAddFormFactory
	 */
	public function createService__27_App_FrontModule_Forms_DeviceAddFormFactory()
	{
		$service = new App\FrontModule\Forms\DeviceAddFormFactory($this->getService('29_App_FrontModule_Forms_FormFactory'),
			$this->getService('37_App_FrontModule_Model_DeviceManager'), $this->getService('38_App_FrontModule_Model_DeviceTypeManager'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Forms\DeviceEditFormFactory
	 */
	public function createService__28_App_FrontModule_Forms_DeviceEditFormFactory()
	{
		$service = new App\FrontModule\Forms\DeviceEditFormFactory($this->getService('29_App_FrontModule_Forms_FormFactory'),
			$this->getService('40_App_FrontModule_Model_SessionManager'), $this->getService('37_App_FrontModule_Model_DeviceManager'),
			$this->getService('38_App_FrontModule_Model_DeviceTypeManager'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Forms\FormFactory
	 */
	public function createService__29_App_FrontModule_Forms_FormFactory()
	{
		$service = new App\FrontModule\Forms\FormFactory;
		return $service;
	}


	/**
	 * @return App\FrontModule\Forms\ResultIgnoreFormFactory
	 */
	public function createService__30_App_FrontModule_Forms_ResultIgnoreFormFactory()
	{
		$service = new App\FrontModule\Forms\ResultIgnoreFormFactory($this->getService('29_App_FrontModule_Forms_FormFactory'),
			$this->getService('40_App_FrontModule_Model_SessionManager'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Forms\ResultToleranceFormFactory
	 */
	public function createService__31_App_FrontModule_Forms_ResultToleranceFormFactory()
	{
		$service = new App\FrontModule\Forms\ResultToleranceFormFactory($this->getService('29_App_FrontModule_Forms_FormFactory'),
			$this->getService('40_App_FrontModule_Model_SessionManager'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Forms\ShootAddFormFactory
	 */
	public function createService__32_App_FrontModule_Forms_ShootAddFormFactory()
	{
		$service = new App\FrontModule\Forms\ShootAddFormFactory($this->getService('29_App_FrontModule_Forms_FormFactory'),
			$this->getService('37_App_FrontModule_Model_DeviceManager'), $this->getService('38_App_FrontModule_Model_DeviceTypeManager'),
			$this->getService('41_App_FrontModule_Model_ShootManager'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Forms\SignInFormFactory
	 */
	public function createService__33_App_FrontModule_Forms_SignInFormFactory()
	{
		$service = new App\FrontModule\Forms\SignInFormFactory($this->getService('29_App_FrontModule_Forms_FormFactory'),
			$this->getService('security.user'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Forms\SignUpFormFactory
	 */
	public function createService__34_App_FrontModule_Forms_SignUpFormFactory()
	{
		$service = new App\FrontModule\Forms\SignUpFormFactory($this->getService('29_App_FrontModule_Forms_FormFactory'),
			$this->getService('42_App_FrontModule_Model_UserManager'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Forms\UserAddFormFactory
	 */
	public function createService__35_App_FrontModule_Forms_UserAddFormFactory()
	{
		$service = new App\FrontModule\Forms\UserAddFormFactory($this->getService('29_App_FrontModule_Forms_FormFactory'),
			$this->getService('42_App_FrontModule_Model_UserManager'), $this->getService('43_App_FrontModule_Model_UserRoleManager'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Forms\UserEditFormFactory
	 */
	public function createService__36_App_FrontModule_Forms_UserEditFormFactory()
	{
		$service = new App\FrontModule\Forms\UserEditFormFactory($this->getService('29_App_FrontModule_Forms_FormFactory'),
			$this->getService('40_App_FrontModule_Model_SessionManager'), $this->getService('42_App_FrontModule_Model_UserManager'),
			$this->getService('43_App_FrontModule_Model_UserRoleManager'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Model\DeviceManager
	 */
	public function createService__37_App_FrontModule_Model_DeviceManager()
	{
		$service = new App\FrontModule\Model\DeviceManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Model\DeviceTypeManager
	 */
	public function createService__38_App_FrontModule_Model_DeviceTypeManager()
	{
		$service = new App\FrontModule\Model\DeviceTypeManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Model\ResultManager
	 */
	public function createService__39_App_FrontModule_Model_ResultManager()
	{
		$service = new App\FrontModule\Model\ResultManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Model\SessionManager
	 */
	public function createService__40_App_FrontModule_Model_SessionManager()
	{
		$service = new App\FrontModule\Model\SessionManager($this->getService('session.session'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Model\ShootManager
	 */
	public function createService__41_App_FrontModule_Model_ShootManager()
	{
		$service = new App\FrontModule\Model\ShootManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Model\UserManager
	 */
	public function createService__42_App_FrontModule_Model_UserManager()
	{
		$service = new App\FrontModule\Model\UserManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Model\UserRoleManager
	 */
	public function createService__43_App_FrontModule_Model_UserRoleManager()
	{
		$service = new App\FrontModule\Model\UserRoleManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Presenters\ComparePresenter
	 */
	public function createServiceApplication__1()
	{
		$service = new App\FrontModule\Presenters\ComparePresenter($this->getService('40_App_FrontModule_Model_SessionManager'),
			$this->getService('37_App_FrontModule_Model_DeviceManager'), $this->getService('41_App_FrontModule_Model_ShootManager'),
			$this->getService('39_App_FrontModule_Model_ResultManager'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resultToleranceFactory = $this->getService('31_App_FrontModule_Forms_ResultToleranceFormFactory');
		$service->resultIgnoreFactory = $this->getService('30_App_FrontModule_Forms_ResultIgnoreFormFactory');
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return NetteModule\ErrorPresenter
	 */
	public function createServiceApplication__10()
	{
		$service = new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return NetteModule\MicroPresenter
	 */
	public function createServiceApplication__11()
	{
		$service = new NetteModule\MicroPresenter($this, $this->getService('http.request'),
			$this->getService('routing.router'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Presenters\CronPresenter
	 */
	public function createServiceApplication__2()
	{
		$service = new App\FrontModule\Presenters\CronPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->cronner = $this->getService('cronner.runner');
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return App\FrontModule\Presenters\DevicePresenter
	 */
	public function createServiceApplication__3()
	{
		$service = new App\FrontModule\Presenters\DevicePresenter($this->getService('40_App_FrontModule_Model_SessionManager'),
			$this->getService('37_App_FrontModule_Model_DeviceManager'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->deviceEditFactory = $this->getService('28_App_FrontModule_Forms_DeviceEditFormFactory');
		$service->deviceAddFactory = $this->getService('27_App_FrontModule_Forms_DeviceAddFormFactory');
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return App\FrontModule\Presenters\Error4xxPresenter
	 */
	public function createServiceApplication__4()
	{
		$service = new App\FrontModule\Presenters\Error4xxPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return App\FrontModule\Presenters\ErrorPresenter
	 */
	public function createServiceApplication__5()
	{
		$service = new App\FrontModule\Presenters\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return App\FrontModule\Presenters\HomepagePresenter
	 */
	public function createServiceApplication__6()
	{
		$service = new App\FrontModule\Presenters\HomepagePresenter($this->getService('41_App_FrontModule_Model_ShootManager'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return App\FrontModule\Presenters\ShootPresenter
	 */
	public function createServiceApplication__7()
	{
		$service = new App\FrontModule\Presenters\ShootPresenter($this->getService('40_App_FrontModule_Model_SessionManager'),
			$this->getService('37_App_FrontModule_Model_DeviceManager'), $this->getService('41_App_FrontModule_Model_ShootManager'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->shootAddFactory = $this->getService('32_App_FrontModule_Forms_ShootAddFormFactory');
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return App\FrontModule\Presenters\SignPresenter
	 */
	public function createServiceApplication__8()
	{
		$service = new App\FrontModule\Presenters\SignPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->signUpFactory = $this->getService('34_App_FrontModule_Forms_SignUpFormFactory');
		$service->signInFactory = $this->getService('33_App_FrontModule_Forms_SignInFormFactory');
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return App\FrontModule\Presenters\UserPresenter
	 */
	public function createServiceApplication__9()
	{
		$service = new App\FrontModule\Presenters\UserPresenter($this->getService('40_App_FrontModule_Model_SessionManager'),
			$this->getService('42_App_FrontModule_Model_UserManager'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->userEditFactory = $this->getService('36_App_FrontModule_Forms_UserEditFormFactory');
		$service->userAddFactory = $this->getService('35_App_FrontModule_Forms_UserAddFormFactory');
		$service->invalidLinkMode = 1;
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	public function createServiceApplication__application()
	{
		$service = new Nette\Application\Application($this->getService('application.presenterFactory'),
			$this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('http.response'));
		$service->catchExceptions = TRUE;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		return $service;
	}


	/**
	 * @return Nette\Application\LinkGenerator
	 */
	public function createServiceApplication__linkGenerator()
	{
		$service = new Nette\Application\LinkGenerator($this->getService('routing.router'),
			$this->getService('http.request')->getUrl(), $this->getService('application.presenterFactory'));
		return $service;
	}


	/**
	 * @return Nette\Application\IPresenterFactory
	 */
	public function createServiceApplication__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback($this, 1, NULL));
		$service->setMapping(['*' => 'App\*Module\Presenters\*Presenter']);
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\IJournal
	 */
	public function createServiceCache__journal()
	{
		$service = new Nette\Caching\Storages\SQLiteJournal('C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app/../temp/cache/journal.s3db');
		return $service;
	}


	/**
	 * @return Nette\Caching\IStorage
	 */
	public function createServiceCache__storage()
	{
		$service = new Nette\Caching\Storages\FileStorage('C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app/../temp/cache',
			$this->getService('cache.journal'));
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	public function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return stekycz\Cronner\CriticalSection
	 */
	public function createServiceCronner__criticalSection()
	{
		$service = new stekycz\Cronner\CriticalSection('C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app/../temp/critical-section');
		return $service;
	}


	/**
	 * @return stekycz\Cronner\Cronner
	 */
	public function createServiceCronner__runner()
	{
		$service = new stekycz\Cronner\Cronner($this->getService('cronner.timestampStorage'),
			$this->getService('cronner.criticalSection'), NULL, TRUE);
		return $service;
	}


	/**
	 * @return stekycz\Cronner\TimestampStorage\FileStorage
	 */
	public function createServiceCronner__timestampStorage()
	{
		$service = new stekycz\Cronner\TimestampStorage\FileStorage('C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\www/temp/cronner');
		return $service;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	public function createServiceDatabase__default__connection()
	{
		$service = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=dp', 'root', NULL,
			['lazy' => TRUE]);
		$this->getService('tracy.blueScreen')->addPanel('Nette\Bridges\DatabaseTracy\ConnectionPanel::renderException');
		return $service;
	}


	/**
	 * @return Nette\Database\Context
	 */
	public function createServiceDatabase__default__context()
	{
		$service = new Nette\Database\Context($this->getService('database.default.connection'),
			$this->getService('database.default.structure'), $this->getService('database.default.conventions'),
			$this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Database\Conventions\DiscoveredConventions
	 */
	public function createServiceDatabase__default__conventions()
	{
		$service = new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
		return $service;
	}


	/**
	 * @return Nette\Database\Structure
	 */
	public function createServiceDatabase__default__structure()
	{
		$service = new Nette\Database\Structure($this->getService('database.default.connection'),
			$this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	public function createServiceHttp__context()
	{
		$service = new Nette\Http\Context($this->getService('http.request'), $this->getService('http.response'));
		trigger_error('Service http.context is deprecated.', 16384);
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	public function createServiceHttp__request()
	{
		$service = $this->getService('http.requestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'http.request\', value returned by factory is not Nette\Http\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	public function createServiceHttp__requestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	public function createServiceHttp__response()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\ILatteFactory
	 */
	public function createServiceLatte__latteFactory()
	{
		return new Container_79c4e50a4e_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory($this);
	}


	/**
	 * @return Nette\Application\UI\ITemplateFactory
	 */
	public function createServiceLatte__templateFactory()
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory($this->getService('latte.latteFactory'),
			$this->getService('http.request'), $this->getService('security.user'),
			$this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Mail\IMailer
	 */
	public function createServiceMail__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Nette\Application\IRouter
	 */
	public function createServiceRouting__router()
	{
		$service = App\RouterFactory::createRouter();
		if (!$service instanceof Nette\Application\IRouter) {
			throw new Nette\UnexpectedValueException('Unable to create service \'routing.router\', value returned by factory is not Nette\Application\IRouter type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	public function createServiceSecurity__user()
	{
		$service = new Nette\Security\User($this->getService('security.userStorage'), $this->getService('42_App_FrontModule_Model_UserManager'));
		return $service;
	}


	/**
	 * @return Nette\Security\IUserStorage
	 */
	public function createServiceSecurity__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session.session'));
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	public function createServiceSession__session()
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		return $service;
	}


	/**
	 * @return Tracy\Bar
	 */
	public function createServiceTracy__bar()
	{
		$service = Tracy\Debugger::getBar();
		if (!$service instanceof Tracy\Bar) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.bar\', value returned by factory is not Tracy\Bar type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\BlueScreen
	 */
	public function createServiceTracy__blueScreen()
	{
		$service = Tracy\Debugger::getBlueScreen();
		if (!$service instanceof Tracy\BlueScreen) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.blueScreen\', value returned by factory is not Tracy\BlueScreen type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\ILogger
	 */
	public function createServiceTracy__logger()
	{
		$service = Tracy\Debugger::getLogger();
		if (!$service instanceof Tracy\ILogger) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.logger\', value returned by factory is not Tracy\ILogger type.');
		}
		return $service;
	}


	public function initialize()
	{
		header('X-Frame-Options: SAMEORIGIN');
		header('X-Powered-By: Nette Framework');
		header('Content-Type: text/html; charset=utf-8');
		$this->getService('session.session')->exists() && $this->getService('session.session')->start();
		Tracy\Debugger::setLogger($this->getService('tracy.logger'));
	}

}



final class Container_79c4e50a4e_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory implements Nette\Bridges\ApplicationLatte\ILatteFactory
{
	private $container;


	public function __construct(Container_79c4e50a4e $container)
	{
		$this->container = $container;
	}


	public function create(): Latte\Engine
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app/../temp/cache/latte');
		$service->setAutoRefresh(FALSE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}

}
