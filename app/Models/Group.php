<?php

namespace App\Models;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $background_color
 * @property-read int|null $participants_count
 * @property int $course_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Course|null $course
 * @property-read Collection<User> $participants
 */
class Group extends Model
{
    use SoftDeletes;
    use HasAttachments;

    protected $fillable = [
        'name',
        'description',
        'background_color',
        'participants_count',
        'course_id',
        'user_id'
    ];

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'group_participants', 'group_id', 'user_id');
    }

    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class, 'group_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
