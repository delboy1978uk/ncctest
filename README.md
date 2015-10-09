# ncctest
[![Build Status](https://travis-ci.org/delboy1978uk/ncctest.png?branch=master)](https://travis-ci.org/delboy1978uk/ncctest) [![Code Coverage](https://scrutinizer-ci.com/g/delboy1978uk/ncctest/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/ncctest/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/delboy1978uk/ncctest/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/ncctest/?branch=master) <br />
A test I was given: convert an array of account info into xml and back!
##The Account Service
###Creating an Account Entity from an array
```
use Del\Service\Account as AccountSvc;

$svc = new AccountSvc();
$account = $svc->createAccountFromArray($array);
```
###Coverting an Account Entity to XML
```
$xml = $svc->convertAccountToXML($account);
```
###Coverting an Account Entity to An Array
```
$array = $svc->convertAccountToArray($account);
```
##The Account Entity
```
$account->getId();          // int
$account->getName();        // string
$account->getMonitors();    // Del\Collection\Monitors
```
##The Monitors Collection
Extends ArrayIterator, so the usual methods apply.
##The Monitor Entity
```
$monitor->getId();          // int
$monitor->getUrl();          // Zend\Uri\Http (use toString() method to get value)
```
##Example manual creation
```
use Del\Entity\Account;
use Del\Entity\Monitor;
use Zend\Uri\Http as Url;

$acc = new Account();
$acc->setName('MTV');
$acc->setId(666);

$monitor = new Monitor();
$monitor->setId(123654);
$monitor->setUrl(new Url('http://www.mtv.com/'));

$acc->getMonitors()->append($monitor);
```
