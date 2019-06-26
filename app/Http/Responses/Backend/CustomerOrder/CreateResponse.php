<?php

namespace App\Http\Responses\Backend\CustomerOrder;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{

    protected $factories ;


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
        return view('backend.customerorders.create')->with([
            'factories'=> $this->factories
        ]);
    }
}