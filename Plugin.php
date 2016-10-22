<?php namespace Jhendess\Pagination;

use System\Classes\PluginBase;

/**
 * Pagination Plugin Information File
 */
class Plugin extends PluginBase {

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails() {
        return [
            'name' => 'Pagination',
            'description' => 'No description provided yet...',
            'author' => 'Jakob Hendeß',
            'homepage' => 'https://github.com/jhendess/october-pagination',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register() {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot() {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents() {
        return [
            'Jhendess\Pagination\Components\AutoPaginate' => 'autoPaginate',
        ];
    }
}
