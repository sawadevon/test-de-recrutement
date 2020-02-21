<?php
namespace Core\HTML;

class BootstrapForm extends Form
{
    private function surender($html)
    {
        return "<div class='from-group'>" . $html . "</div>";
    }

    public function input(string $name, string $label, array $option = [])
    {
        $type = isset($option['type']) ? $option['type'] : 'text';
        $label = "<label>$label</label>";
        if ($type === 'textarea') {
            $input = "<textarea name='" . $name . "' class='form-control'>" . $this->getValue($name) . "</textarea></br>";
        } else {
            $input = "<input type='$type'
                    name='$name'
                    id='$name'
                    value='" . $this->getValue($name) . "'
                    class='form-control' ></br>";
        }
        return $this->surender($label . $input);
    }

    public function select(string $name, string $label, array $options)
    {
        $label = "<label>$label</label>";
        $input = "<select name='" . $name . "' class='form-control'>";
        foreach ($options as $k => $v) {
            $attribut = $this->getValue($name) == $k ? 'selected' : '';
            $input .= "<option value=$k $attribut>$v</option>";
        }
        $input .= "</select></br>";
        return $this->surender($label . $input);
    }

}
