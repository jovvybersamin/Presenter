<?php

namespace Mikro\Presenter;


abstract class Presenter {

    /**
     *
     * @var PresenterContract
     */
    protected $entity;

    /**
     *
     *
     * @param $entity
     */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }


    /**
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
      if ( method_exists($this,$property))
      {
          return $this->{$property}();
      }

      if ( method_exists($this->entity,$property))
      {
          return $this->entity->{$property}();
      }

        return $this->entity->{$property};
    }


} 