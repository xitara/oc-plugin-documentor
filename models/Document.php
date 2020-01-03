<?php namespace Xitara\Documentation\Models;

use Model;
use System\Classes\PluginManager;

/**
 * Document Model
 */
class Document extends Model
{
    protected $jsonable = ['var_list'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xitara_documentation_documents';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'groups' => [
            'Xitara\Documentation\Models\Group',
            'table' => 'xitara_documentation_documents_groups',
            'key' => 'group_id',
            'otherKey' => 'document_id',
        ],
        'tags' => [
            'Xitara\Documentation\Models\Taglist',
            'table' => 'xitara_documentation_tags_documents',
            'key' => 'tag_id',
            'otherKey' => 'document_id',
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [
        'images' => ['System\Models\File'],
    ];

    public function getNamespaceOptions($value, $formData)
    {
        $a = [];
        foreach (PluginManager::instance()->getPlugins() as $name => $plugin) {
            if (strpos($name, 'Xitara.') !== false) {
                $namespace = str_replace('.', '\\', $name) . '\Plugin';

                if (method_exists($namespace, 'registerComponents')) {
                    $components = (new $namespace(false))->registerComponents();
                    // var_dump($components);

                    $a = array_merge($a, $components);
                }
            }
        }

        ksort($a);
        $none = ['none' => 'keine Komponente'];
        $a = array_merge($none, $a);

        return $a;
    }
}
