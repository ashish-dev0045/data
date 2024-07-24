<?php
/**
 * Strategy Pattern Example
 *
 * The Strategy pattern defines a family of algorithms, encapsulates each one, and makes them
 * interchangeable. This pattern lets the algorithm vary independently from the clients that
 * use it. In this example:
 * - Context: ShoppingCart represents a context where different payment strategies can be applied.
 * - Strategy: PaymentMethod interface defines a common interface for all supported payment strategies.
 * - Concrete Strategies: CreditCardPayment, PayPalPayment, and WalletPayment implement the PaymentMethod
 *   interface and provide different implementations of the payment process.
 */

// Strategy interface
interface PaymentMethod {
    public function pay($amount);
}

// Concrete Strategy 1: Credit Card payment
class CreditCardPayment implements PaymentMethod {
    public function pay($amount) {
        echo "Paying $amount using Credit Card.\n";
        // Actual payment logic using Credit Card
    }
}

// Concrete Strategy 2: PayPal payment
class PayPalPayment implements PaymentMethod {
    public function pay($amount) {
        echo "Paying $amount using PayPal.\n";
        // Actual payment logic using PayPal
    }
}

// Concrete Strategy 3: Wallet payment
class WalletPayment implements PaymentMethod {
    public function pay($amount) {
        echo "Paying $amount using Wallet.\n";
        // Actual payment logic using Wallet
    }
}

// Context: Shopping cart
class ShoppingCart {
    private $paymentMethod;
    
    public function setPaymentMethod(PaymentMethod $paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }
    
    public function checkout($amount) {
        $this->paymentMethod->pay($amount);
    }
}

// Usage example
$cart = new ShoppingCart();

// Customer selects Credit Card payment
$cart->setPaymentMethod(new CreditCardPayment());
$cart->checkout(100);

// Customer switches to PayPal payment
$cart->setPaymentMethod(new PayPalPayment());
$cart->checkout(50);

// Customer switches to Wallet payment
$cart->setPaymentMethod(new WalletPayment());
$cart->checkout(75);
