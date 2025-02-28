<div class="row g-4">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="mb-4">वेबपेज (Webpage) सूचना</h5>
                <div class="container mt-3">
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="submit" enctype="multipart/form-data">
                            <div class="position-relative text-center p-3 rounded" style="background: {{ $color_code }};">    
                                <!-- Color Picker - Top Left Position -->
                                <div class="position-absolute top-0 start-0 m-2">
                                    <input type="color" id="color_value" class="form-control form-control-color" 
                                           wire:change="updatefield('color_value')"  
                                           wire:model.bounce.500ms="color_code">
                                    @error('color_value') 
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>                            
                                <!-- Profile Image - Center Position -->
                                <label for="profile-upload" class="position-relative d-inline-block">
                                    <img id="ddimg" 
                                    src="{{ $profile ? Storage::url($profile) : 'https://via.placeholder.com/150' }}" 
                                    class="rounded-circle border shadow-sm" 
                                    style="width: 120px; height: 120px; object-fit: cover;" 
                                    alt="Profile">
                            
                                    <!-- Camera Icon with Loader -->
                                    <span class="position-absolute bottom-0 end-0 bg-primary text-white p-1 rounded-circle">
                                        <i class="fas fa-camera" wire:loading.remove wire:target="photo"></i>
                                        <i class="fas fa-spinner fa-spin" wire:loading wire:target="photo"></i>
                                    </span>
                                </label>
                            
                                <!-- Hidden File Input -->
                                <input type="file" id="profile-upload" class="d-none" wire:model="photo">  
                            
                            </div>
                            
                            
                            
                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                           
                           
                            <br>
                            

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">नाम</label>
                                    <input type="text" class="form-control" wire:change="updatefield('name')" wire:model.debounce.500ms="name">
                                  
                                    @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">उपनाम</label>
                                    <input type="text" class="form-control" wire:change="updatefield('surname')" wire:model.debounce.500ms="surname">
                                    @error('surname')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">श्रेणी</label>
                                    <select class="form-select" wire:change="updatefield('category_id')" wire:model="category_id">
                                        <option value="">श्रेणी चुनें</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">शहर</label>
                                    <select class="form-select" wire:change="updatefield('city_id')"  wire:model="city_id">
                                        <option value="">शहर चुनें</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">घर नंबर</label>
                                    <input type="text" class="form-control" wire:change="updatefield('house_number')"  wire:model="house_number">
                                    @error('house_number')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">सड़क/गली</label>
                                    <input type="text" class="form-control" wire:change="updatefield('road_street')" wire:model="road_street">
                                    @error('road_street')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">क्षेत्र का नाम</label>
                                    <input type="text" class="form-control" wire:change="updatefield('area_name')" wire:model="area_name">
                                    @error('area_name')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">पिनकोड</label>
                                    <input type="text" class="form-control" wire:change="updatefield('pincode')" wire:model="pincode">
                                    @error('pincode')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">जन्म तिथि</label>
                                    <input type="date" class="form-control" wire:change="updatefield('dob')" wire:model="dob">
                                    @error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">ईमेल</label>
                                    <input type="email" class="form-control" wire:change="updatefield('email')" wire:model="email"> 
                                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div>
                             
                           
                               
                                @foreach($dynamicFields as $index => $field)
                                    <div class="d-flex align-items-center mt-2">
                                        <select class="form-control me-2" wire:model="dynamicFields.{{ $index }}.id">
                                            <option value="">Select ID</option>
                                            @foreach($options as $option)
                                                <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
                                            @endforeach
                                        </select>
                            
                                        <input type="text" class="form-control me-2" wire:model="dynamicFields.{{ $index }}.value" placeholder="Enter Value">
                            
                                        <button type="button" class="btn btn-danger"
                                        wire:loading.attr="disabled"
                                        wire:target="removeField"
                                        wire:click="removeField({{ $index }})">X</button>
                                    </div>
                                @endforeach
                                    <p class="text-end">
                                        <button type="button" class="btn btn-sm mb-2 btn-primary mt-2" 
                                        wire:loading.attr="disabled" 
                                        wire:target="addField" 
                                        wire:click="addField">
                                        <span wire:loading.remove wire:target="addField">+ अन्य फ़ील्ड जोड़ें</span>
                                        <span wire:loading wire:target="addField">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </span>
                                    </button>
                                    </p>
                            </div>
                            
                            <button style="background: {{ $color_code }};" type="submit" class="btn  w-100
                            wire:loading.attr="disabled" 
                            wire:target="submit" 
                            wire:click="submit">
                            <span wire:loading.remove wire:target="submit">+ सबमिट करें </span>
                            <span wire:loading wire:target="submit">
                                <i class="fas fa-spinner fa-spin"></i>
                            </span>

                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>

  
    
</div>
