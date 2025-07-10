@extends('yellowpages::layout.admin.admin')
@section('title', 'User Listing')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@section('content')
<!--start page wrapper -->
<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">व्यवस्थापक</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/user-listing')}}"><i class="bx bx-user"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">उपयोगकर्ता सूचीकरण</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="mx-auto col-xl-9 w-100">
            <!-- Success Message -->
            @if(session('success'))
            <div class="mt-3 alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <h6 class="mb-0 text-uppercase">उपयोगकर्ता सूचीकरण</h6>
            <hr />
            <div class="card">
                <div class="card-body d-flex justify-content-end align-items-end">
                    <a href="{{ route('admin.user-register') }}" class="btn btn-primary">नई उपयोगकर्ता को जोड़ना</a>
                </div>
                <div class="card-body">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">नाम</th>
                                <th scope="col">ईमेल आईडी</th>
                                <th scope="col">भूमिका</th>
                                <th scope="col">User URL</th>
                                <th scope="col">स्थिति</th>
                                <th scope="col">कार्रवाई</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $index = 1; @endphp
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $index }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="{{ $user->role }}">
                                    {{ $user->role == 1 ? 'व्यवस्थापक' : ($user->role == 2 ? 'ग्राहक' : 'अज्ञात') }}
                                </td>
                                <td>
                                    @if($user->city)
                                    {{ url($user->city->city_arr) }}/ @if($user->vcard)
                                    {{ $user->vcard['slug'] ?? '' }}
                                    @endif
                                    @endif
                                </td>
                                <td class="{{ $user->isActive? 'text-success':'text-danger' }}">{{ $user->isActive? 'अक्रिय':'सक्रिय' }}
                                </td>

                                <td class="text-right">
                                    <a href="{{ route('admin.user-edit', $user->id) }}" class="btn btn-sm btn-primary edit-user">संपादन करना
                                    </a>
                                    <form action="{{ route('admin.users-delete', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger delete-user">मिटाना</button>
                                    </form>
                                </td>
                            </tr>
                            @php $index++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection
