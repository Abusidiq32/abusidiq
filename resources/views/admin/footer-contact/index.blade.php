@extends('admin.layouts.layout')

@section('content')
    <!-- Main Content -->
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{route('admin.dashboard')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Footer Contact Info</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Update Footer Contact Info</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.footer-contact.update', 1)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="address" class="form-control" value="{{$footerContact->address}}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">phone</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="phone" class="form-control" value="{{$footerContact->phone}}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="email" class="form-control" value="{{$footerContact->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7 text-right">
                                          <button class="btn btn-primary">Save Changes</button>
                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
