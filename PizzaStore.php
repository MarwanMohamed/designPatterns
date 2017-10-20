<?php
abstract class PizzaStore 
{
	protected  abstract function createPizza(String $type);

	public function orderPizza(String $type) 
	{
		$pizza = $this->createPizza($type);
		// $pizza.prepare();
		// $pizza.bake();
		// $pizza.cut();
		// $pizza.box();
		return $pizza;
	}
}


class EgyPizzaStore extends PizzaStore 
{
	public function createPizza(String $item)
	{
		if ($item == "cheese") {
			return new EgyptStyleCheesePizza();
		} else if ($item == "veggie") {
			return new EgyptStyleVeggiePizza();
		} else if ($item == "clam") {
			return new EgyptStyleClamPizza();
		} else if ($item == "pepperoni") {
			return new EgyptStylePepperoniPizza();
		} else {
			return null;
		} 
			
	}
}

class EgyptStyleCheesePizza extends Pizza
{
}

class EgyptStylePepperoniPizza extends Pizza
{

}

abstract class Pizza {
	protected $name;
	protected $dough;
	protected $sauce;
}


$cheese = (new EgyPizzaStore())->orderPizza('cheese');
var_dump($cheese);

