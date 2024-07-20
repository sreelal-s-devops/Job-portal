<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    /**
     * Create a new component instance.
     */
    public string $name;
    public string $placeholder;
    public string $value;
    public string $type;
    public function __construct(string $name,?string $placeholder="",?string $value="",?string $type='text')
    {
        $this->name=$name ;
        $this->placeholder =$placeholder;
        $this->value= $value;
        $this->type=$type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
