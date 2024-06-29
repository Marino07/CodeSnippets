<?php

abstract class BaseInput extends HtmlElement
{
    public string $name;
    public string $label;
    public string $value;


    /**
     * @param string $label
     * @param string $name
     * @param string $value
     */
    public function __construct( string $name,string $label = '', string $value='')
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }
    public function render(): string
    {
        return sprintf('<div>
                <label>%s</label><br>
                %s
                </div>',$this->label,$this->rederInput()); //forma je string %s iz renderInput
    }
    abstract public function rederInput():string;

}