<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Filter implements Rule
{

    protected $words;
    protected $filterd = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($words)
    {
        $this->words = $words;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach ($this->words as $word) {

            if ($value == $word) {
                $this->filterd[] = $word;
            }

        }
        return empty($this->filterd);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You cant use '.implode($this->filterd).' in You text';
    }
}
