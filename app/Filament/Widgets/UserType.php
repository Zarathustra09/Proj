<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class UserType extends ChartWidget
{


    protected static ?string $heading = 'User Type Distribution';
    public ?string $filter = 'today';

    protected function getData(): array
    {
        $userTypeCounts = User::query()
            ->select('usertype', DB::raw('COUNT(*) as count'))
            ->groupBy('usertype')
            ->pluck('count', 'usertype')
            ->toArray();

        $userTypeLabels = [
            0 => 'Individual',
            1 => 'Corporate',
            // Add more labels if needed
        ];

        $labels = array_map(function ($userType) use ($userTypeLabels) {
            return $userTypeLabels[$userType] ?? 'Unknown';
        }, array_keys($userTypeCounts));

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'backgroundColor' => ['#3490dc', '#ff9900', '#e3342f'], // Adjust colors as needed
                    'data' => array_values($userTypeCounts),
                ],
            ],
        ];
    }

   

    protected function getType(): string
    {
        return 'bar';
    }
}
