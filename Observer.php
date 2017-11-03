<?php

interface Subject {
	public function attact(Observer $observer);
	public function detach($index);
	public function notify();
}

class Login implements Subject {

	protected $observers = [];

	public function attact(Observer $observer) {
		$this->observers[] = $observer;
	}

	public function detach($index) {
		unset($this->observers[$index]);
	}

	public function notify() {
		foreach ($this->observers as $observer) {
			$observer->update();
		}
	}

	public function fire() {
		$this->notify();
	}
}

interface Observer {
	public function update();
}

class EmailNotifireObserver implements Observer {

	public function update() {
		echo "fire off an email" . '<br>';
	}
}


class LogingReportObserver implements Observer {

	public function update() {
		echo "do some of reporting" . '<br>';
	}
}

$login = new Login();

$login->attact(new EmailNotifireObserver());
$login->attact(new LogingReportObserver());
$login->fire();


