<?php
namespace Core\HTML;

class Form
{
    /**
     * donnees utilises par les formulaires
     *
     * @var array
     */
    private $data;
    /**
     * tag utilise pour entoure les champ
     *
     * @var string
     */
    public $tag = 'p';

    public function __construct($data)
    {
        $this->data = $data;
    }
    protected function getValue($index)
    {
        if (is_object($this->data)) {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    private function surender($html)
    {
        return "<{$this->tag}>" . $html . "</{$this->tag}>";
    }

    public function input(string $name, string $label, array $option = [])
    {
        $type = 'text';
        if (isset($option['type'])) {
            $type = $option['type'];
        }
        return $this->surender("<label>$label</label><input type='$type' name='$name' value='" . $this->getValue($name) . "' >");
    }

    public function submit($label)
    {
        return $this->surender("<input type='submit' value='$label'> ");
    }

}
