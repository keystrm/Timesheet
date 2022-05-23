<?php

namespace App\View\Components\Form\Type;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $name;
    public $id;
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$name,$id,$class)
    {
        $this->type=$type;
        $this->name=$name;
        $this->id=$id;
        $this->class=$class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.type.button');
    }
}
