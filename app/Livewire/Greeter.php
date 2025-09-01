<?php

namespace App\Livewire;

use App\Models\Greeting;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.public')]
#[Title('Greeter')]
class Greeter extends Component
{
    #[Validate('required|min:2|max:16')]
    public $name = '';
    public $greeting = '';
    public $greetings = [];
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

    public function mount()
    {
        $this->greetings = Greeting::all();
        $this->greeting = Greeting::where('greeting', 'Konnichiwa')->first()?->greeting;
    }

    // public function updated($property, $value)
    // {
    //     if ($property === 'name') {
    //         $this->name = strtolower($value);
    //     }
    // }

    public function updatedName($value)
    {
        // The accented capital letter does not transform them, but it does so with this reference.
        $this->name = mb_strtolower($value, 'UTF-8');
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
