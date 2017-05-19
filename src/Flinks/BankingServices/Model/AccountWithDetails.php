<?php

namespace Flinks\BankingServices\Model;

class AccountWithDetails
{
    /**
     * @var Holder
     */
    protected $holder;
    /**
     * @var AccountTransaction[]
     */
    protected $transactions;
    /**
     * @var string
     */
    protected $transitNumber;
    /**
     * @var string
     */
    protected $institutionNumber;
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
     * @return Holder
     */
    public function getHolder()
    {
        return $this->holder;
    }
    /**
     * @param Holder $holder
     *
     * @return self
     */
    public function setHolder(Holder $holder = null)
    {
        $this->holder = $holder;
        return $this;
    }
    /**
     * @return AccountTransaction[]
     */
    public function getTransactions()
    {
        return $this->transactions;
    }
    /**
     * @param AccountTransaction[] $transactions
     *
     * @return self
     */
    public function setTransactions(array $transactions = null)
    {
        $this->transactions = $transactions;
        return $this;
    }
    /**
     * @return string
     */
    public function getTransitNumber()
    {
        return $this->transitNumber;
    }
    /**
     * @param string $transitNumber
     *
     * @return self
     */
    public function setTransitNumber($transitNumber = null)
    {
        $this->transitNumber = $transitNumber;
        return $this;
    }
    /**
     * @return string
     */
    public function getInstitutionNumber()
    {
        return $this->institutionNumber;
    }
    /**
     * @param string $institutionNumber
     *
     * @return self
     */
    public function setInstitutionNumber($institutionNumber = null)
    {
        $this->institutionNumber = $institutionNumber;
        return $this;
    }
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