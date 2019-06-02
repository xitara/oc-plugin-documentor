<?php namespace Xitara\Documentation;

use Backend;
use System\Classes\PluginBase;

/**
 * Documentation Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Dokumentationen',
            'description' => 'Dokumentationen',
            'author' => 'Xitara',
            'icon' => 'icon-file-text-o',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Xitara\Documentation\Components\DocumentOutput' => 'documentoutput',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'xitara.documentation.documents' => [
                'tab' => 'Dokumentation',
                'label' => 'Dokumentation anlegen/ändern',
            ],
            'xitara.documentation.groups' => [
                'tab' => 'Gruppen',
                'label' => 'Gruppen anlegen/ändern',
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'documentation' => [
                'label' => 'Dokumentation',
                'url' => Backend::url('xitara/documentation/document'),
                'icon' => 'icon-file-text-o',
                'permissions' => ['xitara.documentation.*'],
                'order' => 500,
                'sideMenu' => [
                    'documents' => [
                        'label' => 'Dokumente',
                        'icon' => 'icon-copy',
                        'url' => Backend::url('xitara/documentation/document'),
                        'permissions' => ['xitara.documentation.documents'],
                    ],
                    'groups' => [
                        'label' => 'Gruppen',
                        'icon' => 'icon-copy',
                        'url' => Backend::url('xitara/documentation/group'),
                        'permissions' => ['xitara.documentation.groups'],
                    ],
                ],
            ],
        ];
    }
}
