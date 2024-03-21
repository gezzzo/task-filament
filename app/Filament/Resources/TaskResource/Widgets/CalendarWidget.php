<?php

namespace App\Filament\Resources\TaskResource\Widgets;

use Filament\Widgets\Widget;
 
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends Widget
{
    protected static string $view = 'filament.resources.task-resource.widgets.calendar-widget';

    public Model | string | null $model = Task::class;
 
    public function fetchEvents(array $fetchInfo): array
    {
        return Task::where('start', '>=', $fetchInfo['start'])
            ->where('end', '<=', $fetchInfo['end'])
            ->get()
            ->map(function (Task $task) {
                return [
                    'id' => str($task->id)->toString(),
                    'title' => $task->name,
                    'start' => \Illuminate\Support\Carbon::parse($task->getAttribute('start'))->toDateString(),
                    'end' => \Illuminate\Support\Carbon::parse($task->getAttribute('end'))->toDateString(),
                ];
            })
            ->toArray();
    }


    public static function canView(): bool
    {
        return false;
    }

}
