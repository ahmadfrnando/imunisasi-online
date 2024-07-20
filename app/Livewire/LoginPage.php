<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Patient;

class LoginPage extends Component
{   
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    
    public function render()
    {
        return view('livewire.login-page');
    }

    public function submit()
    {   
        $this->validate();
        
        try {
            $patient = Patient::where('email', $this->email)->first();
            if ($patient && password_verify($this->password, $patient->password)) {
                session()->put('patient_id', $patient->id);
                return redirect()->route('dashboard');
            }
        } catch (\Exception $exception) {
            $this->addError('password', 'Wrong email or password');
        }
    }
}