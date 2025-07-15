<?php 

class Validator {

    protected $errors = [];

    public function __construct(
        protected array $data,
        protected array $rules = []
    )  {
        $this->validate();
    }


    public function validate() {
        foreach ($this->rules as $field => $rules) {
            $rules = explode('|', $rules);
            $value = trim($this->data[$field]);
            
            foreach ($rules as $rule) {
             
                [$name, $param] = array_pad(explode(':', $rule), 2, null);

                $error = match ($name) {
                    'required' => empty($value) ? "$field es requerido." : null,
                    'min' => strlen($value) < $param ? "$field debe tener al menos $param caracteres." : null,
                    'max' => strlen($value) > $param ? "$field no puede exceder los $param caracteres." : null,
                    'url' => filter_var($value, FILTER_VALIDATE_URL) === false ? "$field debe ser una URL válida." : null,
                    default => null
                };
                
                if ($error) {
                    $this->errors[] = $error;
                    break; // Stop checking further rules for this field if one fails
                }

            }
        }
    }

    public function passes(): bool {
        return empty($this->errors);
    }

    public function errors(): array {
        return $this->errors;
    }

}