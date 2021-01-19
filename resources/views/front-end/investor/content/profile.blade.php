@extends('front-end.investor.dashboard')

@section('profil')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Profile {{$profile->nama_perusahaan}}, {{$profile->badan_hukum}}</h3>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Company Details</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('update.investor', $profile->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="feFirstName">Name</label>
                                        <input type="text" class="form-control" id="feFirstName" name="name" placeholder="Full Name" value="{{$profile->investor_name}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" id="position" name="jabatan" placeholder="Position" value="{{$profile->jabatan}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$profile->phone}}" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="companyname">Company Name</label>
                                        <input type="text" class="form-control" id="companyname" name="company_name" placeholder="Email" value="{{$profile->nama_perusahaan}}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="badan_hukum">Corporation</label>
                                        <input type="text" class="form-control" id="badan_hukum"  name="badan_hukum" value="{{$profile->badan_hukum}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bidang_usaha">Business Field</label>
                                        <input type="text" class="form-control" id="bidang_usaha" name="bidang_usaha" value="{{$profile->bidang_usaha}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="feInputAddress">Address</label>
                                    <input type="text" class="form-control" id="feInputAddress" name="address" placeholder="1234 Main St" value="{{$profile->alamat}}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{$profile->userInv->email}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" value="{{$profile->country}}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-accent">Update Account</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection


