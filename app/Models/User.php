<?php

namespace App\Models;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use \Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $login
 * @property string $password
 * @property string|null $background_color
 * @property int $course_id
 * @property int $role_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<Comment> $comments
 * @property-read Course $course
 * @property-read Collection<Publication> $likedPublications
 * @property-read Collection<Group> $groups
 * @property-read Collection<Attachment> $attachments
 * @property-read Role $role
 */
class User extends Model
{
    use SoftDeletes;
    use HasAttachments;

    protected $fillable = [
        'name',
        'email',
        'login',
        'password',
        'background_color',
        'role_id',
        'course_id',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function publication(): HasMany
    {
        return $this->hasMany(Publication::class);
    }

    public function likedPublications(): BelongsToMany
    {
        return $this->belongsToMany(Publication::class, 'liked_publications');
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_participants', 'user_id','group_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}
