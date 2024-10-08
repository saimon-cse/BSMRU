<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;


    // protected function getActions(): array{


    // }
}

/*


 Action::make('create')
                    ->label('Create Category')
                    ->action(function (array $data): void {
                        Category::create($data);
                    })
                    ->form([
                        Forms\Components\TextInput::make('parent_id')
                            ->required()
                            ->label('Parent ID'),
                        Forms\Components\TextInput::make('category_name')
                            ->required()
                            ->label('Category Name'),
                        Forms\Components\TextInput::make('category_code')
                            ->required()
                            ->label('Category Code'),
                    ])
                    ->modalHeading('Create Category')
                    ->modalButton('Create')
                    ->modalWidth('lg'),

*/
