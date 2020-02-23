<?php namespace Xitara\Documentation\Components;

use Cms\Classes\ComponentBase;
use Xitara\Documentation\Models\Document;

class SingleDoc extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'SingleDoc Component',
            'description' => 'No description provided yet...',
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRender()
    {
        $namespace = $this->param('namespace');
        $this->page['namespace'] = $namespace;
        $this->page['doc'] = Document::where('namespace', $namespace)->first();
    }
}
