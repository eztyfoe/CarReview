@extends('template')

@section('main')

@if (!empty($data))

<div class="col-md-12">

{!!
                    Form::open(['url' => '/brand/search', 'method' => 'get', 'files' => true])
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

                            @foreach($data as $datas)
<div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                @if(isset($datas))
                    @if(isset($datas->image))
                        <img  src="{{ asset('files/' . $datas->image) }}">
                    @endif
                @endif
                </div>
                <div class="card-body">
                <hr>
                  <h4 class="card-title">{{ $datas->name }}</h4>
                  <h6 class="card-category text-gray">{{ $datas->origin }}</h6>
                  <p class="card-description">
                  Created in {{ $datas->created_date->format('Y') }}'s
                  </p>
                <hr>
                  <a href="{{ url('/brand/'. $datas->id) }}" class="btn btn-primary btn-round">Detail</a>
                </div>
              </div>
            </div>
                            @endforeach
    @else
        <p>No Brand Data</p>
    @endif


    <div class="col-md-12">
    <div class="table-nav">
        <div class="paging">
            {{ $data->links() }}
        </div>
        <p class="card-category"> Total of <?php echo $brand_count; ?> brand's </p>
    </div>
    </div>
@stop

@section('footer')
        @include('footer')
@stop
