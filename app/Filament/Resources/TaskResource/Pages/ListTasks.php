<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource\Widgets\CalendarWidget;
use App\Filament\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         TaskResource\Widgets\CalendarWidget::class,
    //     ];
    // }
    protected function getFooterWidgets(): array
    {
        return array_merge(parent::getFooterWidgets(), [
            CalendarWidget::make([
                'masterRecord' => null,
            ]),
        ]);
    }
}
