<x-layout.main.base>

    <style>
        .table-wrapper {
            max-height: 400px;
            /* jitni height chahiye */
            overflow-y: auto;
            /* vertical scroll */
            border: 1px solid #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            position: sticky;
            /* header fixed rahe */
            top: 0;

            z-index: 2;
        }

        .table-wrapper .table-striped thead .bg-warning .bg-warning {
            font-size: 14px;
            font-weight: 500;
        }

        .table-sec thead .bg-warning .bg-warning {
            font-size: 14px;
            font-weight: 500;
        }




        th,
        td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: center;
        }

        .firstimg .rotate-left {
            transform: rotateY(180deg);
        }
    </style>

    {{-- Back Button --}}
    <p class="text-start mt-2">
        <a href="/" class="btn btn-dark btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </p>

    <div class="text-center container">
        <h2 style="display: flex; align-items: center; justify-content: center; gap: 15px;" class="firstimg">
            <img src="{{ asset('images/langlogo.png') }}" alt="Globe" class="rotate-left"
                style="width: 50px; height: 50px;">
            <span style="font-weight: 700;">World - 178 Language Webs</span>
            <img src="{{ asset('images/langlogo.png') }}" alt="Globe" style="width: 50px; height: 50px;">
        </h2>
    </div>

    <p>There are 195 Countries in the world, and each country selects its own Official language(s). For example, India
        has 22 official languages recognized in its Constitution. These 22 languages primarily use 13 distinct scripts
        and represent 3 of the 4 writing systems of the world.
        Across the 195 Countries, there are 178 official languages in use. Of these, 148 languages do not have
        sufficient content on the World Wide Web (Source: W3Tech & Wikipedia). This is the Worldwide Digital Divide.
    </p>

    {{-- ================= DIGITAL DIVIDE ================= --}}
    <section class="text-center mt-3">
        <h4 class="text-primary fw-bold">Digital Divide Languages</h4>
        <small>
            Languages with large speaking populations but limited digital presence
        </small>
    </section>

    <section class="mt-3">
        <div class="table-wrapper">
            <table class="table table-striped table-sm table-wrapper">


                <thead>
                    <tr class="bg-warning text-dark">
                        <th class="bg-warning text-dark">Sr.</th>
                        <th class="bg-warning text-dark">Language</th>
                        <th class="bg-warning text-dark">Language Family (Spoken)</th>
                        <th class="bg-warning text-dark">Population (2021)</th>
                        <th class="bg-warning text-dark">Content on Internet (%)</th>
                        <th class="bg-warning text-dark">Content on Wikipedia (%)</th>
                        <th class="bg-warning text-dark">Scripts</th>
                        <th class="bg-warning text-dark">Language Family (Writing)</th>
                        <th class="bg-warning text-dark">Writing System</th>
                        <th class="bg-warning text-dark">No. Of Countries</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($divide as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>{{ $row['language'] }}</td>
                            <td>{{ $row['spoken_family'] }}</td>
                            <td>{{ $row['population_2021'] }}</td>
                            <td>{{ $row['internet_content'] }}</td>
                            <td>{{ $row['wikipedia_content'] }}</td>
                            <td>{{ $row['script'] }}</td>
                            <td>{{ $row['writing_family'] }}</td>
                            <td>{{ $row['writing_system'] }}</td>
                            <td>


                                <a href="javascript:void(0)" class="open-country-modal"
                                    data-lang-id="{{ $row['language_id'] }}" data-bs-toggle="modal"
                                    data-bs-target="#countryModal">
                                    {{ $row['countries_count'] }}
                                </a>



                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </section>

    {{-- ================= BALANCED LANGUAGES ================= --}}
    <section class="text-center mt-5">
        <h4 class="text-success fw-bold">Digitally Balanced Languages</h4>
        <small>
            Languages with proportional digital representation
        </small>
    </section>

    <section class="mt-3">
        <table class="table table-striped table-sec table-sm">



            <thead>
                <tr class="bg-warning text-dark">
                    <th class="bg-warning text-dark">Sr.</th>
                    <th class="bg-warning text-dark">Language</th>
                    <th class="bg-warning text-dark">Language Family (Spoken)</th>
                    <th class="bg-warning text-dark">Population (2021)</th>
                    <th class="bg-warning text-dark">Content on Internet (%)</th>
                    <th class="bg-warning text-dark">Content on Wikipedia (%)</th>
                    <th class="bg-warning text-dark">Scripts</th>
                    <th class="bg-warning text-dark">Language Family (Writing)</th>
                    <th class="bg-warning text-dark">Writing System</th>
                    <th class="bg-warning text-dark">No. Of Countries</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($balanced as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $row['language'] }}</td>
                        <td>{{ $row['family_spoken'] }}</td>
                        <td>{{ $row['population_2021'] }}</td>
                        <td>{{ $row['internet_content'] }}</td>
                        <td>{{ $row['wikipedia_content'] }}</td>
                        <td>{{ $row['script'] }}</td>
                        <td>{{ $row['writing_family'] }}</td>
                        <td>{{ $row['writing_system'] }}</td>


                        <td>
                            <a href="javascript:void(0)" class=" open-country-modal"
                                data-lang-id="{{ $row['language_id'] }}" data-bs-toggle="modal"
                                data-bs-target="#countryModal">
                                {{ $row['countries'] }}
                            </a>
                        </td>


                    </tr>
                @endforeach
            </tbody>

        </table>
    </section>

    {{-- ================= NOTES ================= --}}
    <section class="mt-4">
        <p class="small">
            <strong>Notes:</strong>
            Scripts and languages are based on Census 2011. Internet penetration values
            are estimated up to 2025 using TRAI data and growth projections.
        </p>
    </section>

    {{-- ================= MODAL ================= --}}
    <div class="modal fade" id="countryModal" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Countries</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <table class="table table-bordered table-sm text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Sr</th>
                                <th>Country Name</th>
                            </tr>
                        </thead>
                        <tbody id="countryTableBody">
                            <tr>
                                <td colspan="2">Click on language</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script>
        $(document).ready(function() {

            $(document).on('click', '.open-country-modal', function() {

                let langId = $(this).data('lang-id');
                let tbody = $('#countryTableBody');

                if (!langId) {
                    tbody.html(`
                <tr>
                    <td colspan="2" class="text-danger">
                        Language ID missing
                    </td>
                </tr>
            `);
                    return;
                }

                tbody.html(`
            <tr>
                <td colspan="2">Loading...</td>
            </tr>
        `);

                $.ajax({
                    url: "{{ url('/get-countries') }}/" + langId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        tbody.empty();

                        if (data.length === 0) {
                            tbody.html(`
                        <tr>
                            <td colspan="2" class="text-danger">
                                No countries found
                            </td>
                        </tr>
                    `);
                            return;
                        }

                        $.each(data, function(index, country) {
                            tbody.append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${country}</td>
                        </tr>
                    `);
                        });
                    },
                    error: function() {
                        tbody.html(`
                    <tr>
                        <td colspan="2" class="text-danger">
                            Server error
                        </td>
                    </tr>
                `);
                    }
                });

            });

        });
    </script>


</x-layout.main.base>
