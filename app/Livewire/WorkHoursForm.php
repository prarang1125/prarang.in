<?php

namespace App\Livewire;

use Livewire\Component;

class WorkHoursForm extends Component
{
    public $schedules = [];

    public function mount($existingSchedules = [])
    {
        $this->schedules = !empty($existingSchedules) ? $existingSchedules : [['day' => '', 'open_time' => '', 'close_time' => '', 'is_24_hours' => false, 'open_time_2' => '', 'close_time_2' => '']];
    }

    public function addDay()
    {
        $this->schedules[] = ['day' => '', 'open_time' => '', 'close_time' => '', 'is_24_hours' => false, 'open_time_2' => '', 'close_time_2' => ''];
    }

    public function removeDay($index)
    {
        unset($this->schedules[$index]);
        $this->schedules = array_values($this->schedules);
    }

    public function save()
    {
        $this->emit('workHoursSaved', $this->schedules);
    }

    public function render()
    {
        return view('livewire.work-hours-form');
    }
}
