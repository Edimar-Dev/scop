<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCpf implements Rule
{
    public function passes($attribute, $value)
    {
        
        $cpf = preg_replace('/[^0-9]/', '', $value);
        
        
        if (strlen($cpf) != 11) {
            return false;
        }
        
        
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        
        
        for ($i = 9; $i < 11; $i++) {
            for ($d = 0, $c = 0; $c < $i; $c++) {
                $d += $cpf[$c] * (($i + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        
        return true;
    }

    public function message()
    {
        return 'O CPF informado não é válido.';
    }
}