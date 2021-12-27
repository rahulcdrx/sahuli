@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Result
    </div>

    <div class="card-body">
        <form action="{{ route("admin.result.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($result) ? $result->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif

            </div>
            <div class="form-group">
                <label for="logo">Link</label><br>
                <input type="text" name="link" class="form-control">
               

            </div>
             <div class="form-group">
                
                <input type="hidden" name="post_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
               

            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
               <select class="form-control" id="exampleFormControlSelect1" name="result_category" required>
                <option value="student result">Student Result</option>
                <option  value="govenment result">Govenment Result </option>
               
                 
                </select>

            </div>
           
            <div>
                <input class="btn btn-danger" type="submit" value="save">
            </div>
        </form>


    </div>
</div>
@endsection


