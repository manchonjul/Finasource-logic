<?php

namespace Flinks\BankingServices\Model;

class Login
{
    /**
     * @var string
     */
    protected $username;
    /**
     * @var bool
     */
    protected $isScheduledRefresh;
    /**
     * @var \DateTime
     */
    protected $lastRefresh;
    /**
     * @var string
     */
    protected $id;
    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @param string $username
     *
     * @return self
     */
    public function setUsername($username = null)
    {
        $this->username = $username;
        return $this;
    }
    /**
     * @return bool
     */
    public function getIsScheduledRefresh()
    {
        return $this->isScheduledRefresh;
    }
    /**
     * @param bool $isScheduledRefresh
     *
     * @return self
     */
    public function setIsScheduledRefresh($isScheduledRefresh = null)
    {
        $this->isScheduledRefresh = $isScheduledRefresh;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getLastRefresh()
    {
        return $this->lastRefresh;
    }
    /**
     * @param \DateTime $lastRefresh
     *
     * @return self
     */
    public function setLastRefresh(\DateTime $lastRefresh = null)
    {
        $this->lastRefresh = $lastRefresh;
        return $this;
    }
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $id
     *
     * @return self
     */
    public function setId($id = null)
    {
        $this->id = $id;
        return $this;
    }
}