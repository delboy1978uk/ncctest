<?php
/**
 * User: delboy1978uk
 * Date: 08/10/15
 * Time: 23:09
 */

namespace Del\Entity;

use Zend\Uri\Http;


class Monitor
{
    /** @var int $id  */
    private $id;

    /** @var string $url  */
    private $url;

    /**
     * @return mixed
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
     * @return Http
     */
    public function getUrl()
    {
        return $this->url;

    }

    /**
     * @param Http $url
     * @return $this
     */
    public function setUrl(Http $url)
    {
        $this->url = $url;
        return $this;
    }


}