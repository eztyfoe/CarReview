@extends('template')

@section('main')

<div class="col-md-12">
{!!
                    Form::open(['url' => '/admin/review/search', 'method' => 'get', 'files' => true])
                !!}

    {!! Form::label('search', 'Search', ['class' => 'bmd-label-floating']) !!}

@if (!empty($search))
    {!! Form::text('search', $search, ['class' => 'form-control', 'id' => 'search']) !!}
    @else
    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search']) !!}
    @endif

{!!
    Form::close()
!!}
</div>
    <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Review Table</h4>
                  <p class="card-category"> <?php echo $review_count; ?> review's </p>
                  <a class="btn btn-success btn-sm" href="{{ url('/admin/review/create') }}">Add Review</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    @if (!empty($data))
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Car
                        </th>
                        <th>
                            Created At
                        </th>
                        <th>
                            Updated At
                        </th>
                        <th>
                            Action
                        </th>
                      </thead>
                      <tbody>
                            @foreach($data as $datas)
                                <td>{{ $datas->id }}</td>
                                <td>{{ $datas->users->username }}</td>
                                <td>{{ $datas->car->name }}</td>
                                <td>{{ $datas->created_at }}</td>
                                <td>{{ $datas->updated_at }}</td>
                                <td>
                                    <div class="box-button">
                                    {{ link_to('/admin/review/' . $datas->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                    </div>
                                    <div class="box-button">
                                    {!!
                                        Form::open(['method' => 'DELETE', 'action' => ['ReviewController@destroy', $datas->id]])
                                    !!}
                                    {!!
                                        Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])
                                    !!}
                                    {!!
                                        Form::close()
                                    !!}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                      </tbody>
                    </table>
    @else
        <p>No Car Data</p>
    @endif
                  </div>
                </div>
              </div>
            </div>

    <div class="table-nav">
        <div class="paging">
            {{ $data->links() }}
        </div>
    </div>
@stop

@section('footer')
        @include('footer')
@stop
