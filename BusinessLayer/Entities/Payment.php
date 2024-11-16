<?php
class Payment {
    private int $id;
    public User $payer;
    public User $collector;
    public float $amount;
    public string $currency;
    public string $method;
    public float $platformFeePercentage;
    public DateTime $paymentDate;

    public function __construct(int $id, User $payer, User $collector, float $amount, string $currency, string $method, float $platformFeePercentage) {
        $this->id = $id;
        $this->payer = $payer;
        $this->collector = $collector;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->method = $method;
        $this->platformFeePercentage = $platformFeePercentage;
        $this->paymentDate = new DateTime();
    }

    public function calculatePlatformFee(): float {
        return $this->amount * $this->platformFeePercentage / 100;
    }

    public function calculateNetAmount(): float {
        return $this->amount - $this->calculatePlatformFee();
    }

    public function processPayment(): bool {
        // Logic to process the payment, e.g., interact with the payment service (e.g., Mercado Pago)
        // Returning true for successful payment simulation
        return true;
    }

    public function getId():int{
        return $this->id;
    }
}