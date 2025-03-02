<div class="row g-4">
    <style>
.card-body .position-absolute label{
 text-shadow:rgb(255, 255, 255) 0px 1px 1px, rgb(255, 255, 255) 0px -1px 1px, rgb(255, 255, 255) 1px 0px 1px, rgb(255, 255, 255) -1px 0px 1px;
}


    </style>
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="border-0 card">
            <div class="card-body">
                <div class="container mt-3">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                    <form wire:submit.prevent="submit" enctype="multipart/form-data">
                        <div class="p-3 text-center rounded position-relative" style="background-color: {{ $color_code }}">
                            <div class="top-0 m-2 position-absolute start-0">
                                <label for="color_value" class="form-label">रंग चुनें *</label>
                                <input type="color" id="color_value" class="form-control form-control-color" wire:change="updatefield('color_value')" wire:model.bounce.500ms="color_code">
                                @error('color_code')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <label for="profile-upload" class="position-relative d-inline-block">
                                <img id="ddimg" src="{{ $profile ? Storage::url($profile) : 'https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg' }}" class="border shadow-sm rounded-circle" style="width: 120px; height: 120px; object-fit: cover;" alt="Profile">
                                <span class="bottom-0 p-1 text-white position-absolute end-0 bg-primary rounded-circle">
                                    <i class="fas fa-camera" wire:loading.remove wire:target="photo"></i>
                                    <i class="fas fa-spinner fa-spin" wire:loading wire:target="photo"></i>
                                </span>
                            </label>
                            <input type="file" id="profile-upload" class="d-none" wire:model="photo">
                        </div>

                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">आपका तस्वीर *</label>
                                <input class="form-control" type="file" id="" class="" wire:model="photo">
                                @error('photo')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>


                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">नाम *</label>
                                <input type="text" class="form-control" placeholder="अपना नाम दर्ज करें" wire:change="updatefield('name')" wire:model.debounce.500ms="name">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">उपनाम</label>
                                <input type="text" class="form-control" wire:change="updatefield('surname')" placeholder="अपना उपनाम दर्ज करें" wire:model.debounce.500ms="surname">
                                @error('surname')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">श्रेणी *</label>
                                <select class="form-select" wire:change="updatefield('category_id')" wire:model="category_id">
                                    <option value="">श्रेणी चुनें</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">प्रारंग शहर *</label>
                                <select class="form-select" wire:change="updatefield('city_id')" wire:model="city_id">
                                    <option value="">प्रारंग शहर चुनें</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">घर नंबर *</label>
                                <input type="text" class="form-control"  placeholder="अपना घर नंबर दर्ज करें" wire:change="updatefield('house_number')" wire:model="house_number">
                                @error('house_number')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">सड़क/गली *</label>
                                <input type="text" class="form-control" placeholder="सड़क/गली का नाम" wire:change="updatefield('road_street')" wire:model="road_street">
                                @error('road_street')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-12">
                                <label class="form-label">पता</label>
                                <textarea type="text" class="form-control" placeholder="क्षेत्र का नाम दर्ज करें" wire:change="updatefield('area_name')" wire:model="area_name"></textarea>
                                @error('area_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">आपका शहर *</label>
                                <input type="text" class="form-control" placeholder="अपना शहर दर्ज करें" wire:change="updatefield('cityname')" wire:model="cityname">
                                @error('cityname')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">पिनकोड</label>
                                <input type="text" class="form-control" wire:change="updatefield('pincode')" placeholder="पिनकोड दर्ज करें" wire:model="pincode">
                                @error('pincode')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">जन्म तिथि</label>
                                <input type="date" class="form-control" wire:change="updatefield('dob')" wire:model="dob">
                                @error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ईमेल </label>
                                <input type="email" class="form-control" placeholder="आपका ईमेल" wire:change="updatefield('email')"   wire:model="email">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary w-100">
                            <span wire:loading.remove wire:target="submit">सबमिट करें</span>
                            <span wire:loading wire:target="submit">
                                <i class="fas fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>
