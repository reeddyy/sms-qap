<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusApp extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'status_apps';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status_name',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function statusQualificationsApps()
    {
        return $this->belongsToMany(QualificationsApp::class);
    }

    public function statusEdpApps()
    {
        return $this->belongsToMany(EdpApp::class);
    }

    public function statusCorporatesApps()
    {
        return $this->belongsToMany(CorporatesApp::class);
    }

    public function statusIndividualsApps()
    {
        return $this->belongsToMany(IndividualsApp::class);
    }

    public function statusAdaApps()
    {
        return $this->belongsToMany(AdaApp::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
