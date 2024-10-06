<?php
class Payment {
    private int $id;
    private User $payer;   // Typically the student
    private User $payee;   // Typically the teacher
    private float $amount;
    private float $platformFeePercentage; // Platform fee percentage

    public function __construct(int $id, User $payer, User $payee, float $amount, float $platformFeePercentage) {
        $this->id = $id;
        $this->payer = $payer;
        $this->payee = $payee;
        $this->amount = $amount;
        $this->platformFeePercentage = $platformFeePercentage;
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

    public function getPayer(): User {
        return $this->payer;
    }

    public function getPayee(): User {
        return $this->payee;
    }

    public function getAmount(): float {
        return $this->amount;
    }
}