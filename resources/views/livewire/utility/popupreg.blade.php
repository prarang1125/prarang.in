<div wire:ignore.self class="modal fade" id="popupregister" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form wire:submit.prevent="{{ $step === 1 ? 'nextStep' : 'register' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">
                        Create an account to continue..
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="fw-bold"> {{ $step === 1 ? 'Account Info' : 'Profile Details' }}</p>
                    @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    {{-- Step 1 --}}
                    @if ($step === 1)
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" wire:model="email" class="form-control">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" wire:model="password" class="form-control">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    @endif

                    {{-- Step 2 --}}
                    @if ($step === 2)
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" wire:model="first_name" class="form-control">
                        @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" wire:model="last_name" class="form-control">
                        @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Country</label>
                        <select wire:model="country" class="form-control">
                            <option value="">Select Country</option>

                            <optgroup label="Asia">
                                <option value="India">India</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Japan">Japan</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="South Korea">South Korea</option>
                                <option value="Oman">Oman</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                            </optgroup>

                            <optgroup label="Europe">
                                <option value="Austria">Austria</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="Greece">Greece</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Italy">Italy</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="North Macedonia">North Macedonia</option>
                                <option value="Norway">Norway</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Romania">Romania</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Spain">Spain</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Vatican">Vatican</option>
                            </optgroup>
                            <optgroup label="Africa">
                                <option value="Egypt">Egypt</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Ivory Coast">Ivory Coast</option>
                                <option value="Tanzania">Tanzania</option>
                            </optgroup>

                            <optgroup label="North America">
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                            </optgroup>

                            <optgroup label="South America">
                                <option value="Argentina">Argentina</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Suriname">Suriname</option>
                            </optgroup>

                            <optgroup label="Central America & Caribbean">
                                <option value="Antigua">Antigua</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Saint Kitts">Saint Kitts</option>
                                <option value="Saint Vincent">Saint Vincent</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                            </optgroup>

                            <optgroup label="South East Asia & Oceania">
                                <option value="Australia">Australia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Hongkong">Hongkong</option>
                            </optgroup>

                        </select>
                        @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <!-- <label>Occupation</label> -->
                        <input type="hidden" wire:model="occupation" class="form-control" value="Other">
                        @error('occupation') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Intrest</label>
                        <select wire:model="purpose" class="form-select">
                            <option value="">-- Select --</option>
                            <option value="internet">Internet</option>
                            <option value="nature">Nature</option>
                            <option value="culture">Culture</option>
                            <option value="demography">Demography</option>
                            <option value="language">Language</option>
                            <option value="wealth">Wealth</option>
                            <option value="governance">Governance</option>
                            <option value="work">Work</option>
                            <option value="health">Health</option>
                            <option value="education">Education</option>
                            <option value="media">Media</option>
                            <option value="urbanization">Urbanization</option>
                        </select>
                        @error('purpose') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    @endif
                </div>

                <div class="modal-footer">
                    @if ($step === 1)
                    <button type="submit" class="btn btn-primary" wire:target="nextStep" wire:loading.attr="disabled">
                        <span wire:loading.class.remove="d-none" class="spinner-border spinner-border-sm d-none"></span>
                        Next
                    </button>
                    @else
                    <button type="submit" class="btn btn-success" wire:target="register" wire:loading.attr="disabled">
                        <span wire:loading.class.remove="d-none" class="spinner-border spinner-border-sm d-none"></span>
                        Complete Registration
                    </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
