@extends('layouts.admin')
@section('content')
@can('job_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.jobs.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.job.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.job.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Job" style="margin: 0px">
                <thead>
                    <tr>
                        <th width="10">
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.title') }}
                        </th>
                       <!--  <th>
                            {{ trans('cruds.job.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.district') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.location') }}
                        </th> -->
                    <!--     <th>
                            {{ trans('cruds.job.fields.company') }}
                        </th> -->
                        <th style="width: 10px">
                            {{ trans('cruds.job.fields.categories') }}
                        </th>
                      
                        <th>
                            {{ trans('cruds.job.fields.job_image') }}
                        </th>
                        <th style="width: 10px">
                            {{ trans('cruds.job.fields.start_date') }}
                        </th>
                        <th style="width: 10px">
                            {{ trans('cruds.job.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.job_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.job_social') }}
                        </th>
                      <!--   <th>
                            {{ trans('cruds.job.fields.job_link') }}
                        </th> -->
                        <th>
                          Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $key => $job)
                        <tr data-entry-id="{{ $job->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $job->id ?? '' }}
                            </td>
                            <td>
                                {{ $job->title ?? '' }}
                            </td>
                            <!-- <td>
                                {{ $job->states->name ?? '' }}
                            </td>
                            <td>
                                {{ $job->districts->name ?? '' }}
                            </td>
                            <td>
                                {{ $job->location->name ?? '' }}
                            </td> -->
                         <!--    <td>
                                {{ $job->company->name ?? '' }}
                            </td> -->
                            <td>
                                {{ $job->categories->name ?? '' }}
                            </td>
                            <td>
                                <!--{{ $job->job_image ?? '' }}-->
                                <img src="{{ asset('public/jobimage/'."$job->job_image") }}" width="75" height="75">
                            </td>
                            <td>
                                {{ $job->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $job->end_date ?? '' }}
                            </td>
                            <td>
                                <!--{{ $job->job_file ?? '' }}-->
                              
                                <a href="{{ asset('public/jobimage/'."$job->job_file") }}" download="">Download</a>
                            </td>
                            <td>
                                <!--{{ $job->job_social ?? '' }}-->
                                <img src="{{ asset('public/jobimage/'."$job->job_social") }}" width="75" height="75">
                            </td>
                        <!--     <td>
                                {{ $job->job_link ?? '' }}
                            </td> -->

                            <td>
                                @can('job_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jobs.show', $job->id) }}" style="width: 50px; font-size: 9px;">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('job_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jobs.edit', $job->id) }}" style="width: 50px; font-size: 9px;">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('job_delete')
                                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" style="width: 50px; font-size: 9px;" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
// @can('job_delete')
//   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
//   let deleteButton = {
//     text: deleteButtonTrans,
//     url: "{{ route('admin.jobs.massDestroy') }}",
//     className: 'btn-danger',
//     action: function (e, dt, node, config) {
//       var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
//           return $(entry).data('entry-id')
//       });

//       if (ids.length === 0) {
//         alert('{{ trans('global.datatables.zero_selected') }}')

//         return
//       }

//       if (confirm('{{ trans('global.areYouSure') }}')) {
//         $.ajax({
//           headers: {'x-csrf-token': _token},
//           method: 'POST',
//           url: config.url,
//           data: { ids: ids, _method: 'DELETE' }})
//           .done(function () { location.reload() })
//       }
//     }
//   }
//   dtButtons.push(deleteButton)
// @endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Job:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
