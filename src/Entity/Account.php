<?php
/**
 * User: delboy1978uk
 * Date: 08/10/15
 * Time: 22:51
 */

namespace Del\Entity;

use Del\Collection\Monitors;

class Account
{
    /** @var int  */
    private $id;

    /** @var string */
    private $name;

    /** @var Monitors  */
    private $monitors;

    public function __construct()
    {
        $this->monitors = new Monitors();
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Monitors
     */
    public function getMonitors()
    {
        return $this->monitors;
    }

    /**
     * @param Monitors $monitors
     * @return $this
     */
    public function setMonitors(Monitors $monitors)
    {
        $this->monitors = $monitors;
        return $this;
    }


}