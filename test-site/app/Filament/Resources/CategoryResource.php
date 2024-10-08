<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;


class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('parent_id')
                    ->label('Parent ID'),
                Forms\Components\TextInput::make('category_name')
                    ->required()
                    ->label('Category Name'),
                Forms\Components\TextInput::make('category_code')
                    ->required()
                    ->label('Category Code'),

                Forms\Components\Select::make('Category_id')
                    ->options(Category::where('parent_id', "=", NULL)->toArray())
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set)=> $set('id', null)),
                // Forms\Components\Select::make('Parent_id')
                //     ->options(function (callable $get){
                //     $category = Category::find($get('id'));
                //     return $category->posts->pluck('category_name', 'id');
                // }),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Define your table columns here
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('category_name')->label('Category Name'),
                Tables\Columns\TextColumn::make('category_code')->label('Category Code'),
                Tables\Columns\TextColumn::make('parent_id')->label('Parent ID'),
            ])
            ->filters([
                // Define your table filters here
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->model(Category::class),
                Tables\Actions\EditAction::make()->model(Category::class),
                Tables\Actions\DeleteAction::make()->model(Category::class),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define your relations here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'view' => Pages\ViewCategory::route('/{record}'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
