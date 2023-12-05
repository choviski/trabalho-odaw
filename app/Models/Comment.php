<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $content
 * @property int $up_vote_count
 * @property int $down_vote_count
 * @property int|null $parent_comment_id
 * @property int $publication_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<Comment> $childComments
 * @property-read int|null $child_comments_count
 * @property-read Publication|null $publication
 * @property-read User|null $user
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content',
        'up_vote_count',
        'down_vote_count',
        'parent_comment_id',
        'publication_id',
        'user_id'
    ];

    public function childComments(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function publication(): BelongsTo
    {
        return $this->belongsTo(Publication::class);
    }
}
