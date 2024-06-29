<?php

class PasswordInput extends BaseInput
{
    public function rederInput(): string
    {
       return sprintf('<input type="password" name="%s" value="%s">',$this->name,$this->value);


    }
}