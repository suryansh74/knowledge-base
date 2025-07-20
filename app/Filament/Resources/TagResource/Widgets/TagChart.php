<?php

namespace App\Filament\Resources\TagResource\Widgets;

use Filament\Widgets\ChartWidget;

class TagChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected static ?string $maxHeight = '300px';
    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 2,
    ];

    protected function getData(): array
    {
        $tags = \App\Models\Tag::all();

        // Get counts for each tag
        $counts = $tags->map(fn($tag) => $tag->problems->count())->toArray();

        // Define a vibrant color palette
        $colors = [
            '#3B82F6', // Blue
            '#F59E0B', // Amber
            '#10B981', // Green
            '#EF4444', // Red
            '#8B5CF6', // Purple
            '#F472B6', // Pink
            '#14B8A6', // Teal
        ];

        // Match colors to tags dynamically
        $backgroundColors = collect($tags)->map(
            fn($tag, $i) => $colors[$i % count($colors)]
        )->toArray();

        // Slightly darker shades for hover
        $hoverColors = collect($backgroundColors)->map(function ($color) {
            return $color . 'CC'; // Add alpha for hover effect
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Problems per Tag',
                    'data' => $counts,
                    'backgroundColor' => $backgroundColors,
                    'hoverBackgroundColor' => $hoverColors,
                    'borderColor' => $backgroundColors,
                    'hoverBorderColor' => '#ffffff',
                    'borderWidth' => 0,
                    'borderRadius' => 8,          // Rounded bars
                    'barPercentage' => 0.8,       // Slim bars
                    'categoryPercentage' => 0.7,  // Spacing
                    'hoverBorderWidth' => 3,
                ],
            ],
            'labels' => $tags->pluck('name')->toArray(),

            // Chart.js Options (for a clean, modern look)
            'options' => [
                'responsive' => true,
                'maintainAspectRatio' => false,
                'plugins' => [
                    'legend' => [
                        'display' => true,
                        'position' => 'top',
                        'labels' => [
                            'color' => '#374151', // Tailwind gray-700
                            'font' => ['size' => 14, 'weight' => 'bold'],
                        ],
                    ],
                    'tooltip' => [
                        'enabled' => true,
                        'backgroundColor' => '#111827', // Dark tooltip
                        'titleColor' => '#F9FAFB',      // Light title
                        'bodyColor' => '#E5E7EB',       // Subtle text
                        'titleFont' => ['weight' => 'bold'],
                        'padding' => 12,
                        'borderColor' => '#F9FAFB',
                        'borderWidth' => 1,
                    ],
                ],
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'grid' => [
                            'color' => '#E5E7EB', // Tailwind gray-200
                            'drawBorder' => false,
                        ],
                        'ticks' => [
                            'color' => '#6B7280', // Tailwind gray-500
                            'stepSize' => 1,
                        ],
                    ],
                    'x' => [
                        'grid' => [
                            'display' => false,
                        ],
                        'ticks' => [
                            'color' => '#6B7280',
                            'font' => ['size' => 12],
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
