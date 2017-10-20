<?php

class MobileFactory 
{
	public static function CreateMobile($model)
	{
		return new Mobile($model);
	}
}

class Mobile 
{
	private $model;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public function getName()
	{
		return $this->model;
	}
}

$iphone = MobileFactory::CreateMobile('iphone');
var_dump($iphone);


$samsung = MobileFactory::CreateMobile('Samsung');
var_dump($samsung);


///////////////////////////////////////////////////////////////////////////////// 


class GermanFactory {
  	const CHEAP = 'cheap';
    const EXPENSIVE = 'expensive';

    public function create(string $type)
    {
        return $this->createVehicle($type);
    }
    protected function createVehicle(string $type)
    {
        switch ($type) {
            case SELF::CHEAP:
                return new Bicycle();
            case SELF::EXPENSIVE:
                return new CarMercedes();
            default:
                throw new \InvalidArgumentException("$type is not a valid");
        }
    }
}

class CarMercedes {
   
}

class Bicycle {
   
}


$factory = (new GermanFactory())->create('expensive');
var_dump($factory);


/////////////////////////////////////////////////////////////////////////////// 

