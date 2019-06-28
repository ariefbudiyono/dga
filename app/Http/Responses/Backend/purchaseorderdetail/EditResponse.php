<?php

namespace App\Http\Responses\Backend\purchaseorderdetail;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\purchaseorderdetail\Purchaseorderdetail
     */
    protected $purchaseorderdetails;

    protected $product;

    /**
     * @param App\Models\purchaseorderdetail\Purchaseorderdetail $purchaseorderdetails
     */
    public function __construct($purchaseorderdetails,$product)
    {
        $this->purchaseorderdetails = $purchaseorderdetails;
        $this->product              = $product;
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
        $selectedProduct = $this->purchaseorderdetails->product->id;
        return view('backend.purchaseorderdetails.edit')->with([
            'purchaseorderdetails' => $this->purchaseorderdetails,
            'product'   => $this->product,
            'selectedproduct'   => $selectedProduct
        ]);
    }
}