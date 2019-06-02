<?php namespace Xitara\Documentation\Components;

use Cms\Classes\ComponentBase;
use Xitara\Documentation\Models\Document;
use Xitara\Documentation\Models\Group;

class DocumentOutput extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Dokumentation Ausgabe',
            'description' => 'Anzeige von Dokumentationen, optional nach Gruppe',
        ];
    }

    public function defineProperties()
    {
        return [
            'group' => [
                'title' => 'Gruppe',
                'description' => '"Alle" zeigt alle Dokumentationen an, ansonsten nur die Gruppe',
                'default' => 'all',
                'type' => 'dropdown',
                'required' => true,
            ],
        ];
    }

    public function getGroupOptions()
    {
        return array_merge(
            ['all' => 'Alle'],
            Group::orderBy('name', 'asc')->lists('name', 'id')
        );
    }

    public function onRun()
    {
        $this->addJs('https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?lang=css&amp;skin=sunburst');
        // $this->addJs('https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?lang=css&amp;skin=desert');

        $this->addCss('https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
        $this->addJs('https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js');

        $this->addCss('/plugins/xitara/documentation/assets/css/markdown.css');

        $this->page['documents'] = Document::orderBy('name', 'asc')->get();
    }
}
