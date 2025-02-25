<div>
    <div id="schedule-container">
        @foreach($schedules as $index => $schedule)
            <div class="day-schedule" style="display: flex; flex-wrap: wrap; gap: 10px; align-items: center;">
                <select wire:model="schedules.{{ $index }}.day" style="flex: 1; min-width: 100px; padding: 5px;">
                    <option value="">-- दिन चुनें --</option>
                    <option value="monday">सोमवार</option>
                    <option value="tuesday">मंगलवार</option>
                    <option value="wednesday">बुधवार</option>
                    <option value="thursday">गुरुवार</option>
                    <option value="friday">शुक्रवार</option>
                    <option value="saturday">शनिवार</option>
                    <option value="sunday">रविवार</option>
                </select>
    
                <input type="time" wire:model="schedules.{{ $index }}.open_time" style="flex: 1; padding: 5px;">
                <label>to</label>
                <input type="time" wire:model="schedules.{{ $index }}.close_time" style="flex: 1; padding: 5px;">
    
                <label style="white-space: nowrap;">
                    <input type="checkbox" wire:model="schedules.{{ $index }}.is_24_hours"> 24 घंटे
                </label>
                <button type="button" wire:click="removeDay({{ $index }})" style="background: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">&#x2716;</button>
            </div>
        @endforeach
    </div>
    
    <button type="button" wire:click="addDay">+ Add Day</button>
    
</div>
