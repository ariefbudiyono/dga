<div class="box-body">

        <div class="form-group">
                {{ Form::label('factory', trans('validation.attributes.backend.customerorders.factory'), ['class' => 'col-lg-2 control-label required']) }}
        
                <div class="col-lg-10">
                
                    {{ Form::select('factory_id', $factories, null, ['class' => 'form-control factories box-size', 'required' => 'required']) }}
                
                </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('tgl', trans('validation.attributes.backend.customerorders.tgl'), ['class' => 'col-lg-2 control-label required']) }}
    
            <div class="col-lg-10">
                @if(!empty($customerorders->tgl))
                    {{ Form::text('tgl', \Carbon\Carbon::parse($customerorders->tgl)->format('Y-m-d'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.customerorders.tgl'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
                @else
                    {{ Form::text('tgl', null, ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.customerorders.tgl'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
                @endif
            </div><!--col-lg-10-->
        </div><!--form control-->
        

    <div class="form-group">
       
        {{ Form::label('no_po', trans('labels.backend.customerorders.table.no_po'), ['class' => 'col-lg-2 control-label required']) }} 

            <div class="col-lg-10">
                {{ Form::text('no_po', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.no_po'), 'required' => 'required']) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
       
        {{ Form::label('issue_by', trans('labels.backend.customerorders.table.issue_by'), ['class' => 'col-lg-2 control-label required']) }} 

            <div class="col-lg-10">
                {{ Form::text('issue_by', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.issue_by'), 'required' => 'required']) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->    


    <div class="form-group">       
        {{ Form::label('attention', trans('labels.backend.customerorders.table.attention'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('attention', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.attention')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">       
        {{ Form::label('payment', trans('labels.backend.customerorders.table.payment'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('payment', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.payment')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('trade_terms', trans('labels.backend.customerorders.table.trade_terms'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('trade_terms', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.trade_terms')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('trans_type', trans('labels.backend.customerorders.table.trans_type'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('trans_type', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.trans_type')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('npwp', trans('labels.backend.customerorders.table.npwp'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('npwp', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.npwp')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('billing_place', trans('labels.backend.customerorders.table.billing_place'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('billing_place', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.billing_place')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('delivery_site', trans('labels.backend.customerorders.table.delivery_site'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('delivery_site', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.delivery_site')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('incharge', trans('labels.backend.customerorders.table.incharge'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('incharge', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.incharge')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('ass_manager', trans('labels.backend.customerorders.table.ass_manager'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('ass_manager', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.ass_manager')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('manager', trans('labels.backend.customerorders.table.manager'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('manager', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.manager')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('g_manager', trans('labels.backend.customerorders.table.g_manager'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('g_manager', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.g_manager')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('director', trans('labels.backend.customerorders.table.director'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('director', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.director')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('pres_dir', trans('labels.backend.customerorders.table.pres_dir'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('pres_dir', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.pres_dir')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">       
        {{ Form::label('rule_payment', trans('labels.backend.customerorders.table.rule_payment'), ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                {{ Form::text('rule_payment', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.customerorders.table.rule_payment')]) }} 
            </div><!--col-lg-10-->
    </div><!--form-group-->


</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
            $('.factories').select2();
            $('.datetimepicker1').datetimepicker({ format: 'YYYY-M-D'});;
        });
    </script>
@endsection
