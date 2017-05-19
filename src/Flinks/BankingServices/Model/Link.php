<?php

namespace Flinks\BankingServices\Model;

class Link
{
    /**
     * @var string
     */
    protected $rel;
    /**
     * @var string
     */
    protected $href;
    /**
     * @var mixed
     */
    protected $example;
    /**
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
    }
    /**
     * @param string $rel
     *
     * @return self
     */
    public function setRel($rel = null)
    {
        $this->rel = $rel;
        return $this;
    }
    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }
    /**
     * @param string $href
     *
     * @return self
     */
    public function setHref($href = null)
    {
        $this->href = $href;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getExample()
    {
        return $this->example;
    }
    /**
     * @param mixed $example
     *
     * @return self
     */
    public function setExample($example = null)
    {
        $this->example = $example;
        return $this;
    }
}