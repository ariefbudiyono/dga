<?php

namespace App\Http\Responses\Backend\Factory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\factory\Factory
     */
    protected $factories;

    /**
     * @param App\Models\factory\Factory $factories
     */
    public function __construct($factories)
    {
        $this->factories = $factories;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.factories.edit')->with([
            'factories' => $this->factories
        ]);
    }
}