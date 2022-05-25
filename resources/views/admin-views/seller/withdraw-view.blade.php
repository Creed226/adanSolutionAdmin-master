@extends('layouts.back-end.app')
@section('title','Withdraw information View')
@push('css_or_js')
    <!-- Custom styles for this page -->
    <link href="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{asset('public/assets/back-end/css/croppie.css')}}" rel="stylesheet">

@endpush

@section('content')
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">{{trans('messages.Dashboard')}}</a>
                </li>
                <li class="breadcrumb-item"
                    aria-current="page">{{trans('messages.Withdraw')}}</li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h3 class="text-center text-capitalize">
                            {{trans('messages.seller')}} {{trans('messages.Withdraw')}} {{trans('messages.information')}}
                        </h3>

                        <i class="tio-wallet-outlined" style="font-size: 30px"></i>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <h5 class="text-capitalize">{{trans('messages.amount')}}
                                    : {{\App\CPU\BackEndHelper::set_symbol(\App\CPU\Convert::default($seller->amount))}}</h5>
                                <h5>{{trans('messages.request_time')}} : {{$seller->created_at}}</h5>
                            </div>
                            <div class="col-4">
                                Note : {{$seller->transaction_note}}
                            </div>
                            <div class="col-4">
                                @if ($seller->approved== 0)
                                    <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                            data-target="#exampleModal">{{trans('messages.proceed')}}
                                        <i class="tio-arrow-forward"></i>
                                    </button>
                                @else
                                    <div class="text-center float-right">
                                        @if($seller->approved==1)
                                            <label class="badge badge-success p-2 rounded-bottom">
                                                {{trans('messages.Approved')}}
                                            </label>
                                        @else
                                            <label class="badge badge-danger p-2 rounded-bottom">
                                                {{trans('messages.Denied')}}
                                            </label>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="min-height: 260px;">
                    <div class="card-header">
                        <h3 class="h3 mb-0">{{trans('messages.my_bank_info')}} </h3>
                        <i class="tio tio-dollar-outlined"></i>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 mt-2">
                            <h4>{{trans('messages.bank_name')}}
                                : {{$seller->seller->bank_name ? $seller->seller->bank_name : 'No Data found'}}</h4>
                            <h6>{{trans('messages.Branch')}}
                                : {{$seller->seller->branch ? $seller->seller->branch : 'No Data found'}}</h6>
                            <h6>{{trans('messages.holder_name')}}
                                : {{$seller->seller->holder_name ? $seller->seller->holder_name : 'No Data found'}}</h6>
                            <h6>{{trans('messages.account_no')}}
                                : {{$seller->seller->account_no ? $seller->seller->account_no : 'No Data found'}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            @if($seller->seller->shop)
                <div class="col-md-4">
                    <div class="card" style="min-height: 260px;">
                        <div class="card-header">
                            <h3 class="h3 mb-0">{{trans('messages.Shop')}} {{trans('messages.info')}}</h3>
                            <i class="tio tio-shop-outlined"></i>
                        </div>
                        <div class="card-body">
                            <h5>{{trans('messages.seller_b')}} : {{$seller->seller->shop->name}}</h5>
                            <h5>{{trans('messages.Phone')}} : {{$seller->seller->shop->contact}}</h5>
                            <h5>{{trans('messages.address')}} : {{$seller->seller->shop->address}}</h5>
                            <h5 class="text-capitalize badge badge-success">{{trans('messages.balance')}}
                                : {{\App\CPU\Convert::default($seller->seller->wallet->balance)}} {{\App\CPU\currency_symbol()}}
                            </h5>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-4">
                <div class="card" style="min-height: 260px;">
                    <div class="card-header">
                        <h3 class="h3 mb-0 "> {{trans('messages.Seller')}} {{trans('messages.info')}}</h3>
                        <i class="tio tio-user-big-outlined"></i>
                    </div>
                    <div class="card-body">
                        <h5>{{trans('messages.name')}} : {{$seller->seller->f_name}} {{$seller->seller->l_name}}</h5>
                        <h5>{{trans('messages.Email')}} : {{$seller->seller->email}}</h5>
                        <h5>{{trans('messages.Phone')}} : {{$seller->seller->phone}}</h5>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Withdraw request process</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('admin.sellers.withdraw_status',[$seller['id']])}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Request:</label>
                                    <select name="approved" class="custom-select" id="inputGroupSelect02">
                                        <option value="1">Approve</option>
                                        <option value="2">Deny</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Note about transaction or
                                        request:</label>
                                    <textarea class="form-control" name="note" id="message-text"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('script')

@endpush
