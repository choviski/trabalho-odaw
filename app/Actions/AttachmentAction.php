<?php

namespace App\Actions;

use File;
use App\Models\Attachment;

class AttachmentAction
{
    public static function createAttachment(mixed $file, string $type): Attachment
    {
        $attachment = new Attachment();
        $attachment->path = 'new_path';
        $attachment->name = $type;
        $attachment->save();

        $image = $file;
        $extension = $image->getClientOriginalExtension();
        chmod($image->path(), 0755);
        $path = '/images/' . $type . '/' . $attachment->id . '.' . $extension;
        File::move($image, public_path() . $path);

        $attachment->path = $path;
        $attachment->save();

        return $attachment;
    }
}
