<?php

namespace Del;

use Del\Service\Account as AccountSvc;

class AccountServiceTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var AccountSvc
     */
    protected $svc;

    protected function _before()
    {
        $this->svc = new AccountSvc();
    }

    protected function _after()
    {
        // unset the blank class after each test
        unset($this->svc);
    }


    public function testCreateFromArray()
    {
	    $array = $this->getTestArray();
        $account = $this->svc->createAccountFromArray($array);
        $monitors = $account->getMonitors();

        $this->assertEquals(123456,$account->getId());
        $this->assertEquals('BBC',$account->getName());
        $this->assertEquals(2,$account->getMonitors()->count());
        $this->assertEquals(2,$monitors->count());
        $this->assertEquals(5235632,$monitors->current()->getId());
        $this->assertEquals('http://bbc.co.uk/',$monitors->current()->getUrl()->toString());
        $monitors->next();
        $this->assertEquals(5235633,$monitors->current()->getId());
        $this->assertEquals('http://bbc.co.uk/news/',$monitors->current()->getUrl()->toString());
    }


    /**
     * @return array
     */
    private function getTestarray()
    {
        return [
            'name' => 'account',
            'attr' => [
                'id' => 123456
            ],
            'children' => [
                [
                    'name' => 'name',
                    'attr' => [],
                    'children' => ['BBC'],
                ],
                [
                    'name' => 'monitors',
                    'attr' => [],
                    'children' => [
                        [
                            'name' => 'monitor',
                            'attr' => [
                                'id' => 5235632,
                            ],
                            'children' => [
                                [
                                    'name' => 'url',
                                    'attr' => [],
                                    'children' => ['http://bbc.co.uk/'],
                                ]
                            ],
                        ],
                        [
                            'name' => 'monitor',
                            'attr' => [
                                'id' => 5235633,
                            ],
                            'children' => [
                                [
                                    'name' => 'url',
                                    'attr' => [],
                                    'children' => ['http://bbc.co.uk/news/'],
                                ]
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

}
