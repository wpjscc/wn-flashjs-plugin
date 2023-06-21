<?php namespace Wpjscc\Flashjs\Models;

use Model;

/**
 * Model
 */
class Config extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    
    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'wpjscc_flashjs_config';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];


    public function beforeCreate()
    {
        if (!$this->identifier) {
            $this->identifier = \Str::random(10);
        }
    }
}
