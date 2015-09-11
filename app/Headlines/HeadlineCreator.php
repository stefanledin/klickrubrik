<?php

namespace App\Headlines;


use App\Attachment;
use App\Headline;
use Illuminate\Http\Request;
use Storage;

class HeadlineCreator {

    protected $punchlines;

    /**
     * HeadlineCreator constructor.
     */
    public function __construct()
    {
        $this->punchlines = getPunchlines();
    }


    public function create(Request $request)
    {
        $headline = new Headline();

        $headline->text = $this->writeHeadline($request, $headline);

        $headline->uid = time();
        $headline->save();

        $this->addAttachmentIfAny($request, $headline);

        return $headline;
    }

    /**
     * @param Request $request
     * @return Attachment
     */
    protected function addFileAttachment(Request $request)
    {
        $attachment = new Attachment();

        $imageName = $request->file('uploaded-image')->getClientOriginalName();
        $request->file('uploaded-image')->move(public_path().'/uploads/', $imageName);

        $attachment->link = url() . '/uploads/' . $imageName;
        $attachment->type = 'image';

        return $attachment;
    }

    /**
     * @param Request $request
     * @return Attachment
     */
    protected function addLinkAttachment(Request $request)
    {
        $linkAttachmentTypes = [
            (object)[
                'name' => 'youtube-link',
                'type' => 'youtube'
            ],
            (object)[
                'name' => 'image-link',
                'type' => 'image'
            ]
        ];
        foreach ($linkAttachmentTypes as $linkAttachmentType) {
            if ($request->has($linkAttachmentType->name)) {
                $attachment = new Attachment();

                $attachment->link = $request->input($linkAttachmentType->name);
                $attachment->type = $linkAttachmentType->type;

                return $attachment;
            }
        }
    }

    /**
     * @param Request $request
     * @return string
     */
    protected function writeHeadline(Request $request)
    {
        $who = $request->input('who');
        $what = $request->input('what');
        $punchline = $this->punchlines[$request->input('punchline')];
        return sprintf('<h2>Först trodde %s</h2><h1>att %s</h1><h2>%s</h2>', $who, $what, $punchline);
    }

    /**
     * @param Request $request
     * @param $headline
     */
    protected function addAttachmentIfAny(Request $request, Headline $headline)
    {
        if ($request->hasFile('uploaded-image')) {
            $attachment = $this->addFileAttachment($request);
        } else {
            $attachment = $this->addLinkAttachment($request);
        }

        if ($attachment) {
            $headline->attachment()->save($attachment);
        }
    }
}