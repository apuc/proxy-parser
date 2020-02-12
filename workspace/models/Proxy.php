<?php


namespace workspace\models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Proxy
 * @package workspace\models
 * @property string $host
 * @property integer $port
 * @property string $type
 * @property integer $speed
 * @property $upd
 * @property string $country
 */
class Proxy extends Model
{
    public $timestamps = false;

    protected $table = "proxy";
    protected $fillable = ['host', 'port', 'type', 'speed', 'upd', 'country'];

    public static function createByParse($data)
    {
        $hostPort = explode(':', $data['name']);
        $model = new self();
        $model->host = $hostPort[0];
        $model->port = $hostPort[1];
        $model->type = $data['type'];
        $model->speed = $data['speed'];
        $model->upd = $data['upd'];
        $model->country = $data['country'];
        return $model->save();
    }

}