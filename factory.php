<?php

// class MobileFactory 
// {

// 	public static function CreateMobile($model)
// 	{
// 		return new Mobile($model);
// 	}
// }


// class Mobile 
// {
// 	private $model;

// 	public function __construct($model)
// 	{
// 		$this->model = $model;
// 	}

// 	public function getName()
// 	{
// 		return $this->model;
// 	}
// }

// $iphone = MobileFactory::CreateMobile('iphone');
// var_dump($iphone);


// $samsung = MobileFactory::CreateMobile('Samsung');
// var_dump($samsung);





// class GermanFactory 
// {

//   	const CHEAP = 'cheap';
//     const FAST = 'fast';

//     public function create(string $type): VehicleInterface
//     {
//         $obj = $this->createVehicle($type);
//         $obj->setColor('black');

//         return $obj;
//     }


//     protected function createVehicle(string $type): VehicleInterface
//     {
//         switch ($type) {
//             case SELF::CHEAP:
//                 return new Bicycle();
//             case SELF::FAST:
//                 $carMercedes = new CarMercedes();
//                 // we can specialize the way we want some concrete Vehicle since we know the class
//                 $carMercedes->addAMGTuning();

//                 return $carMercedes;
//             default:
//                 throw new \InvalidArgumentException("$type is not a valid vehicle");
//         }
//     }
// }

// interface VehicleInterface
// {
//     public function setColor(string $rgb);
// }


// class CarMercedes implements VehicleInterface
// {
//     private $color;

//     public function setColor(string $rgb)
//     {
//         $this->color = $rgb;
//     }

//     public function addAMGTuning()
//     {
//         // do additional tuning here
//     }
// }

// class Bicycle implements VehicleInterface
// {
//     private $color;

//     public function setColor(string $rgb)
//     {
//         $this->color = $rgb;
//     }
// }


// $factory = new GermanFactory();
// $x = $factory->create('fast');
// var_dump($x);




// class Factory
// {
//     public static function build($type)
//     {
//         $class = 'Format' . $type;
//         if (!class_exists($class)) {
//             throw new Exception('Missing format class.');
//         }
//         return new $class;
//     }
// }

// interface FormatInterface {}

// class FormatString implements FormatInterface {}
// class FormatNumber implements FormatInterface {}

// try {
//     $string = Factory::build('String');

//     var_dump($string);
// } catch (Exception $e) {
//     echo $e->getMessage();
// }

// try {
//     $number = Factory::build('Number');
// } catch (Exception $e) {
//     echo $e->getMessage();
// }




// abstract class AbstDepart
// {
// 	abstract function addEmployee();
// }


// class FrontEndDepart extends AbstDepart
// {
// 	public function addEmployee()
// 	{
// 		return new FrontEndEmployee();
// 	}

// }

// class BackEndDepart extends AbstDepart
// {
// 	public function addEmployee()
// 	{
// 		return new BackEndEmployee();
// 	}
// }


// abstract class abstEmpyloyee
// {
// 	abstract function getName();

// }

// class FrontEndEmployee extends abstEmpyloyee
// {
// 	public function getName()
// 	{
// 	}
// }

// class BackEndEmployee extends abstEmpyloyee
// {
// 	public function getName()
// 	{
		
// 	}
// }

// $marwan = (new BackEndDepart())->addEmployee();
// $kamel = (new BackEndDepart())->addEmployee();
// $shimaa = (new FrontEndDepart())->addEmployee();

// var_dump($marwan, $kamel, $shimaa);





// class SimplePizzaFactory {

// 	public function createPizza(String $type) {
// 		$pizza = null;

// 		if ($type == "cheese") {
// 			$pizza = new CheesePizza();
// 		} else if ($type == "pepperoni") {
// 			$pizza = new PepperoniPizza();
// 		} else if ($type == "clam") {
// 			$pizza = new ClamPizza();
// 		} else if ($type == "veggie") {
// 			$pizza = new VeggiePizza();
// 		}
// 		return $pizza;
// 	}
// }


// class PizzaStore 
// {
// 	private $factory;

// 	public function __construct(SimplePizzaFactory $factory)
// 	{
// 		$this->factory = $factory;
// 	}

// 	public function orderPizza($type)
// 	{
// 		$pizza = $this->factory->createPizza($type);
// 	}

// 	// other methods here
// }

// class CheesePizza
// {
	
// }

// (new PizzaStore(new SimplePizzaFactory))->orderPizza('cheese');




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
	protected $toppings = [];
	
	protected function prepare()
	{
		echo "Preparing  + $this->name";
		echo "Tossing dough...";
		echo "Adding sauce...";
		echo "Adding toppings:";
		for ($i = 0; $i < count($this->toppings); $i++) {
			echo "$this->toppings[$i]";
		}
	}
	

	// void bake() {
	// 	System.out.println(“Bake for 25 minutes at 350”);
	// }
	
	// void cut() {
	// 	System.out.println(“Cutting the pizza into diagonal slices”);
	// }
	// void box() {
	// 	System.out.println(“Place pizza in official PizzaStore box”);
	// }
	public function getName() {
		return $this->name;
	}
}


$x = new EgyPizzaStore();
$cheese = $x->orderPizza('pepperoni');

var_dump($cheese);