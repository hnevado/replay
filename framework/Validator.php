<?php 
namespace Framework;
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
                
                if ($error = $this->hasError($name, $param, $field, $value)) {
                    $this->errors[] = $error;
                    break; // Stop checking further rules for this field if one fails
                }

            }
        }
    }

    protected function hasError(string $name, ?string $param, string $field, string $value): ?string {

         return match ($name) {
                    'required' => $this->validateRequired($field,$value),
                    'min' => $this->validateMin($field,$value, $param),
                    'max' => $this->validateMax($field,$value, $param),
                    'url' => $this->validateUrl($field,$value),
                    default => null
                };
    }
      
    protected function validateRequired(string $field, mixed $value): ?string {
        return empty($value) ? "$field es requerido." : null;
    }

    protected function validateMin(string $field, mixed $value, ?string $param): ?string {
        $minLength = (int) $param;
        return strlen($value) < $minLength ? "$field debe tener al menos $minLength caracteres." : null;
    }

    protected function validateMax(string $field, mixed $value, ?string $param): ?string {
        $maxLength = (int) $param;
        return strlen($value) > $maxLength ? "$field no puede exceder los $maxLength caracteres." : null;
    }
    
    protected function validateUrl(string $field, mixed $value): ?string {
        return filter_var($value, FILTER_VALIDATE_URL) === false ? "$field debe ser una URL válida." : null;
    }

    public function passes(): bool {
        return empty($this->errors);
    }

    public function errors(): array {
        return $this->errors;
    }

}