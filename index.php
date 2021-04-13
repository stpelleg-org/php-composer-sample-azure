<p>
	Example timer in PHP
</p>

<?php 
require('vendor/autoload.php');
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('channel-name');
$logger->pushHandler(new StreamHandler(__DIR__ . '/app.log', Logger::DEBUG));

$logger->info('Timer Started');
\PHP_Timer::start();
sleep(rand(1, 3));
$time = \PHP_Timer::stop();
print \PHP_Timer::secondsToTimeString($time);
$logger->error('Time Stopped');
