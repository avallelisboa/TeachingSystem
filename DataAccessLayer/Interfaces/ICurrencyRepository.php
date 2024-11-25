<?php

interface ICurrencyRepository{
    public function AddCurrency($charCode);
    public function GetCurrencyById($id);
    public function GetCurencies();
    public function RemoveCurrency($id);
    public function UpdateCurrency($id, $charCode);
}