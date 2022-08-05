<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FullName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $status = preg_match('|^[\pL\s]+$|u', $value);
        if($status == true)
        {
            $count = substr_count($value, ' ');
            if($count >= 1)
            {
                return true;
            }
            else{
                return false;
            }

        }else{
            return false;
        } 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Por favor, Insira seu nome completo';
    }  
}
