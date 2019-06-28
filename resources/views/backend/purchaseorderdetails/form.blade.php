<div class="box-body">
    
    <div class="form-group">
        
        {{--  {{ Form::label('customer_order_id', trans('labels.backend.customerorderdetails.table.customer_order_id'), ['class' => 'col-lg-2 control-label required']) }} --}}

        <div class="col-lg-10">
          {{ Form::hidden('purchase_order_id', 1, ['class' => 'form-control customer_order_id box-size', 'placeholder' => trans('labels.backend.products.table.name'), 'required' => 'required']) }}         
        </div><!--col-lg-10-->
    </div><!--form-group-->

    
    <div class="form-group">
        
        {{ Form::label('product_id', trans('labels.backend.customerorderdetails.table.product_id'), ['class' => 'col-lg-2 control-label required']) }} 

       <div class="col-lg-10">
        {{--  {{ Form::text('customer_order_id', null, ['class' => 'form-control customer_order_id box-size', 'placeholder' => trans('labels.backend.customerorderdetails.table.customer_order_id'), 'required' => 'required']) }} --}}
        @if(!empty($selectedproduct))

        {{ Form::select('product_id', $product, $selectedproduct, ['id'=>'product_idd','class' => 'form-control tags box-size', 'required' => 'required']) }}

        @else

        <select id="product_id" class="form-control select2" name="product_id">
            <option value="">Choose User...</option>
        </select>

        @endif
        
       </div><!--col-lg-10-->
   </div><!--form-group-->


   <div class="form-group">
    
     {{ Form::label('qty', trans('labels.backend.purchaseorderdetails.table.qty'), ['class' => 'col-lg-2 control-label']) }} 

    <div class="col-lg-10">        
        {{ Form::text('qty', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.purchaseorderdetails.table.qty')]) }} 
    </div><!--col-lg-10-->
</div><!--form-group-->


<div class="form-group">
    
    {{ Form::label('unit_price', trans('labels.backend.purchaseorderdetails.table.unit_price'), ['class' => 'col-lg-2 control-label']) }} 

   <div class="col-lg-10">        
       {{ Form::text('unit_price', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.purchaseorderdetails.table.unit_price')]) }} 
   </div><!--col-lg-10-->
</div><!--form-group-->


<div class="form-group">
    
    {{ Form::label('amount', trans('labels.backend.purchaseorderdetails.table.amount'), ['class' => 'col-lg-2 control-label']) }} 

   <div class="col-lg-10">        
       {{ Form::text('amount', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.purchaseorderdetails.table.amount')]) }} 
   </div><!--col-lg-10-->
</div><!--form-group-->






</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            
            $("#product_id").select2({
        ajax: {
            //url: "http://dgaerp.test/admin/customerorderdetails/getcustomerorder",
            url: "{{ route('admin.customerorderdetails.getproduct') }}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    query: params.term, // search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1,
        placeholder: function(){
            $(this).data('placeholder');
        },
        templateResult: ResultTemplater,
        templateSelection: SelectionTemplater
    });
    function ResultTemplater(item) {
        return item.name + ' - ' + item.id;
    } 
    function SelectionTemplater(item) {
        if(typeof item.name !== "undefined") {
            return ResultTemplater(item);
        }
        return item.name;
    }



        });
    </script>
@endsection
