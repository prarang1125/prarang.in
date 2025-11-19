<div class="table-responsive">
    <style>
        /* Custom Scrollbar Styling */
        .table-responsive::-webkit-scrollbar {
            height: 20px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 6px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #0488cd;
            border-radius: 6px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: #036aa3;
        }

        tbody {
            position: relative;
        }


        /* Text capitalize */
        .table-striped tr .text-capitalize {
            background-color: #e4f3fb;
        }

        /* Text start */
        .table-light tr .text-start {
            background-color: #eaf2fa;
        }

        /* Text capitalize */
        .table-striped tr .text-capitalize {
            min-width: 165px;
        }

        /* Container */
        .container>div>div>.container-lg {
            margin-bottom: 13px !important;
            padding-left: 3px !important;
            padding-right: 0px !important;
        }

        /* Accordion button */
        #statesAccordion .accordion-item .accordion-button {
            padding-top: 7px;
            padding-bottom: 6px;
        }

        /* Card title */
        .container div .card-title {
            font-size: 20px !important;
            color: #121c68 !important;
        }

        /* Form check */
        .accordion-body div .form-check {
            padding-top: 2px !important;
            padding-bottom: 2px !important;
        }

        /* Text start */
        .table-light tr .text-start {
            min-width: 181px;
            font-size: 14px;
            font-weight: 500 !important;
            text-align: left;
        }

        /* Enhanced Table Styling */
        .table {
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead th {
            background: linear-gradient(to bottom, #f8f9fa 0%, #e9ecef 100%) !important;
            font-weight: 600 !important;
            letter-spacing: 0.3px;
            /* padding: 12px 16px !important; */
            border-bottom: 2px solid #0488cd !important;
        }

        .table tbody td {
            padding: 12px 16px !important;
            /* vertical-align: middle; */
        }

        .table-hover tbody tr:hover {
            background-color: rgba(4, 136, 205, 0.08) !important;
            cursor: pointer;
        }

        /* Serial Number Column */
        .text-muted.fw-medium {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700 !important;
        }

        /* Sticky First Column */
        .table thead th:first-child,
        .table tbody td:first-child {
            position: sticky;
            left: 0;
            z-index: 20;
            background-color: #f8f9fa;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .table tbody td:first-child {
            background-color: #ffffff;
            font-weight: 600;
        }

        .table-hover tbody tr:hover td:first-child {
            background-color: rgba(4, 136, 205, 0.08) !important;
        }

        /* Sticky Second Column (Serial Number if present) */
        .table thead th:nth-child(2).serial-column,
        .table tbody td:nth-child(2).serial-column {
            position: sticky;
            left: 0;
            z-index: 20;
            background-color: #f8f9fa;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            2 width: 50px !important;
            min-width: 50px !important;
            max-width: 50px !important;
        }


        .table-striped tbody tr:nth-of-type(odd) td:nth-child(2).serial-column {
            background-color: rgba(4, 136, 205, 0.02);
        }

        .table-hover tbody tr:hover td:nth-child(2).serial-column {
            background-color: rgba(4, 136, 205, 0.08) !important;
        }

        /* Adjust left position when serial number exists */
        .has-serial thead th:nth-child(2),
        .has-serial tbody td:nth-child(2) {
            left: 50px !important;
        }

        /* Serial column */
        .container div div .container-lg .card .card-body div .table-responsive .table-striped tbody tr .serial-column {
            padding-top: 1px !important;
        }

        /* Text start */
        .container div div .container-lg .card .card-body div .table-responsive .table-striped tbody tr .text-start {
            height: 3px !important;
        }

        /* Text start */
        .container div div .container-lg .card .card-body div .table-responsive .table-striped .table-light tr .text-start {
            min-width: 145px !important;
        }
    </style>
    <table class="table table-hover table-sm mb-0 shadow-sm" style="border-radius: 8px; overflow: hidden;">
        <thead class="table-light">
            <tr>
                @if ($showSerial ?? false)
                    <th class="text-start fw-bold"
                        style="width: 50px !important; min-width: 50px !important; max-width: 50px !important; padding: 8px 4px !important;">
                        Sr.</th>
                @endif
                @php
                    $firstRow = collect($rows)->first();
                    $allColumns = $firstRow ? array_keys($firstRow) : [];

                    // Use custom column order if provided, otherwise use all columns
                    if ($columnOrder ?? false) {
                        // Check if columnOrder is associative (has non-numeric string keys)
                        $isAssoc = count(array_filter(array_keys($columnOrder), 'is_string')) > 0;
                        $columns = $isAssoc ? array_keys($columnOrder) : $columnOrder;
                    } else {
                        $columns = $allColumns;
                    }
                    // Filter to only include columns that exist in data
                    $columns = array_intersect($columns, $allColumns);
                    // Get labels and tooltips from config based on view type
                    $viewType = $viewType ?? 'india'; // Default to india
                    $labels = config("cirus.{$viewType}.field_labels", []);
                    $tooltips = config("cirus.{$viewType}.tooltips", []);
                @endphp

                @foreach ($columns as $c)
                    @php
                        $label = $labels[$c] ?? str_replace('_', ' ', ucwords($c, '_'));
                        $tooltip = $tooltips[$c] ?? '';
                    @endphp
                    <th class="text-start fw-bold {{ $c == 'risk_index' ? 'text-danger' : '' }}"
                        @if ($tooltip) title="{{ $tooltip }}"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            style="cursor: help;" @endif>
                        {{ $label }}
                    </th>
                @endforeach
            </tr>
        </thead>

        <tbody class="{{ $showSerial ?? false ? 'has-serial' : '' }}">
            @forelse($rows as $idx => $r)
                <tr>
                    @if ($showSerial ?? false)
                        <td class="text-muted fw-medium serial-column"
                            style="width: 50px !important; min-width: 50px !important; max-width: 50px !important; padding: 8px 4px !important;">
                            {{ $idx + 1 }}</td>
                    @endif
                    @foreach ($columns as $c)
                        <td class="text-start"
                            style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                            title="{{ is_array($r[$c] ?? null) ? json_encode($r[$c]) : $r[$c] ?? '' }}">
                            <span
                                class="{{ $c == 'risk_index' ? 'text-danger fw-semibold' : '' }}  fw-medium">{{ is_array($r[$c] ?? null) ? json_encode($r[$c]) : $r[$c] ?? '' }}</span>
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td class="p-5 text-center text-muted" colspan="100%">
                        <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                        <p class="mt-2">No data available</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Bootstrap tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });

            // Re-initialize tooltips after Livewire updates
            document.addEventListener('livewire:load', function() {
                Livewire.hook('message.processed', (message, component) => {
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll(
                        '[data-bs-toggle="tooltip"]'));
                    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl);
                    });
                });
            });
        </script>
    @endpush
@endonce
