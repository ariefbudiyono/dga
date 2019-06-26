<?php

namespace App\Http\Responses\Backend\CustomerOrder;

use Illuminate\Contracts\Support\Responsable;
use App\Models\Factory\Factory;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\customerorder\Customerorder
     */
    protected $customerorders;
    protected $factories;

    /**
     * @param App\Models\customerorder\Customerorder $customerorders
     */
    public function __construct($customerorders,$factories)
    {   
        
        $this->factories        = $factories;
        $this->customerorders   = $customerorders;
        
        //$factory = 1;
        
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
        $factory = Factory::find($this->customerorders->factory_id);
        return view('backend.customerorders.edit')->with([
            'customerorders' => $this->customerorders,
            'factories' => $this->factories,
        ]);
    }
}