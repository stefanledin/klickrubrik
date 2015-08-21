<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Headline extends Model
{
    protected $fillable = ['headline', 'attachment', 'attachment_type'];
    protected $attachmentTypes = ['uploaded-image', 'youtube-link', 'image-link'];

    /**
     * Determines the type of attachment and saves it.
     * @param Request $request
     */
    public function addAttachment(Request $request)
    {
        if ($request->hasFile('uploaded-image')) {
            $this->handleUploadedImage($request->file('uploaded-image'));
        } else {
            $this->handleLinkAttachment($request);
        }
    }

    protected function handleUploadedImage(UploadedFile $file)
    {
        $imageName = $file->getClientOriginalName();
        Storage::put('uploads/'.$imageName, $file);
        $this->attachment = $imageName;
        $this->attachment_type = 'image';
    }

    protected function handleLinkAttachment(Request $request)
    {
        $linkAttachmentTypes = ['youtube-link', 'image-link'];
        foreach ($linkAttachmentTypes as $attachmentType) {
            if ($request->has($attachmentType)) {
                $this->attachment = $request->input('youtube-link');
                $this->attachment_type = 'youtube';
            }
        }
    }
}
