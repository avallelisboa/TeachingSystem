<?php
class PaymentServiceFactory {
    public static function getPaymentService($platform) {
        switch ($platform) {
            /*case 'paypal':
                return new PayPalPaymentService();
            case 'stripe':
                return new StripePaymentService();
            case 'mercadopago':
                return new MercadoPagoPaymentService();*/
            case 'mock':
                return new MockPaymentService();
            default:
                throw new Exception("Unsupported payment platform: $platform");
        }
    }
}