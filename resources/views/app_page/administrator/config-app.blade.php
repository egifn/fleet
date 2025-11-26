@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">DATA CONFIG WEB</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">home</a></li>
                            <li class="breadcrumb-item active">config-web</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="form" action="{{ route('admin.config_app.update') }}" method="post">
                        {{ csrf_field() }}
                        <div class="card-header">
                            {{-- content --}}
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">app name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="app_name" value="{{ $data_config_app->app_name }}" required />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Code activation</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="code_activation" value=""/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">App description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="app_description" required cols="30" rows="10">{{ $data_config_app->app_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">App keyword</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="app_keyword" value="{{ $data_config_app->app_keyword }}" required />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">App author</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="app_author" value="{{ $data_config_app->app_author }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection