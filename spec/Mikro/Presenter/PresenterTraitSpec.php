<?php namespace spec\Mikro\Presenter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PresenterTraitSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('spec\Mikro\Presenter\Baz');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('spec\Mikro\Presenter\Baz');
    }

    function it_fetches_a_valid_presenter()
    {
        \Mockery::mock('BazPresenter');
        $this->presents()->shouldBeAnInstanceOf('BazPresenter');
    }

    function it_throws_up_if_invalid_presenter_is_provided()
    {
        $this->presenter = 'FooPresenter';

        $this->shouldThrow('Mikro\Presenter\Exception\PresenterException')->duringPresents();
    }

    function it_caches_the_presenter_for_future_user()
    {
        \Mockery::mock('BarPresenter');

        $one = $this->presents();
        $two = $this->presents();

        $one->shouldBe($two);

    }
}


class Baz {
    use \Mikro\Presenter\PresenterTrait;

    public $presenter = 'BazPresenter';

}