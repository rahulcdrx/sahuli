@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.payment.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('plan') ? 'has-error' : '' }}">
                <label for="plan">Plan</label>
                <input type="text" id="plan" name="plan" class="form-control" required>
                @if($errors->has('bank_acc'))
                    <em class="invalid-feedback">
                        {{ $errors->first('plan') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('GPAY') ? 'has-error' : '' }}">
                <label for="GPAY">Gpay</label>
                <input type="text" id="GPAY" name="GPAY" class="form-control" required>
                @if($errors->has('GPAY'))
                    <em class="invalid-feedback">
                        {{ $errors->first('GPAY') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('bank_acc') ? 'has-error' : '' }}">
                <label for="bank_acc">Account Number</label>
                <input type="text" id="bank_acc" name="bank_acc" class="form-control" required>
                @if($errors->has('bank_acc'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bank_acc') }}
                    </em>
                @endif
            </div>
            

            <div class="form-group {{ $errors->has('ifsc') ? 'has-error' : '' }}">
                <label for="ifsc">IFSC</label>
                <input type="text" id="ifsc" name="ifsc" class="form-control" required>
                @if($errors->has('ifsc'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ifsc') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                <label for="branch">Branch</label>
                <input type="text" id="branch" name="branch" class="form-control" required>
                @if($errors->has('branch'))
                    <em class="invalid-feedback">
                        {{ $errors->first('branch') }}
                    </em>
                @endif
            </div>

            <div class="form-group">
                <label for="QR_image">QR Code Image</label>
                <input type="file" class="form-control" name="QR_image" >
                </div>
                @if($errors->has('QR_image'))
                    <em class="invalid-feedback">
                        {{ $errors->first('QR_image') }}
                    </em>
                @endif
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="save">
            </div>
        </form>


    </div>
</div>
@endsection
//below
@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.companies.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="QR_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($company) && $company->logo)
      var file = {!! json_encode($company->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $company->logo->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop
