@extends('admin.layouts.layout')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('admin.education.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Education List Section</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>New Education</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.education.update', $education->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">University</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="university" class="form-control" value="{{ $education->university }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Degree</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="degree" class="form-control" value="{{ $education->degree }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Field Of Study</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="field_of_study" class="form-control" value="{{ $education->field_of_study }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Graduation Date</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="graduation_date" class="form-control" value="{{ $education->graduation_date }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" class="summernote">{{ $education->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7 text-right">
                                        <button class="btn btn-primary">Update Record</button>
                                    </div>
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


