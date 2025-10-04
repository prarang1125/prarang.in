@include('yellowpages::layout.partial.head')

@section('title', 'Login')
<div class="d-flex align-items-center min-vh-100 login_background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card border-top border-0 border-4 border-dark" style="margin: 20px">
                    <div class="card-body p-4">
                        <div class="card-title text-center">
                            <i class="bx bxs-user-circle text-dark font-50"></i>
                            <h5 class="mb-5 mt-2 text-dark">व्यवस्थापक लॉगिन</h5>
                        </div>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <hr>
                        <form class="row g-3" action="{{ route('admin.authenticate') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="inputLastEnterEmail" class="form-label">ईमेल दर्ज करें</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                                    <input type="text" value="{{ old('email') }}" name="email" class="form-control border-start-1 @error('email') is-invalid @enderror" id="inputLastEnterEmail" placeholder="ईमेल दर्ज करें">

                                    @error('email')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="inputLastEnterPassword" class="form-label">पास वर्ड दर्ज करें</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-transparent"><i class="bx bxs-lock-open"></i></span>
                                    <input type="password" name="password" class="form-control border-start-1 @error('password') is-invalid @enderror" id="inputLastEnterPassword" placeholder="पास वर्ड दर्ज करें">
                                    @error('password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <label for="inputLanguage" class="form-label">भाषा चुने</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-transparent"><i class="bx bx-search"></i></span>
                                    <select class="single-select form-control border-start-1 border-end-1 @error('language') is-invalid @enderror" id="languageSelect" name="language">
                                        <option value="">डिफ़ॉल्ट भाषा </option>
                                        <option value="english">अंग्रेज़ी</option>
                                        <option value="hindi">हिंदी</option>
                                    </select>
                                    @error('language')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark btn-lg px-5"><i class="bx bxs-lock-open"></i> लॉग इन करें</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('yellowpages::layout.partial.script')


