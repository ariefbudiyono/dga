<?php

namespace App\Http\Responses\Backend\customerorderdetail;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\customerorderdetail\Customerorderdetail
     */
    protected $customerorderdetails;
    protected $customerOrder;
    protected $product;

    /**
     * @param App\Models\customerorderdetail\Customerorderdetail $customerorderdetails
     */
    public function __construct($customerorderdetails,$customerOrder,$product)
    {
        $this->customerOrder        = $customerOrder;
        $this->product              = $product;
        $this->customerorderdetails = $customerorderdetails;
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
        $selectedProduct = $this->customerorderdetails->product->id;
        return view('backend.customerorderdetails.edit')->with([
            'customerorderdetails' => $this->customerorderdetails,
            'customerorders'        => $this->customerOrder,
            'product'               => $this->product,
            'selectedproduct'       => $selectedProduct
        ]);
    }
}