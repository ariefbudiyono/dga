<div class="box-body">
    <div class="form-group">
        
         {{ Form::label('name', trans('labels.backend.suppliers.table.name'), ['class' => 'col-lg-2 control-label required']) }} 

        <div class="col-lg-10">
        
             {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.suppliers.table.name'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">
        
        {{ Form::label('alamat', trans('labels.backend.suppliers.table.alamat'), ['class' => 'col-lg-2 control-label']) }} 

       <div class="col-lg-10">
       
            {{ Form::text('alamat', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.suppliers.table.alamat')]) }}
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
        });
    </script>
@endsection
