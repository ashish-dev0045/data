<?php

// Handler interface
interface SupportHandler {
    public function setNext($handler);
    public function handleRequest($request);
}

// Abstract handler implementing the SupportHandler interface
abstract class AbstractSupportHandler implements SupportHandler {
    protected $nextHandler;

    public function setNext($handler) {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handleRequest($request) {
        if ($this->nextHandler) {
            return $this->nextHandler->handleRequest($request);
        }
        return null; // End of chain
    }
}

// Concrete handlers
class TechnicalSupportHandler extends AbstractSupportHandler {
    public function handleRequest($request) {
        if ($request === 'technical') {
            return "Technical support is handling the request.<br>";
        } else {
            return parent::handleRequest($request);
        }
    }
}

class SalesSupportHandler extends AbstractSupportHandler {
    public function handleRequest($request) {
        if ($request === 'sales') {
            return "Sales support is handling the request.<br>";
        } else {
            return parent::handleRequest($request);
        }
    }
}

class GeneralSupportHandler extends AbstractSupportHandler {
    public function handleRequest($request) {
        return "General support is handling the request.<br>";
    }
}

// Usage example
// Setup the chain of responsibility
$technicalSupportHandler = new TechnicalSupportHandler();
$salesSupportHandler = new SalesSupportHandler();
$generalSupportHandler = new GeneralSupportHandler();

$technicalSupportHandler->setNext($salesSupportHandler)->setNext($generalSupportHandler);

// Send requests through the chain
echo $technicalSupportHandler->handleRequest('technical');   // Outputs: Technical support is handling the request.
echo $technicalSupportHandler->handleRequest('sales');       // Outputs: Sales support is handling the request.
echo $technicalSupportHandler->handleRequest('billing');     // Outputs: General support is handling the request.
