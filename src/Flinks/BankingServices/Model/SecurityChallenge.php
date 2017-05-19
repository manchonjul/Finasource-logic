<?php

namespace Flinks\BankingServices\Model;

class SecurityChallenge
{
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string[]
     */
    protected $iterables;
    /**
     * @var string
     */
    protected $prompt;
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getIterables()
    {
        return $this->iterables;
    }
    /**
     * @param string[] $iterables
     *
     * @return self
     */
    public function setIterables(array $iterables = null)
    {
        $this->iterables = $iterables;
        return $this;
    }
    /**
     * @return string
     */
    public function getPrompt()
    {
        return $this->prompt;
    }
    /**
     * @param string $prompt
     *
     * @return self
     */
    public function setPrompt($prompt = null)
    {
        $this->prompt = $prompt;
        return $this;
    }
}