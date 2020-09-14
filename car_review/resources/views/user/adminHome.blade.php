@extends('template')

@section('main')
    <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">supervisor_account</i>
                  </div>
                  <p class="card-category">Latest 5 User</p>
                  <h3 class="card-title">From Total <?php echo $user_count; ?>
                    <small>User</small>
                  </h3>
                </div>
                <div class="card-footer">
                    @if (!empty($data_user))
                <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Username</th>
                      <th>Email</th>
                    </thead>
                    <tbody>
                            @foreach($data_user as $datas)
                            <tr>
                                <td>{{ $datas->id }}</td>
                                <td>{{ $datas->username }}</td>
                                <td>{{ $datas->email }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                  </table>
                  @else
                    No User Data
                  @endif
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">directions_car</i>
                  </div>
                  <p class="card-category">Latest 5 Car</p>
                  <h3 class="card-title">From Total <?php echo $car_count; ?>
                    <small>Cars</small>
                  </h3>
                </div>
                <div class="card-footer">
                @if (!empty($data_car))
                <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Brand</th>
                      <th>Name</th>
                      <th>Created Date</th>
                    </thead>
                    <tbody>
                            @foreach($data_car as $datas)
                            <tr>
                                <td>{{ $datas->id }}</td>
                                <td>{{ $datas->brand->name }}</td>
                                <td>{{ $datas->name }}</td>
                                <td>{{ $datas->created_date->format('d-m-Y') }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                  </table>
                  @else
                    No Car Data
                  @endif
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">stars</i>
                  </div>
                  <p class="card-category">Latest 5 Brand</p>
                  <h3 class="card-title">From Total <?php echo $brand_count; ?>
                    <small>Brands</small>
                  </h3>
                </div>
                <div class="card-footer">
                @if (!empty($data_brand))
                <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Origin</th>
                      <th>Created Date</th>
                    </thead>
                    <tbody>
                            @foreach($data_brand as $datas)
                            <tr>
                                <td>{{ $datas->id }}</td>
                                <td>{{ $datas->name }}</td>
                                <td>{{ $datas->origin }}</td>
                                <td>{{ $datas->created_date->format('d-m-Y') }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                  </table>
                  @else
                    No Brand Data
                  @endif
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">rate_review</i>
                  </div>
                  <p class="card-category">Latest 5 Review</p>
                  <h3 class="card-title">From Total <?php echo $review_count; ?>
                    <small>Reviews</small>
                  </h3>
                </div>
                <div class="card-footer">
                @if (!empty($data_review))
                <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Username</th>
                      <th>Car</th>
                      <th>Created At</th>
                    </thead>
                    <tbody>
                            @foreach($data_review as $datas)
                            <tr>
                                <td>{{ $datas->id }}</td>
                                <td>{{ $datas->users->username }}</td>
                                <td>{{ $datas->car->name }}</td>
                                <td>{{ $datas->created_at }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                  </table>
                  @else
                    No Review Data
                  @endif
                  </table>
                </div>
              </div>
            </div>
@stop

@section('footer')
        @include('footer')
@stop
