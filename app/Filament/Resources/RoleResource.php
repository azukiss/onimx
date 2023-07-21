<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use App\Models\Role;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-circle';

    protected static ?string $navigationGroup = 'Manage Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->rules(['required', 'alpha-dash', 'min:3', 'max:15'])
                                    ->dehydrated(fn ($record) => auth()->user()->hasPermissionTo('update-role') && ($record->order > auth()->user()->roles()->pluck('order')->first())),
                                Forms\Components\Select::make('guard_name')
                                    ->required()
                                    ->rules('required', 'in:web,api')
                                    ->options([
                                        'web' => 'Web',
                                        'api' => 'API',
                                    ])
                                    ->default('web')
                                    ->dehydrated(fn ($record) => auth()->user()->hasPermissionTo('update-role') && ($record->order > auth()->user()->roles()->pluck('order')->first())),
                            ]),
                    ]),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\ColorPicker::make('txtcolor')
                                    ->label('Text Color')
                                    ->required()
                                    ->default('#FFFFFF'),
                                Forms\Components\ColorPicker::make('bgcolor')
                                    ->label('Background Color')
                                    ->required()
                                    ->default('#000000'),
                                Forms\Components\TextInput::make('icon')
                                    ->required()
                                    ->default('fa-solid fa-user'),
                                Forms\Components\TextInput::make('order')
                                    ->rules(['numeric', 'min:1', 'max:99'])
                                    ->numeric()
                                    ->required()
                                    ->default(1),
                            ]),
                    ]),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\MultiSelect::make('permissions')
                            ->relationship('permissions', 'name')
                            ->dehydrated(!auth()->user()->hasPermissionTo('update-role')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('name')->sortable()->searchable(),
                Tables\Columns\BadgeColumn::make('guard_name')->sortable()->searchable(),
                Tables\Columns\TagsColumn::make('permissions.name')->sortable(),
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
//                Tables\Actions\DeleteBulkAction::make(),
//                Tables\Actions\ForceDeleteBulkAction::make(),
//                Tables\Actions\RestoreBulkAction::make(),
            ])
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PermissionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
