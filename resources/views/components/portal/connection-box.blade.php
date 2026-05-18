<div>
    <style>
        /* Text */
        #socialMediaPostsModal .modal-body p.text-sm {
            font-size: 16px !important;
        }
    </style>
    <div class="flex justify-center items-stretch gap-6 my-4">

        <!-- Box 1 -->
        <div
            class="text-center w-1/2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden pt-6 flex flex-col justify-between">
            <h2 class="text-xl font-extrabold text-slate-800 mb-6">Connections</h2>

            <button data-bs-toggle="modal" data-bs-target="#socialMediaPostsModal"
                class="btn btn-primary mx-4 mb-4 mt-auto fw-bold py-2 px-4 shadow-sm" style="border-radius: 8px;">
                Social Media Posts
            </button>

            <!-- Social Media Posts Modal -->
            <div class="modal fade text-start" id="socialMediaPostsModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded shadow-lg ">
                        <div class="modal-header border-0 pb-0 mb-1">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-4 pb-4 pt-2 border-t ">
                            <p class="text-dark fs-5 mb-4 text-lg">
                                Thank you for your interest. The Social Media Posts for this Two-Country Bilateral
                                Connections, this is awaited for a Partnership. </p>
                            <div class="d-flex justify-center align-items-center gap-3 mt-3">
                                <a href="https://www.prarang.in/partners" target="_blank"
                                    class="btn text-white text-sm px-3 py-1 shadow-sm bg-blue-500 hover:bg-blue-600 hover:text-white">
                                    Prarang Country Partnerships
                                </a>
                                <a href="https://www.indiaczech.com/india-czech-republic/all-posts" target="_blank"
                                    class="btn text-white text-sm px-3 py-1 shadow-sm bg-blue-500 hover:bg-blue-600 hover:text-white">
                                    Example- {{ $primary->country_name }} {{ $secondary->country_name }} Connections
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Box 2 -->
        <div
            class="text-justify w-1/2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden p-2 flex flex-col justify-between">
            {{ $main->connections ?? ""}}
        </div>

    </div>
</div>
