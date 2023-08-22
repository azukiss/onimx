<?php

namespace App\Filament\Resources\Membership;

use App\Enum\PlanFeature\TypeEnum;
use App\Filament\Resources\Membership\PlanFeatureResource\Pages;
use App\Filament\Resources\Membership\PlanFeatureResource\RelationManagers;
use App\Models\Membership\PlanFeature;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Enum;

class PlanFeatureResource extends Resource
{
    protected static ?string $model = PlanFeature::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-list';

    protected static ?string $navigationGroup = 'Membership';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\BelongsToSelect::make('plan_id')
                            ->relationship('plans', 'name')
                            ->required()
                            ->rules(['required', 'exists:plans,id']),
                        Forms\Components\TextInput::make('order')
                            ->default(1)
                            ->minValue(1)
                            ->numeric(),
                        Forms\Components\Select::make('type')
                            ->required()
                            ->rules(['required', new Enum(TypeEnum::class)])
                            ->options(TypeEnum::option())
                            ->default(TypeEnum::Boolean)
                            ->reactive(),
                    ]),
                ]),
                Forms\Components\Card::make()->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->rules(['required', 'string'])
                            ->label('Feature')
                            ->afterStateUpdated(fn (callable $set, $state) => $set('name', str($state)->headline()))
                            ->reactive(),
                        Forms\Components\Textarea::make('description')
                            ->nullable()
                            ->rules(['nullable', 'string', 'max:256'])
                            ->maxLength(256)
                            ->rows(1),
                        Forms\Components\TextInput::make('value')
                            ->label('Amount')
                            ->required()
                            ->rules(['required', 'string', 'max:10'])
                            ->hidden(fn (callable $get) => $get('type') == 'string' ? false : true)
                            ->dehydrated(fn (callable $get) => $get('type') == 'string' ? true : false),
                        Forms\Components\Toggle::make('value')
                            ->label('Availability')
                            ->required()
                            ->rules(['required', 'boolean'])
                            ->inline(false)
                            ->hidden(fn (callable $get) => $get('type') == 'boolean' ? false : true)
                            ->dehydrated(fn (callable $get) => $get('type') == 'boolean' ? true : false),
                        Forms\Components\TextInput::make('value')
                            ->label('Icon')
                            ->required()
                            ->rules(['required', 'string'])
                            ->hint('Icon from <a href="https://fontawesome.com" target="_blank">FontAwesome</a>')
                            ->hintIcon('heroicon-o-information-circle')
                            ->hidden(fn (callable $get) => $get('type') == 'icon' ? false : true)
                            ->dehydrated(fn (callable $get) => $get('type') == 'icon' ? true : false),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order'),
                Tables\Columns\TextColumn::make('plans.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('value'),
            ])
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
            ->reorderable('order')
            ->defaultSort('order');
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
            'index' => Pages\ListPlanFeatures::route('/'),
            'create' => Pages\CreatePlanFeature::route('/create'),
            'edit' => Pages\EditPlanFeature::route('/{record}/edit'),
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
