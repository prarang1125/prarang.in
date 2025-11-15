<div class="table-responsive">
    <style>
        tbody {
            position: relative;
        }

        tbody tr:nth-child(2) {
            position: sticky;
            left: 100px;
            z-index: 1000;
            background-color: #e1dfdf !important;
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

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(4, 136, 205, 0.02);
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
    </style>
    <table class="table table-hover table-striped table-sm mb-0 shadow-sm" style="border-radius: 8px; overflow: hidden;">
        <thead class="table-light">
            <tr>
                @if ($showSerial ?? false)
                    <th class="text-start fw-bold">#</th>
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
                    <th class="text-start fw-bold"
                        @if ($tooltip) title="{{ $tooltip }}"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            style="cursor: help;" @endif>
                        {{ $label }}
                    </th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @forelse($rows as $idx => $r)
                <tr>
                    @if ($showSerial ?? false)
                        <td class="text-muted fw-medium">{{ $idx + 1 }}</td>
                    @endif
                    @foreach ($columns as $c)
                        <td class="text-start"
                            style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                            title="{{ is_array($r[$c] ?? null) ? json_encode($r[$c]) : $r[$c] ?? '' }}">
                            {{ is_array($r[$c] ?? null) ? json_encode($r[$c]) : $r[$c] ?? '' }}
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
