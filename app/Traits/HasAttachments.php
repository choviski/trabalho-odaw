<?php

namespace App\Traits;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property-read Collection|Attachment[] $attachments
 */
trait HasAttachments
{
    public function attachments(): MorphToMany
    {
        return $this->morphToMany(Attachment::class, 'attachable')->withPivot('attachable_type');
    }
}
