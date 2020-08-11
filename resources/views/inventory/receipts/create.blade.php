@extends('layouts.app', ['page' => 'New Receipt', 'pageSlug' => 'receipts', 'section' => 'inventory'])

@section('content')
    <div class="container-fluid mt--7">
    @include('alerts.error')
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">New Receipt</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('receipts.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('receipts.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">Receipt Information</h6>
                            <div class="pl-lg-4">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">Title</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Title" value="{{ old('title') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>

                                <div class="form-group{{ $errors->has('client_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-provider">Provider</label>
                                    <select name="provider_id" id="input-provider" class="form-select form-control-alternative{{ $errors->has('client') ? ' is-invalid' : '' }}">
                                        <option value="">Not Specified</option>
                                        @foreach ($providers as $provider)
                                            @if($provider['id'] == old('provider_id'))
                                                <option value="{{$provider['id']}}" selected>{{$provider['name']}}</option>
                                            @else
                                                <option value="{{$provider['id']}}">{{$provider['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'client_id'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Continue</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
@endpush