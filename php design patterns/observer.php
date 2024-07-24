<?php
/**
 * Observer Pattern Example
 *
 * The Observer pattern defines a one-to-many dependency between objects so that when one object
 * changes state, all its dependents are notified and updated automatically. In this example:
 * - Subject: WeatherData maintains state (temperature, humidity, pressure) and notifies observers
 *            when state changes.
 * - Observer: CurrentConditionsDisplay displays current weather conditions and gets updated by
 *             WeatherData when there's a change in weather data.
 */

// Subject interface
interface Subject {
    public function registerObserver(Observer $observer);
    public function removeObserver(Observer $observer);
    public function notifyObservers();
}

// Observer interface
interface Observer {
    public function update($temperature, $humidity, $pressure);
}

// Concrete subject
class WeatherData implements Subject {
    private $observers = [];
    private $temperature;
    private $humidity;
    private $pressure;
    
    public function registerObserver(Observer $observer) {
        $this->observers[] = $observer;
    }
    
    public function removeObserver(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }
    
    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature, $this->humidity, $this->pressure);
        }
    }
    
    public function setMeasurements($temperature, $humidity, $pressure) {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
    
    private function measurementsChanged() {
        $this->notifyObservers();
    }
}

// Concrete observer
class CurrentConditionsDisplay implements Observer {
    private $temperature;
    private $humidity;
    
    public function update($temperature, $humidity, $pressure) {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->display();
    }
    
    public function display() {
        echo "Current conditions: " . $this->temperature . "F degrees and " . $this->humidity . "% humidity\n";
    }
}

// Usage example
$weatherData = new WeatherData();

$currentDisplay = new CurrentConditionsDisplay();
$weatherData->registerObserver($currentDisplay);

$weatherData->setMeasurements(80, 65, 30.4);
$weatherData->setMeasurements(82, 70, 29.2);
$weatherData->setMeasurements(78, 90, 29.2);
