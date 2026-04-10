@php
$metaData = [
'nav-heading' => view('components.nav-heading', [
'text' => 'India : Urban - 7,933 Cities',
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

    @media (max-width: 576px) {
        .statewidth {
            width: 100px !important;
        }
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
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .modal-header-blue {
        background: #5b9bd5;
        color: white;
        padding: 12px 20px;
        text-align: center;
        font-size: 24px;
        font-weight: 500;
    }

    .modal-body {
        padding: 20px;
        font-size: 15px;
        color: #333;
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
<x-layout.main.base :metaData="$metaData">
    <section class="max-w-7xl mx-auto px-4 pt-8">
        <div class="space-y-4 text-slate-700 leading-relaxed text-[14px]">
            <p>
                India had <b>7,933</b> cities (4,401 Statutory Towns & 3,892 Census Towns) across <b>640</b> Districts
                in 2011. While India's country size remains the same, the total number of districts has increased to
                <b>766+</b>.
            </p>
            <p>
                Of these towns, <b>695</b> are District and State Capitals (2 State Capitals that are not District
                Capitals – Bhubaneswar (Odisha) and Amaravati (Andhra Pradesh). However, <b>72</b> new capitals were
                either
                classified as villages or not covered as towns in the Census 2011, and hence are absent from the town
                list.
            </p>
        </div>
    </section>

    <section class="mt-8 table-hori max-w-7xl mx-auto px-4 pb-12" x-data="{
        isOpen: false,
        selectedState: '',
        villages: [],
        newTowns: [],
        townsData: {
            {{-- '28': { villages: ['Paderu', 'Puttaparthi'], newTowns: ['Rajamahendravaram','Amaravati'] },
            '12': { villages: ['Raga', 'Palin', 'Likabali', 'Teto'], newTowns: ['Lemmi', 'Yupia'] },
            '18': { villages: ['Mushalpur', 'Kajalgaon', 'Garamur', 'Hatsingimari'], newTowns: ['Tamulpur'] },
            '02': { villages: ['Reckong Peo', 'Keylong'], newTowns: [] },
            '29': { villages: ['Dharwad'], newTowns: ['Bengaluru', 'Kalaburagi'] },
            '27': { villages: ['Dharashiv'], newTowns: ['Bandra (East)', 'Oros'] },
            '14': { villages: ['Noney (Longmai)', 'Pherzawl', 'Senapati', 'Tengnoupal'], newTowns: ['Chandel', 'Churachandpur', 'Lamphelpat', 'Kamjong', 'Kangpokpi'] },
            '17': { villages: ['Mawkyrwat'], newTowns: ['Khliehriat', 'Mairang', 'Resubelpara', 'Ampati'] },
            '13': { villages: ['Niuland', 'Noklak', 'Shamator'], newTowns: [] },
            '07': { villages: ['Saket'], newTowns: ['Daryaganj', 'Preet Vihar', 'Connaught Place', 'Sadar Bazar', 'Seelampur', 'Nand Nagri', 'Defence Colony', 'Vasant Vihar', 'Rajouri Garden'] },
            '21': { villages: ['Panikoili'], newTowns: ['Nuapada'] },
            '11': { villages: ['Soreng', 'Gyalshing'], newTowns: ['Pakyong'] },
            '33': { villages: ['Kanchipuram'], newTowns: [] },
            '36': { villages: ['Shamirpet', 'Mulugu'], newTowns: ['Hanamkonda', 'Hyderabad'] },
            '09': { villages: ['Gauriganj'], newTowns: ['Shravasti'] },
            '35': { villages: ['Mayabunder'], newTowns: ['Car Nicobar'] },
            '22': { villages: [], newTowns: ['Mohla'] },
            '24': { villages: [], newTowns: ['Dahod', 'Mehsana'] },
            '06': { villages: [], newTowns: ['Kurukshetra'] },
            '32': { villages: [], newTowns: ['Painavu'] },
            '23': { villages: [], newTowns: ['Waidhan'] },
            '15': { villages: [], newTowns: ['Khawzawl'] },
            '16': { villages: [], newTowns: ['Bishramganj'] } --}}
            '28': { villages: ['Paderu (Alluri Sitharama Raju)', 'Puttaparthi (Sri Sathya Sai)'], newTowns: ['Rajamahendravaram (East Godavari)','Amaravati (Guntur)'] },

'12': { villages: ['Raga (Kamle)', 'Palin (Kra Daadi)', 'Likabali (Lower Siang)', 'Teto (Shi Yomi)'], newTowns: ['Lemmi (Pakke-Kessang)', 'Yupia (Papum Pare)'] },

'18': { villages: ['Mushalpur (Baksa)', 'Kajalgaon (Chirang)', 'Garamur (Majuli)', 'Hatsingimari (South Salmara-Mankachar)'], newTowns: ['Tamulpur (Tamulpur)'] },

'02': { villages: ['Reckong Peo (Kinnaur)', 'Keylong (Lahaul and Spiti)'], newTowns: [] },

'29': { villages: ['Dharwad (Dharwad)'], newTowns: ['Bengaluru (Bengaluru Urban)', 'Kalaburagi (Kalaburagi)'] },

'27': { villages: ['Dharashiv (Dharashiv)'], newTowns: ['Bandra (East) (Mumbai Suburban)', 'Oros (Sindhudurg)'] },

'14': { villages: ['Noney (Longmai) (Noney)', 'Pherzawl (Pherzawl)', 'Senapati (Senapati)', 'Tengnoupal (Tengnoupal)'], newTowns: ['Chandel (Chandel)', 'Churachandpur (Churachandpur)', 'Lamphelpat (Imphal West)', 'Kamjong (Kamjong)', 'Kangpokpi (Kangpokpi)'] },

'17': { villages: ['Mawkyrwat (South West Khasi Hills)'], newTowns: ['Khliehriat (East Jaintia Hills)', 'Mairang (Eastern West Khasi Hills)', 'Resubelpara (North Garo Hills)', 'Ampati (South West Garo Hills)'] },

'13': { villages: ['Niuland (Niuland)', 'Noklak (Noklak)', 'Shamator (Shamator)'], newTowns: [] },

'07': { villages: ['Saket (South Delhi)'], newTowns: ['Daryaganj (Central Delhi)', 'Preet Vihar (East Delhi)', 'Connaught Place (New Delhi)', 'Sadar Bazar (North Delhi)', 'Seelampur (North East Delhi)', 'Nand Nagri (North East Delhi)', 'Defence Colony (South East Delhi)', 'Vasant Vihar (South West Delhi)', 'Rajouri Garden (West Delhi)'] },

'21': { villages: ['Panikoili (Jajpur)'], newTowns: ['Nuapada (Nuapada)'] },

'11': { villages: ['Soreng (Soreng)', 'Gyalshing (Gyalshing)'], newTowns: ['Pakyong (Pakyong)'] },

'33': { villages: ['Kanchipuram (Kanchipuram)'], newTowns: [] },

'36': { villages: ['Shamirpet (Medchal–Malkajgiri)', 'Mulugu (Mulugu)'], newTowns: ['Hanamkonda (Hanamkonda)', 'Hyderabad (Hyderabad)'] },

'09': { villages: ['Gauriganj (Amethi)'], newTowns: ['Shravasti (Shravasti)'] },

'35': { villages: ['Mayabunder (North and Middle Andaman)'], newTowns: ['Car Nicobar (Nicobar)'] },

'22': { villages: [], newTowns: ['Mohla (Mohla-Manpur-Ambagarh Chowki)'] },

'24': { villages: [], newTowns: ['Dahod (Dahod)', 'Mehsana (Mehsana)'] },

'06': { villages: [], newTowns: ['Kurukshetra (Kurukshetra)'] },

'32': { villages: [], newTowns: ['Painavu (Idukki)'] },

'23': { villages: [], newTowns: ['Waidhan (Singrauli)'] },

'15': { villages: [], newTowns: ['Khawzawl (Khawzawl)'] },

'16': { villages: [], newTowns: ['Bishramganj (Sepahijala)'] }
        },
        openModal(id, name) {
            const data = this.townsData[id];
            if (data) {
                this.selectedState = name;
                this.villages = data.villages;
                this.newTowns = data.newTowns;
                this.isOpen = true;
            }
        }
    }">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-bordered modern-table">
                <thead class="sticky top-0">
                    <tr class="bg-primary">
                        <th rowspan="2" class="text-center text-white">#</th>
                        <th class="statewidth text-center" rowspan="2">State / UT Name</th>
                        <th colspan="2" class="text-center" style="background: #2c4f92 !important">Census 2011</th>
                        <th colspan="4" class="text-center">2026</th>
                        <th rowspan="2" class="text-center text-[11px] leading-tight">
                            Capital(s)<br>
                            <span class="text-[9px] font-normal opacity-70">(not in Cen. 2011)</span>
                        </th>
                    </tr>
                    <tr class="bg-primary text-[11px]">
                        <th class="text-center" style="background: #2c4f92 !important">Districts</th>
                        <th class="text-center" style="background: #2c4f92 !important">Cities</th>
                        <th class="text-center">Districts</th>
                        <th class="text-center">Dist. Capitals</th>
                        <th class="text-center">Other Cities</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600">
                    @php
                    $rows = [
                    ['28', 'Andhra Pradesh', '23', '353', '26', '23', '173', '196', '4'],
                    ['12', 'Arunachal Pradesh', '16', '27', '26', '20', '7', '27', '6'],
                    ['18', 'Assam', '27', '214', '35', '30', '184', '214', '5'],
                    ['10', 'Bihar', '38', '199', '38', '38', '163', '201', '-'],
                    ['22', 'Chhattisgarh', '18', '182', '33', '32', '149', '181', '1'],
                    ['30', 'Goa', '2', '70', '2', '2', '68', '70', '-'],
                    ['24', 'Gujarat', '26', '348', '33', '31', '318', '349', '2'],
                    ['06', 'Haryana', '21', '154', '22', '21', '134', '155', '1'],
                    ['02', 'Himachal Pradesh', '12', '59', '12', '10', '51', '61', '2'],
                    ['20', 'Jharkhand', '24', '228', '24', '24', '206', '230', '-'],
                    ['29', 'Karnataka', '30', '347', '31', '28', '318', '346', '3'],
                    ['32', 'Kerala', '14', '520', '14', '13', '507', '520', '1'],
                    ['23', 'Madhya Pradesh', '50', '476', '52', '51', '425', '476', '1'],
                    ['27', 'Maharashtra', '35', '534', '36', '33', '502', '535', '3'],
                    ['14', 'Manipur', '9', '51', '16', '7', '44', '51', '9'],
                    ['17', 'Meghalaya', '7', '22', '12', '7', '17', '24', '5'],
                    ['15', 'Mizoram', '8', '23', '11', '10', '13', '23', '1'],
                    ['13', 'Nagaland', '11', '26', '16', '13', '13', '26', '3'],
                    ['21', 'Odisha', '30', '223', '30', '28', '195', '223', '2'],
                    ['03', 'Punjab', '20', '217', '23', '23', '192', '215', '-'],
                    ['08', 'Rajasthan', '33', '297', '33', '33', '265', '298', '-'],
                    ['11', 'Sikkim', '4', '9', '6', '3', '6', '9', '3'],
                    ['33', 'Tamil Nadu', '32', '1,097', '38', '37', '1,059', '1,096', '1'],
                    ['36', 'Telangana', '-', '-', '33', '29', '128', '157', '4'],
                    ['16', 'Tripura', '4', '42', '8', '7', '33', '40', '1'],
                    ['05', 'Uttarakhand', '13', '115', '13', '13', '101', '114', '-'],
                    ['09', 'Uttar Pradesh', '71', '915', '75', '73', '840', '913', '2'],
                    ['19', 'West Bengal', '19', '909', '23', '23', '884', '907', '-'],
                    ['35', 'UT - Andaman and Nicobar Islands', '3', '5', '3', '1', '4', '5', '2'],
                    ['04', 'UT - Chandigarh', '1', '6', '1', '1', '7', '8', '-'],
                    ['26', 'UT - Dadra and Nagar Haveli and Daman and Diu', '3', '14', '3', '3', '10', '13', '-'],
                    ['01', 'UT - Jammu & Kashmir', '22', '122', '20', '20', '95', '115', '-'],
                    ['37', 'UT - Ladakh', '-', '-', '2', '2', '3', '5', '-'],
                    ['31', 'UT - Lakshadweep', '1', '6', '1', '1', '5', '6', '-'],
                    ['07', 'UT - NCT of Delhi', '9', '113', '11', '1', '111', '112', '10'],
                    ['34', 'UT - Puducherry', '4', '10', '4', '4', '8', '12', '-']
                    ];
                    @endphp
                    @foreach($rows as $index => $row)
                    <tr>
                        <td class="text-center text-slate-400">{{ $index + 1 }}</td>
                        <td class="font-bold text-slate-800">{{ $row[1] }}</td>
                        <td class="text-center tabular-nums">{{ $row[2] }}</td>
                        <td class="text-center tabular-nums">{{ $row[3] }}</td>
                        <td class="text-center tabular-nums font-semibold">{{ $row[4] }}</td>
                        <td class="text-center tabular-nums text-blue-600 font-bold">{{ $row[5] }}</td>
                        <td class="text-center tabular-nums text-blue-600 opacity-80">{{ $row[6] }}</td>
                        <td class="text-center tabular-nums font-black text-blue-700">{{ $row[7] }}</td>
                        <td class="text-center tabular-nums font-bold text-blue-600  cursor-pointer hover:text-blue-800 transition-colors"
                            @click="openModal('{{ $row[0] }}', '{{ $row[1] }}')">
                            {{ $row[8] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="sticky bottom-0 bg-white">
                    <tr class="india-total-row text-slate-800">
                        <td colspan="2" class="text-center uppercase tracking-widest text-slate-400 text-[11px]">India -
                            Total</td>
                        <td class="text-center">640</td>
                        <td class="text-center">7,933</td>
                        <td class="text-center">766</td>
                        <td class="text-center text-blue-600">695</td>
                        <td class="text-center text-blue-600">7,238</td>
                        <td class="text-center text-blue-700">7,933</td>
                        <td class="text-center text-blue-600">72</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Modal -->
        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="modal-overlay"
            @click.self="isOpen = false" style="display: none;">
            <div class="custom-modal" x-show="isOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95">
                <div class="modal-header-blue" x-text="selectedState"></div>
                <div class="modal-body">
                    <template x-if="villages.length > 0">
                        <div>
                            <span class="modal-section-title">Capital(s) considered as Villages in Census 2011
                                :</span>
                            <div class="town-list" x-text="villages.join(', ')"></div>
                        </div>
                    </template>

                    <template x-if="newTowns.length > 0">
                        <div>
                            <span class="modal-section-title">Capital(s) not covered in Census 2011:</span>
                            <div class="town-list" x-text="newTowns.join(', ')"></div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
</x-layout.main.base>
