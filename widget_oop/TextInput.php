<?php

class TextInput extends BaseInput
{

    public function rederInput(): string
    {
        return sprintf('<input type="text" name="%s" value="%s">',$this->name,$this->value);

    }
}