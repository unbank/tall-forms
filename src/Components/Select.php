<?php


namespace Tanthammar\TallForms\Components;

use Illuminate\View\View;
use Tanthammar\TallForms\Traits\BaseBladeField;

class Select extends BaseBladeField
{
    public function __construct(
        public array|object      $field = [],
        public array             $attr = []
    )
    {
        parent::__construct((array)$field, $attr);
        $this->attr = array_merge($this->inputAttributes(), $attr);
    }

    protected function defaults(): array
    {
        return [
            'id' => 'select',
            'placeholder' => __('tf::form.select.placeholder'),
            'multiple' => false,
            'class' => 'form-select my-1 w-full shadow',
            'wrapperClass' => null,
            'options' => [],
            'disabled' => false,
        ];
    }

    protected function inputAttributes(): array
    {
        return [
            $this->field->wire => $this->field->key,
            'id' => $this->field->id,
            'name' => $this->field->name,
            'value' => old($this->field->name)
        ];
    }


    public function render(): View
    {
        return view('tall-forms::components.select');
    }
}
