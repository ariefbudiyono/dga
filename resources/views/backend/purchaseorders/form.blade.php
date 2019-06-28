<div class="box-body">
    
    <div class="form-group">
        
        {{ Form::label('supplier_id', trans('labels.backend.purchaseorders.table.supplier'), ['class' => 'col-lg-2 control-label required']) }} 

       <div class="col-lg-10">
        {{--  {{ Form::text('customer_order_id', null, ['class' => 'form-control customer_order_id box-size', 'placeholder' => trans('labels.backend.customerorderdetails.table.customer_order_id'), 'required' => 'required']) }} --}}
        @if(!empty($selectedsupplier))

        {{ Form::select('supplier_id', $suppliers, $selectedsupplier, ['id'=>'product_idd','class' => 'form-control tags box-size', 'required' => 'required']) }}

        @else

        <select id="supplier_id" class="form-control select2" name="supplier_id">
            <option value="">Choose Supplier...</option>
        </select>

        @endif
        
       </div><!--col-lg-10-->
   </div><!--form-group-->


   <div class="form-group">
    <!-- Create Your Field Label Here -->
    <!-- Look Below Example for reference -->
     {{ Form::label('po_code', trans('labels.backend.purchaseorders.table.po_code'), ['class' => 'col-lg-2 control-label']) }} 

    <div class="col-lg-10">
        <!-- Create Your Input Field Here -->
        <!-- Look Below Example for reference -->
         {{ Form::text('po_code', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.purchaseorders.table.po_code')]) }} 
    </div><!--col-lg-10-->
</div><!--form-group-->




<div class="form-group">
    {{ Form::label('tgl', trans('validation.attributes.backend.customerorders.tgl'), ['class' => 'col-lg-2 control-label required']) }}

    <div class="col-lg-10">
        @if(!empty($purchaseorders->tgl))
            {{ Form::text('tgl', \Carbon\Carbon::parse($purchaseorders->tgl)->format('Y-m-d'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.customerorders.tgl'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
        @else
            {{ Form::text('tgl', null, ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.customerorders.tgl'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
        @endif
    </div><!--col-lg-10-->
</div><!--form control-->


<div class="form-group">
    
     {{ Form::label('payment_term', trans('labels.backend.purchaseorders.table.payment_term'), ['class' => 'col-lg-2 control-label']) }} 

    <div class="col-lg-10">
    
         {{ Form::text('payment_term', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.purchaseorders.table.payment_term')]) }} 
    </div><!--col-lg-10-->
</div><!--form-group-->


<div class="form-group">
    
    {{ Form::label('delivery_term', trans('labels.backend.purchaseorders.table.delivery_term'), ['class' => 'col-lg-2 control-label']) }} 

   <div class="col-lg-10">
   
        {{ Form::text('delivery_term', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.purchaseorders.table.delivery_term')]) }} 
   </div><!--col-lg-10-->
</div><!--form-group-->


<div class="form-group">
    
    {{ Form::label('etd', trans('labels.backend.purchaseorders.table.etd'), ['class' => 'col-lg-2 control-label']) }} 

   <div class="col-lg-10">
   
        {{ Form::text('etd', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.purchaseorders.table.etd')]) }} 
   </div><!--col-lg-10-->
</div><!--form-group-->


<div class="form-group">
    {{ Form::label('partial_first_delivery', trans('labels.backend.purchaseorders.table.partial_first_delivery'), ['class' => 'col-lg-2 control-label required']) }}

    <div class="col-lg-10">
        @if(!empty($purchaseorders->partial_first_delivery))
            {{ Form::text('partial_first_delivery', \Carbon\Carbon::parse($purchaseorders->partial_first_delivery)->format('Y-m-d'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('labels.backend.purchaseorders.table.partial_first_delivery'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
        @else
            {{ Form::text('partial_first_delivery', null, ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('labels.backend.purchaseorders.table.partial_first_delivery'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
        @endif
    </div><!--col-lg-10-->
</div><!--form control-->



</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        
        $( document ).ready( function() {

            $('.datetimepicker1').datetimepicker({ format: 'YYYY-M-D'});;


            $("#supplier_id").select2({
        ajax: {
            //url: "http://dgaerp.test/admin/customerorderdetails/getcustomerorder",
            url: "{{ route('admin.purchaseorders.getsuppliers') }}",
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
