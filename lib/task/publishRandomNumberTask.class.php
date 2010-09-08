<?php

class publishRandomNumberTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'publish';
    $this->name             = 'randomNumber';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [publishRandomNumber|INFO] task does things.
Call it with:

  [php symfony publishRandomNumber|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();
	$base_url = "http://127.0.0.1:8001/rest/publish";
	$secret = "cometChat";
	$channel_name = "chat";
	$originator = "random_generator";
	do
	{
		$x = rand(0,100);
		$url = $base_url.'?secret='.$secret.'&channel_name='.$channel_name.'&originator='.$originator.'&payload="'.$x.'"';
		echo $url." \r\n";
		$result = @file_get_contents($url,0,null,null);
		echo $result." \r\n";
		sleep(rand(1,3));
	} while (true);
    // add your code here
  }
}
