<?php namespace Xitara\Documentation\Models;

use Model;

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
}
