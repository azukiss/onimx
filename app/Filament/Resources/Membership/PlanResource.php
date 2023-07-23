<?php

namespace App\Filament\Resources\Membership;

use App\Filament\Resources\Membership\PlanResource\Pages;
use App\Filament\Resources\Membership\PlanResource\RelationManagers;
use App\Models\Membership\Plan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PlanResource extends Resource
{
    protected static ?string $model = Plan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Membership';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('code')
                            ->label('Plan Unique Code')
                            ->required()
                            ->minLength(7)
                            ->rules(['required', 'string', 'min:7'])
                            ->unique(table: Plan::class, ignoreRecord: true)
                            ->afterStateHydrated(function (Forms\Components\TextInput $component) {
                                if (empty($component->getState()))
                                {
                                    $config = [
                                        'table' => 'plans',
                                        'field' => 'code',
                                        'length' => 7,
                                        'prefix' => 'PLAN',
                                        'reset_on_prefix_change' => true
                                    ];
                                    $generated = IdGenerator::generate($config);
                                    $component->state($generated);
                                }
                            })
                            ->disabled()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('name')
                            ->label('Plan Name')
                            ->required()
                            ->minLength(3)
                            ->maxLength(30)
                            ->rules(['required', 'string', 'min:3', 'max:30'])
                            ->unique(table: Plan::class, ignoreRecord: true),
                        Forms\Components\Select::make('currency')
                            ->required()
                            ->rules(['required', 'in:idr,usd,eur'])
                            ->options([
                                'idr' => 'IDR',
                                'usd' => 'USD',
                                'eur' => 'EUR',
                            ])
                            ->default('idr'),
                        Forms\Components\TextInput::make('price')
                            ->default(10000)
                            ->numeric()
                            ->minValue(1)
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask
                                ->numeric()
                                ->integer()
                                ->thousandsSeparator('.'),
                            ),
                        Forms\Components\TextInput::make('stock')
                            ->default(10)
                            ->minValue(1)
                            ->suffix('Users'),
                        Forms\Components\TextInput::make('length')
                            ->default(30)
                            ->minValue(1)
                            ->suffix('Days'),
                        Forms\Components\TextInput::make('order')
                            ->default(1)
                            ->minValue(1)
                            ->numeric(),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->columnSpanFull(),
                    ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable()
                    ->sortable()
                    ->money(fn ($record) => $record->currency, true),
                Tables\Columns\TextColumn::make('stock')
                    ->alignCenter()
                    ->sortable(),
                Tables\Columns\TextColumn::make('length')
                    ->suffix(' Days')
                    ->alignCenter()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_active')
                    ->alignCenter()
                    ->sortable(),
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
            'index' => Pages\ListPlans::route('/'),
            'create' => Pages\CreatePlan::route('/create'),
            'edit' => Pages\EditPlan::route('/{record}/edit'),
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
