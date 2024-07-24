<?php
/**
 * Facade Pattern Example
 *
 * The Facade pattern provides a unified interface to a set of interfaces in a subsystem.
 * In this example:
 * - Facade: MortgageApplication provides a simplified interface to a complex mortgage approval system.
 * - Subsystem: Bank, Credit, and BackgroundCheck represent the complex subsystem with various processes.
 * - Client: Uses the Facade to simplify the process of applying for a mortgage.
 */

// Subsystem classes
class Bank {
    public function hasSufficientSavings($amount) {
        return true; // Simplified logic
    }
}

class Credit {
    public function hasGoodCredit($customer) {
        return true; // Simplified logic
    }
}

class BackgroundCheck {
    public function hasNoCriminalRecord($customer) {
        return true; // Simplified logic
    }
}

// Facade class
class MortgageApplication {
    private $bank;
    private $credit;
    private $backgroundCheck;

    public function __construct() {
        $this->bank = new Bank();
        $this->credit = new Credit();
        $this->backgroundCheck = new BackgroundCheck();
    }

    public function isEligible($customer, $amount) {
        $eligible = true;

        // Check eligibility based on subsystem logic
        if (!$this->bank->hasSufficientSavings($amount)) {
            $eligible = false;
        }
        
        if (!$this->credit->hasGoodCredit($customer)) {
            $eligible = false;
        }

        if (!$this->backgroundCheck->hasNoCriminalRecord($customer)) {
            $eligible = false;
        }

        return $eligible;
    }
}

// Client code
$mortgage = new MortgageApplication();
$customer = "John Doe";
$loanAmount = 200000;

if ($mortgage->isEligible($customer, $loanAmount)) {
    echo "{$customer} is eligible for a mortgage of {$loanAmount}.\n";
} else {
    echo "{$customer} is not eligible for a mortgage of {$loanAmount}.\n";
}
