<?php

namespace Flinks\BankingServices\Model;

class Account
{
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $accountNumber;
    /**
     * @var Balance
     */
    protected $balance;
    /**
     * @var string
     */
    protected $category;
    /**
     * @var string
     */
    protected $id;
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title = null)
    {
        $this->title = $title;
        return $this;
    }
    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }
    /**
     * @param string $accountNumber
     *
     * @return self
     */
    public function setAccountNumber($accountNumber = null)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }
    /**
     * @return Balance
     */
    public function getBalance()
    {
        return $this->balance;
    }
    /**
     * @param Balance $balance
     *
     * @return self
     */
    public function setBalance(Balance $balance = null)
    {
        $this->balance = $balance;
        return $this;
    }
    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @param string $category
     *
     * @return self
     */
    public function setCategory($category = null)
    {
        $this->category = $category;
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