<?php namespace Xitara\Documentation\Models;

use Model;

/**
 * Taglist Model
 */
class Taglist extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'xitara_documentation_taglists';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
