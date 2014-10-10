<?php namespace Mikro\Presenter;


use Mikro\Presenter\Exception\PresenterException;

trait PresenterTrait {

    protected $instance;

    public function presents()
    {
        if ( ! isset( $this->presenter ))
        {
            throw new PresenterException('Please provide a presenter property.');
        }

        if ( ! $this->presenter or ! class_exists($this->presenter))
        {
            throw new PresenterException('Please provide a correct path for your presenter.');
        }

        if ( ! $this->instance)
        {
            $this->instance = new $this->presenter($this);
        }

        return $this->instance;
    }

} 