@php
$metaData = [
'nav-heading' => view('components.nav-heading', [
'text' => 'India : Urban Cities',
'leftImg' => asset('assets/images/home/town-1.png'),
'rightImg' => asset('assets/images/home/town-1.png'),
]),
'nav-sub-heading' => '',
];
@endphp
<style>
    /* Modern Table Styling - Synchronized with India Rural */
    .modern-table {
        font-size: 13px;
        min-width: max-content;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        border-collapse: separate;
        border-spacing: 0;
    }

    .modern-table thead th {
        font-weight: 600;
        text-transform: none;
        font-size: 14px;
        letter-spacing: 0.5px;
        padding: 8px 6px;
        white-space: nowrap;
        border-bottom: 1px solid #dee2e6;
    }

    .modern-table tbody td {
        padding: 6px 6px;
        vertical-align: middle;
        font-size: 13px;
    }

    .modern-table tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }

    .modern-table {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 8px;
        height: 80vh;
        overflow-x: auto;
        overflow-y: auto;
        position: relative;
    }

    @media (max-width: 768px) {
        .modern-table {
            font-size: 11px;
        }

        .modern-table thead th {
            font-size: 9px;
            padding: 6px 3px;
        }

        .modern-table tbody td {
            padding: 6px 3px;
            font-size: 11px;
        }

        .modern-table thead th:nth-child(2),
        .modern-table tbody td:nth-child(2) {
            position: sticky;
            background-color: white;
            z-index: 5;
            left: 0px;
            box-shadow: 2px 0 4px rgba(0, 0, 0, 0.1);
        }

        .modern-table thead th:nth-child(1),
        .modern-table thead th:nth-child(2) {
            background-color: #007bff !important;
        }
    }

    .modern-table {
        height: 80vh;
        overflow-y: auto;
    }

    .modern-table thead {
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .modern-table tfoot {
        position: sticky;
        bottom: 0;
        z-index: 100;
        background-color: #f8f9fa;
    }

    .statewidth {
        width: 243px !important;
    }

    .header-blue {
        background-color: #4472c4 !important;
        color: white !important;
    }

    .bg-highlight {
        background-color: #b5c9f3 !important;
    }

    .bg-highlight-1 {
        background-color: #e5e9f1 !important;
    }

    .bg-highlight-2 {
        background-color: #d7e3fb !important;
    }

    .bg-highlight-3 {
        background-color: #d9e1f2 !important;
    }

    .bg-highlight-4 {
        background-color: #d9e1f2 !important;
    }

    .india-total-row td {
        border-top: 3px double #333 !important;
        background-color: #ffffff !important;
        font-weight: 800;
        color: #000 !important;
    }



    /* Paragraph */
    .container .mx-auto p {
        font-size: 13px;
    }

    /* Modal Styling */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(2px);
        z-index: 2000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }

    .custom-modal {
        background: white;
        width: 100%;
        max-width: 500px;
        border-radius: 8px;
        /* Slightly more rounded */
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        /* Stronger shadow */
        position: relative;
    }

    .modal-header-blue {
        background: #2563eb;
        /* bg-blue-600 */
        color: white;
        padding: 16px 20px;
        text-align: center;
        font-size: 22px;
        font-weight: 600;
        position: relative;
    }

    .close-modal-btn {
        position: absolute;
        top: 12px;
        right: 15px;
        color: white;
        font-size: 30px;
        font-weight: 300;
        cursor: pointer;
        line-height: 1;
        transition: transform 0.2s;
        z-index: 10;
    }

    .close-modal-btn:hover {
        transform: scale(1.1);
    }


    .modal-body {
        padding: 20px;
        font-size: 15px;
        color: #333;
        max-height: 85vh;
        overflow-y: auto;
    }


    .modal-section-title {
        text-decoration: underline;
        font-weight: 700;
        margin-bottom: 4px;
        display: block;
    }

    .town-list {
        margin-bottom: 20px;
        line-height: 1.4;
    }

    .modern-table tfoot td {
        position: sticky !important;
        bottom: -1 !important;
        z-index: 100 !important;
        font-weight: 700;
        background: #f8f9fa !important;
        border-top: 2px solid #dee2e6;
    }

    .modern-table thead th {
        position: sticky !important;
        top: -1px !important;
        background-color: #007bff !important;
    }

    .container .table-hori .table-responsive {
        max-height: 80vh;
    }

    /* Modal body */
    .table-hori .custom-modal .modal-body {
        padding-left: 12px;
        padding-right: 19px;
        padding-top: 9px;
    }

    /* Statewidth */
    .table-striped .statewidth {
        color: #ffffff;
    }

    /* Text center */
    .table-striped .bg-primary .text-center {
        color: #ffffff;
    }

    @media (min-width:769px) {

        /* Text center */
        .table-striped .bg-primary .text-center {
            font-size: 13px;
        }

    }

    /* Tabular nums */
    .text-slate-600 tr .tabular-nums {
        font-weight: 400;
    }

    /* Cursor pointer */
    .text-slate-600 tr .cursor-pointer {
        font-weight: 600;
        color: #0876ec;
    }
</style>
<style>
    /* Modal content */
    #modalContent {
        padding-right: 21px;
        padding-left: 23px;
        margin-bottom: 40px;
    }

    /* Modal header */
    #modalHeader {
        font-size: 16px;
        margin-bottom: 2px;
        /* transform: translatex(0px) translatey(0px); */
        margin-top: 12px;
    }

    /* Span Tag */
    .custom-modal span {
        top: 7px;
        bottom: auto !important;
        left: 471px;
        right: auto !important;
    }

    /* Paragraph */
    #modalContent p {
        font-size: 12px;
        margin-bottom: 10px !important;
        margin-top: 10px;
    }

    /* Border white */
    .modern-table .border-white {
        color: #ffffff;
    }

    /* Border white */
    .modern-table .header-blue:nth-child(1) .border-white:nth-child(3) {
        background-color: #0c1ae8 !important;
    }

    /* Border white */
    .modern-table .header-blue:nth-child(2) .border-white:nth-child(1),
    .modern-table .header-blue:nth-child(2) .border-white:nth-child(2),
    .modern-table .header-blue:nth-child(2) .border-white:nth-child(3),
    .modern-table .header-blue:nth-child(2) .border-white:nth-child(4) {
        background-color: #0c1ae8 !important;
    }

    /* Cursor pointer */
    .text-slate-600 tr .cursor-pointer {
        font-weight: 700;
        color: #076df2 !important;
    }

    /* Text center */
    .modern-table .bg-white .text-center {
        font-weight: 500;
        font-size: 14px;
    }

    /* Highlight */
    .modern-table .bg-highlight:nth-child(5) {
        font-weight: 700;
    }

    /* Highlight */
    .modern-table .bg-highlight:nth-child(8) {
        font-weight: 400;
    }

    /* Highlight */
    .modern-table .bg-highlight:nth-child(11) {
        font-weight: 700;
    }

    /* Font bold */
    .modern-table .bg-white .font-bold {
        font-weight: 700;
    }


    @media (min-width:769px) {

        /* Cursor pointer */
        .text-slate-600 tr .cursor-pointer {
            font-size: 14px;
        }

    }

    /* Table responsive */
    .container .table-responsive {
        max-height: 85vh;
    }

    @media (max-width:576px) {

        /* Table responsive */
        .container .table-responsive {
            overflow: scroll;
            max-height: 95vh;
        }



        /* Border white */
        .modern-table .header-blue:nth-child(1) .border-white:nth-child(2) {
            width: 135px !important;
            /* transform: translatex(0px) translatey(0px); */
            z-index: 7;
        }

    }

    /* Border white */
    .modern-table .header-blue:nth-child(1) .border-white:nth-child(2) {
        width: 178px !important;
    }

    /* Auto */
    .container .mx-auto {
        padding-top: 0px;
        padding-left: 0px !important;
        margin-left: 0px !important;
        padding-right: 0px !important;
    }

    .text-slate-600 tr .tabular-nums:nth-child(11) {
        font-weight: 400;
    }

    /* Highlight */
    .modern-table .bg-white .bg-highlight:nth-child(11) {
        font-weight: 400;
    }

    /* Text center */
    .modern-table .bg-white .text-center:nth-child(10) {
        font-weight: 700;
    }

    /* Modal header */
    #modalHeader {
        text-align: left;
        font-size: 13px;
    }

    /* Span Tag */
    #modalHeader span {
        font-size: 16px;
    }

    /* List Item */
    .container .list-disc li {
        font-size: 12px;
    }

    /* Bold Tag */
    .container .leading-relaxed b {
        font-size: 12px;
    }
</style>

<x-layout.main.base :metaData="$metaData">
    <section class="max-w-7xl mx-auto px-4 pt-8">
        <div class="space-y-4 text-slate-700 leading-relaxed text-[14px]">
            <p>
                India had <b>7,933</b> cities (4,401 Statutory Towns & 3,892 Census Towns) across <b>640</b> Districts
                in 2011. While India's country size remains the same, the total number of districts has increased to
                <b>766+</b>.
            </p>
            <p>
                Of these towns, <b>709</b> are District and State Capitals (2 State Capitals that are not District
                Capitals – Bhubaneswar (Odisha) and Amaravati (Andhra Pradesh). However, <b>100</b> new capitals were
                either
                classified as villages or not covered as towns in the Census 2011, and hence are absent from the town
                list.
            </p>
        </div>
    </section>


    <div class="table-responsive">
        <table class="table table-sm table-hover table-bordered modern-table">
            <thead class="sticky top-0">
                <tr class="header-blue">
                    <th rowspan="3" class="text-center align-middle border-white">#</th>
                    <th class="statewidth text-center align-middle border-white" rowspan="3">State / UT Name</th>
                    <th colspan="4" class="text-center border-white">Census 2011</th>
                    <th colspan="10" class="text-center border-white">2026</th>
                </tr>
                <tr class="header-blue">
                    <th rowspan="2" class="text-center align-middle border-white">Districts</th>
                    <th rowspan="2" class="text-center align-middle border-white">Cities</th>
                    <th rowspan="2" class="text-center align-middle border-white">UAs</th>
                    <th rowspan="2" class="text-center align-middle border-white">UA Cities</th>
                    <th rowspan="2" class="text-center align-middle border-white">Districts</th>
                    <th colspan="4" class="text-center border-white">Cities</th>
                    <th colspan="2" class="text-center border-white">Urban Agglomeration</th>
                    <th rowspan="2" class="text-center align-middle border-white">New Capitals <br>from Census<br> 2011
                        Villages</th>
                    <th rowspan="2" class="text-center align-middle border-white">M. Corp.</th>
                    <th rowspan="2" class="text-center align-middle border-white">Smart <br> Cities</th>
                </tr>
                <tr class="header-blue text-[11px]">
                    <th class="text-center border-white">Capitals</th>
                    <th class="text-center border-white">UA Cities</th>
                    <th class="text-center border-white">Others</th>
                    <th class="text-center border-white">Total</th>
                    <th class="text-center border-white">UA Capitals</th>
                    <th class="text-center border-white">UA Others</th>
                </tr>
            </thead>

            <tbody class="text-slate-600">

                @foreach(config('data.town.main') as $index => $row)
                <tr>
                    <td class="text-center text-black font-semibold">{{ $index + 1 }}</td>
                    <td class="font-bold text-black">{{ $row['name'] }}</td>
                    <td class="text-center tabular-nums text-black bg-highlight-1">{{ $row['r1'] }}</td>
                    <td class="text-center tabular-nums text-black bg-highlight-2">{{ $row['r2'] }}</td>
                    <td class="text-center tabular-nums text-black">{{ $row['r3'] }}</td>
                    <td class="text-center tabular-nums text-black bg-highlight font-semibold">{{ $row['r4'] }}</td>
                    <td class="text-center tabular-nums text-black bg-highlight-3">{{ $row['r5'] }}</td>
                    <td class="text-center tabular-nums text-black">{{ $row['r6'] }}</td>
                    <td class="text-center tabular-nums text-black bg-highlight font-semibold">{{ $row['r7'] }}</td>
                    <td class="text-center tabular-nums text-black">{{ $row['r8'] }}</td>
                    <td class="text-center tabular-nums text-black bg-highlight">{{ $row['r9'] }}</td>
                    <td class="text-center tabular-nums text-black font-light">{{ $row['r10'] }}</td>
                    <td class="text-center tabular-nums text-black">{{ $row['r11'] }}</td>
                    <td class="text-center tabular-nums font-bold text-black {{ $row['r12'] !== '-' ? 'cursor-pointer' : '' }}"
                        @if($row['r12'] !=='-' )
                        onclick="showTownModal('newvillage', '{{ $row['code'] }}', '{{ $row['name'] }}')" @endif>{{
                        $row['r12'] }}</td>
                    <td class="text-center tabular-nums font-bold text-black {{ $row['r13'] !== '-' ? 'cursor-pointer' : '' }}"
                        @if($row['r13'] !=='-' )
                        onclick="showTownModal('mpc', '{{ $row['code'] }}', '{{ $row['name'] }}')" @endif>{{ $row['r13']
                        }}</td>
                    <td class="text-center tabular-nums font-bold text-black {{ $row['r14'] !== '-' ? 'cursor-pointer' : '' }}"
                        @if($row['r14'] !=='-' )
                        onclick="showTownModal('smartcity', '{{ $row['code'] }}', '{{ $row['name'] }}')" @endif>{{
                        $row['r14'] }}</td>
                </tr>
                @endforeach

            </tbody>
            <tfoot class="sticky bottom-0 bg-white">
                <tr class="india-total-row text-black">
                    <td colspan="2" class="text-center font-bold">INDIA TOTAL</td>
                    <td class="text-center">640</td>
                    <td class="text-center">7,933</td>
                    <td class="text-center">298</td>
                    <td class="text-center bg-highlight">1,947</td>
                    <td class="text-center">766</td>
                    <td class="text-center">469</td>
                    <td class="text-center bg-highlight">1,951</td>
                    <td class="text-center">5,514</td>
                    <td class="text-center">7,935</td>
                    <td class="text-center bg-highlight">240</td>
                    <td class="text-center">61</td>
                    <td class="text-center">44</td>
                    <td class="text-center">278</td>
                    <td class="text-center">100</td>
                </tr>
            </tfoot>

        </table>
    </div>
    <div class="text-[12px] text-slate-600 leading-relaxed">
        <b>Note:</b>
        <ul class="list-disc">
            <li class="text-[12px]">Dadra & Nagar Haveli and Daman & Diu were separate UTs in 2011 and have been
                combined here for
                consistency.</li>
            <li>2 additional cities were estimated for 2026 – Waidhan and Hanamkonda.</li>
        </ul>
    </div>


    </section>

    <!-- Modal -->
    <div id="townModal" class="modal-overlay" style="display: none;" onclick="closeModal(event)">
        <div class="custom-modal" onclick="event.stopPropagation()">
            <div class="modal-header-blue">
                <span class="close-modal-btn" onclick="closeModal()">&times;</span>
                <div id="modalHeader">
                    <!-- Title will be injected here -->
                </div>
            </div>
            <div class="modal-body">
                <div id="modalContent">
                    <!-- Content will be injected here -->
                </div>
            </div>
        </div>
    </div>


    <script>
        const newVillages = @json($newVIllages);
        const mpcData = @json($MPC);
        const smartCities = @json($smartCities);

        function showTownModal(type, stateCode, stateName) {
            let title = '';
            let content = '';
            let data = [];

            if (type === 'newvillage') {
                title = `New Capitals from Census 2011 Villages<br><span>${stateName}</span>`;
                data = newVillages[stateCode] || [];
                content = `
                    <p class="mb-3 text-[14px]">These District and State Capitals were not in Census 2011 Town Lists</p>
                    <table class="table table-sm table-bordered">
                        <thead class="bg-[#2563eb] text-white">
                            <tr>
                                <th class="text-center">#</th>
                                <th>District</th>
                                <th>Capital</th>
                            </tr>
                        </thead>

                        <tbody>
                            ${data.map((item, index) => `
                                <tr>
                                    <td class="text-center">${index + 1}</td>
                                    <td>${item.District_Name}</td>
                                    <td>${item.Name}</td>
                                </tr>
                            `).join('') || '<tr><td colspan="3" class="text-center">No data found</td></tr>'}
                        </tbody>
                    </table>
                `;
            } else if (type === 'mpc') {
                title = `Municipal Corporations<br><span>${stateName}</span>`;
                data = mpcData[stateCode] || [];

                // Group by district to avoid duplicate district rows
                const grouped = {};
                data.forEach(item => {
                    const dist = item.District_Name;
                    if (!grouped[dist]) grouped[dist] = [];
                    for (let i = 1; i <= 6; i++) {
                        const name = item[`M._Corp._Name_${i}`];
                        const link = item[`M._Corp._Link_${i}`];
                        if (name) {
                            grouped[dist].push({ name, link: link ? link.replace('=>', ':') : '#' });
                        }
                    }
                });

                content = `
                    <table class="table table-sm table-bordered">
                        <thead class="bg-[#2563eb] text-white">
                            <tr>
                                <th class="text-center">#</th>
                                <th>District</th>
                                <th>Municipal Corporations</th>
                            </tr>
                        </thead>

                        <tbody>
                            ${Object.keys(grouped).map((dist, index) => `
                                <tr>
                                    <td class="text-center">${index + 1}</td>
                                    <td>${dist}</td>
                                    <td>${grouped[dist].map(m => `<a href="${m.link}" target="_blank" class="text-blue-600 block underline hover:text-blue-800">${m.name}</a>`).join('')}</td>
                                </tr>
                            `).join('') || '<tr><td colspan="3" class="text-center">No data found</td></tr>'}
                        </tbody>
                    </table>
                `;
            } else if (type === 'smartcity') {
                title = `Cities Under Smart Cities Mission<br><span>${stateName}</span>`;
                data = smartCities[stateCode] || [];
                content = `
                    <table class="table table-sm table-bordered">
                        <thead class="bg-[#2563eb] text-white">
                            <tr>
                                <th class="text-center">#</th>
                                <th>District</th>
                                <th>Smart City</th>
                            </tr>
                        </thead>

                        <tbody>
                            ${data.map((item, index) => `
                                <tr>
                                    <td class="text-center">${index + 1}</td>
                                    <td>${item.District_Name}</td>
                                    <td>${item.Smart_City}</td>
                                </tr>
                            `).join('') || '<tr><td colspan="3" class="text-center">No data found</td></tr>'}
                        </tbody>
                    </table>
                `;
            }

            document.getElementById('modalHeader').innerHTML = title;
            document.getElementById('modalContent').innerHTML = content;
            document.getElementById('townModal').style.display = 'flex';
        }

        function closeModal(event) {
            document.getElementById('townModal').style.display = 'none';
        }

        // Close modal on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });
    </script>
</x-layout.main.base>
