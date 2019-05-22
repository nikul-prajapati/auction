 <div class="box-body">


                
                    <div class="form-group">
                    {{ Form::label('name', trans('name'), ['class' => 'col-lg-2 control-label required']) }}
                   
                        <div class="col-lg-10">
                            @foreach($users as $value) 
                            <label for="name" class="col-md-4 control-label" name="id">{{$value['first_name']}}</label> 
                            <input type="hidden" class="col-md-6" name="users_id"  value= "<?php echo $value['id'] ?>"  />
                            
                           @endforeach
                       </div><!--col-lg-10-->
                    </div><!--form control-->
                

 
                <input type="hidden" class="col-md-6" name="page" id="page"  value="{{ $users->currentPage() }}"  />

                <div class="form-group">
                {{ Form::label('Image', trans('Image'), ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-lg-10">
                @foreach($users as $xyz)
                <img src="{{ URL::asset('img/frontend/pics/'.$xyz['filename']) }}" height="80px" width="90px" align="center" alt="Any alt text"/>
                @endForeach
                 </div><!--col-lg-10-->
                </div><!--form control-->

                
                {{-- Price --}}
                <div class="form-group">
                    {{ Form::label('price', trans('price'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('price', null, ['class' => 'form-control box-size', 'placeholder' => trans('price'), 'required' => 'required' , 'price' => 'min:200']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                 

                {{-- Select Team Name --}}
                <div class="form-group">
                    {{ Form::label('Select Team Name', trans('Select Team Name'), ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-lg-10">
               <!--  <h4 class="col-md-2">Select Team Name</h4> -->
                <select class="btn btn-primary dropdown-toggle" data-toggle="dropdown" name="teams_id">
                  <option>select</option>
                   @foreach($data as $role)
                   <option  value="<?php echo $role->id ?>">
                   {{$role->Team_name}}</option>
                  @endForeach
                </select><br><br>
                </div><!--col-lg-10-->
                </div><!--form control-->

                 {{ $users->links('backend.bids.pagination') }}

            </div>