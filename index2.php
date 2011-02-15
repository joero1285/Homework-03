
<?php
 
  /*
   * Joe Rozek
   * Homework 3
   */
  date_default_timezone_set('America/Detroit');
  @ini_set('display_errors','Off');
  @ini_set('log_errors','On');
  @ini_set('max_execution_time', 300);
  error_reporting(E_ALL & ~E_STRICT);

  if( PATH_SEPARATOR == ';' )
    define('SLASH','\\');
  else
    define('SLASH','/');

  
  define('APP_PATH', realpath(dirname(__FILE__)));
  
  define('MAILER_PATH',APP_PATH . SLASH . 'temp' . SLASH);
   
  set_include_path('.'.PATH_SEPARATOR.implode(PATH_SEPARATOR, array(
    realpath(APP_PATH . SLASH . 'lib')
    ,realpath(APP_PATH . SLASH . 'lib' . SLASH . 'swift_required.php' )
  ));

  require_once 'lib/swift_required.php';
  
 /*
  * Create the transport
  */
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
->setUsername('joero1285')
->setPassword('makemoney1')
;

/*
 * create mailer
 */
$mailer=Swift_Mailer::newInstance($transport);
/* Create the message and the subject*/
$message = Swift_Message::newInstance('Joe Rozek,SWIFT Mailer 4.0.6')

  /*
   * Set the From address
   */
  setFrom('joero1285@gmail.com' => 'Joe Rozek')

  /*Set the To address */
 setTo('joero1285@yahoo.com' =>'Joe Rozek')

  /*Give it a body */
 $message ->setBody('I rock at PHP!','text/html')
  ;

/*
 * Add the header
 */ 
  $headers = $message->getHeaders()''

$headers->addTextHeader('ANM293', 'CNM-270');
  
  
  /*
   * send the message
   */

  $result=$mailer->batchSend($message);
  
    /*Check to make sure it sends*/
if (!$mailer->send($message, $failures))
{
  echo "Failures:";
  print_r($failures);
}