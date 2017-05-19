<?php

namespace Flinks\BankingServices\Model;

class AccountTransaction
{
    /**
     * @var string
     */
    protected $date;
    /**
     * @var string
     */
    protected $code;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var float
     */
    protected $debit;
    /**
     * @var float
     */
    protected $credit;
    /**
     * @var float
     */
    protected $balance;
    /**
     * @var string
     */
    protected $id;
    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @param string $date
     *
     * @return self
     */
    public function setDate($date = null)
    {
        $this->date = $date;
        return $this;
    }
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * @param string $code
     *
     * @return self
     */
    public function setCode($code = null)
    {
        $this->code = $code;
        return $this;
    }
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * @return float
     */
    public function getDebit()
    {
        return $this->debit;
    }
    /**
     * @param float $debit
     *
     * @return self
     */
    public function setDebit($debit = null)
    {
        $this->debit = $debit;
        return $this;
    }
    /**
     * @return float
     */
    public function getCredit()
    {
        return $this->credit;
    }
    /**
     * @param float $credit
     *
     * @return self
     */
    public function setCredit($credit = null)
    {
        $this->credit = $credit;
        return $this;
    }
    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }
    /**
     * @param float $balance
     *
     * @return self
     */
    public function setBalance($balance = null)
    {
        $this->balance = $balance;
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