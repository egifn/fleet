@extends('app_page.layout.layout_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">DATA AKTIVITIES</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-scroll" class="table table-bordered nowrap w-100 tabel-sm">
                            <thead>
                                <tr>
                                    <th style="color: #ffffff; background-color: #5156be;">subject</th>
                                    <th style="color: #ffffff; background-color: #5156be;">url</th>
                                    <th style="color: #ffffff; background-color: #5156be;">method</th>
                                    <th style="color: #ffffff; background-color: #5156be;">ip</th>
                                    <th style="color: #ffffff; background-color: #5156be;">agent</th>
                                    <th style="color: #ffffff; background-color: #5156be;">device</th>
                                    <th style="color: #ffffff; background-color: #5156be;">browser</th>
                                    <th style="color: #ffffff; background-color: #5156be;">platform</th>
                                    <th style="color: #ffffff; background-color: #5156be;">user_id</th>
                                    <th style="color: #ffffff; background-color: #5156be;">status</th>
                                    <th style="color: #ffffff; background-color: #5156be;">created_at</th>
                                    <th style="color: #ffffff; background-color: #5156be;">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($data_activities_log as $item_activities_log)
                                <tr>
                                    <td style="padding: 7px 5px;left: -1px;position: sticky;">{{ $item_activities_log->subject }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->url }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->method }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->ip }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->agent }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->device }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->browser }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->platform }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->user_id }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->status }}</td>
                                    <td style="padding: 7px 5px;">{{ $item_activities_log->created_at }}</td>
                                    <td style="padding: 7px 5px;">
                                        <a href="#" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal-form{{ $item_activities_log->id }}" style="padding: 1px 10px 1px 10px;">view data</a>
                                    </td>
                                </tr>
                                <!--  Large modal example -->
                                <div class="modal fade modal-form{{ $item_activities_log->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel">DATA</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    {{ $item_activities_log->data }}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                <!-- /.modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection