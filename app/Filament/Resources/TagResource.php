<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Filament\Resources\TagResource\RelationManagers;
use App\Models\Tag;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Manage Posts';

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Tag Data')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->rules(['required', 'min:3', 'max:20', 'string'])
                                    ->unique(table: Tag::class, ignoreRecord: true)
                                    ->required()
                                    ->afterStateUpdated(function ($state, callable $set, Page $livewire) {
                                        $set('name', Str::title($state));
                                        $set('slug', Str::slug($state));
                                        if ($livewire instanceof CreateRecord)
                                        {
                                            $set('code', Str::upper(preg_replace('#[aeiou\s]+#i', '', $state)));
                                        }
                                    })
                                    ->reactive(),
                                Forms\Components\TextInput::make('slug')
                                    ->rules(['required', 'alpha-dash'])
                                    ->unique(table: Tag::class, ignoreRecord: true)
                                    ->required()
                                    ->disabled()
                                    ->hint('Auto generate by input title')
                                    ->hintIcon('heroicon-o-information-circle'),
                                Forms\Components\TextInput::make('icon')
                                    ->rules(['string', 'nullable'])
                                    ->default('fa-solid fa-circle fa-fw')
                                    ->hint('Icon from <a href="https://fontawesome.com" target="_blank">FontAwesome</a>')
                                    ->hintIcon('heroicon-o-information-circle'),
                                Forms\Components\TextInput::make('order')
                                    ->rules(['numeric', 'min:1', 'max:99', 'nullable'])
                                    ->numeric()
                                    ->default(1),
                                Forms\Components\TextInput::make('code')
                                    ->rules(['alpha', 'min:2', 'max:99', 'required'])
                                    ->required()
                                    ->unique(table: Tag::class, ignoreRecord: true),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->alignCenter()
                    ->sortable(),
                Tables\Columns\ViewColumn::make('icon')
                    ->view('filament.tables.columns.post.tag.icon')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ])
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
