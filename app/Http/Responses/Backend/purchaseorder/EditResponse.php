<?php

namespace App\Http\Responses\Backend\purchaseorder;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\purchaseorder\Purchaseorder
     */
    protected $purchaseorders;
    protected $suppliers;

    /**
     * @param App\Models\purchaseorder\Purchaseorder $purchaseorders
     */
    public function __construct($purchaseorders,$supplier)
    {
        $this->suppliers        = $supplier;
        $this->purchaseorders   = $purchaseorders;
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
        $selectedSupplier = $this->purchaseorders->supplier->id;
        return view('backend.purchaseorders.edit')->with([
            'purchaseorders' => $this->purchaseorders,
            'suppliers'        => $this->suppliers, 
            'selectedsupplier' => $selectedSupplier
        ]);
    }
}