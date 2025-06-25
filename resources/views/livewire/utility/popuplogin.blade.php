<div wire:ignore.self class="modal fade" id="popuplogin" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form wire:submit.prevent="login">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Register </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" wire:target="login" wire:loading.attr="disabled" wire:loading.class="btn-loading">
                        <span wire:loading.class.remove="d-none" class="spinner-border spinner-border-sm d-none"></span>
                        Login
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal Auto Open on Page Load --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const loginModal = new bootstrap.Modal(document.getElementById('popuplogin'));
        loginModal.show();

        window.addEventListener('close-login-modal', () => {
            loginModal.hide();
        });
    });
</script>