@extends('layouts.admin')

@section('title', 'View Enquiries')
@section('page-title', 'Enquiry List')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="font-weight: bold;">
                        View Offers
                    </h3>
                </div>
                <div class="box-body">
                    <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Subject</th>
                                <th style="text-align: center;">Message</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($enquiries->count()>0)
                                @php($count = 1)
                                    @foreach ($enquiries as $enquiry)
                                        <tr class="col text-center">
                                            <td>{{$count}}</td>
                                            <td>{{$enquiry->name}}</td>
                                            <td>{{$enquiry->email}}</td>
                                            <td>{{$enquiry->subject}}</td>
                                            <td>{{$enquiry->message}}</td>

                                            {{-- deleting users from database --}}
                                            <td>
                                            @can('enquiry-delete')
                                                <form action="{{route('enquiry.destroy',['id' => $enquiry->id])}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                </form>
                                            @endcan
                                            </td>
                                        </tr>
                                        @php($count++)
                                    @endforeach
                            @else
                                <tr>
                                    <th colspan="6" class="text-center">
                                        No entries in the table!
                                    </th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

