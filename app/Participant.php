<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Mobile\Participant\Traits\ParticipantAttributes;

class Participant extends Model
{
    use SoftDeletes, ParticipantAttributes;

    /**
     * @var int
     */
    protected $perPage = 15;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $table = 'participants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function boxes()
    {
        return $this->belongsToMany(
            Box::class,
            'boxes_has_participants',
            'participant_id',
            'box_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function award()
    {
        return $this->hasOne(Award::class, 'participant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function instalments()
    {
        return $this->hasMany(Instalment::class, 'participant_id');
    }
}
