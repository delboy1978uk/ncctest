<?php
/**
 * User: delboy1978uk
 * Date: 08/10/15
 * Time: 23:49
 */

namespace Del\Service;

use Del\Entity\Account as AccountEntity;
use Del\Entity\Monitor;
use DOMDocument;
use Exception;
use Zend\Uri\Http as Url;

class Account
{
    /**
     * @param array $array
     * @return AccountEntity
     */
    public function createAccountFromArray(array $array)
    {
        $a = new AccountEntity();

        $a->setId($array['attr']['id'])
            ->setName($array['children'][0]['name']);

        $monitors = $array['children'][1];

        foreach ($monitors as $mon) {

            $m = new Monitor();
            $url = new Url($mon['children'][0]['children'][0]);

            $m->setId($mon['attr']['id'])
                ->setUrl($url);
            $a->getMonitors()->append($m);

        }
        return $a;
    }


    /**
     * @throws Exception
     */
    public function createAccountFromXML()
    {
        throw new Exception('Outwith Scope Of Test');
    }




    public function convertAccountToXML(AccountEntity $acc)
    {
        $d = new DOMDocument();

        $account = $d->createElement('account');
        $account->setAttribute('id',$acc->getId());

        $name = $d->createElement('name',$acc->getName());
        $account->appendChild($name);

        $monitors = $d->createElement('monitors');

        foreach ($acc->getMonitors() as $mon) {

            $monitor = $d->createElement('monitor');
            $monitor->setAttribute('id',$mon->getId());
            $url = $d->createElement('url',$mon->getUrl()->toString());
            $monitor->appendChild($url);
            $monitors->appendChild($monitor);
        }

        $account->appendChild($monitors);

        $d->appendChild($account);
        return $d->saveXML();
    }





    /**
     * @param AccountEntity $acc
     * @return array
     */
    public function convertAccountToArray(AccountEntity $acc)
    {
        $account = [
            'name' => 'account',
            'attr' => [
                'id' => $acc->getId(),
            ],
            'children' => [
                [
                    'name' => 'name',
                    'attr' => [],
                    'children' => [$acc->getName()],
                ],
                [
                    'name' => 'monitors',
                    'attr' => [],
                    'children' => [],
                ],
            ],
        ];

        foreach ($acc->getMonitors() as $mon) {
            $monitor = [
                'name' => 'monitor',
                'attr' => [
                    'id' => $mon->getId(),
                ],
                'children' => [$mon->getUrl()->toString()],
            ];
            $account['children'][1]['children'][] = $monitor;
        }

        return $account;
    }

}