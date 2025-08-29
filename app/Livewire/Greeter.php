<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class Greeter extends Component
{
    #[Validate('required|min:2|max:16')]
    public $name = '';
    public $greeting = '';
    public $greetingMessage = '';

    public function changeGreeting()
    {
        $this->validate();

        $this->greetingMessage = "{$this->greeting}, {$this->name}";
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe contener mínimo 2 caracteres',
            'name.max' => 'El nombre no puede exceder 16 caracteres',
        ];
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
