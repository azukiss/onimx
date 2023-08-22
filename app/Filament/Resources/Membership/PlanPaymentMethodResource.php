<?php

namespace App\Filament\Resources\Membership;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Enum\PlanPayment\TypeEnum;
use Illuminate\Validation\Rules\Enum;
use App\Models\Membership\PlanPayment;
use Illuminate\Database\Eloquent\Builder;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Membership\PlanPaymentMethodResource\Pages;
use App\Filament\Resources\Membership\PlanPaymentMethodResource\RelationManagers;

class PlanPaymentMethodResource extends Resource
{
    protected static ?string $model = PlanPayment::class;

    protected static ?string $navigationLabel = 'Payment Methods';

    protected static ?string $navigationIcon = 'heroicon-o-cash';

    protected static ?string $navigationGroup = 'Membership';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('code')
                            ->label(__('Payment Unique Code'))
                            ->required()
                            ->minLength(6)
                            ->rules(['required', 'string', 'min:6'])
                            ->unique(table: PlanPayment::class, ignoreRecord: true)
                            ->afterStateHydrated(function (Forms\Components\TextInput $component) {
                                if (empty($component->getState())) {
                                    $config = [
                                        'table' => 'plan_payments',
                                        'field' => 'code',
                                        'length' => 6,
                                        'prefix' => 'PAY',
                                        'reset_on_prefix_change' => true
                                    ];
                                    $generated = IdGenerator::generate($config);
                                    $component->state($generated);
                                }
                            })
                            ->disabled()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('name')
                            ->label(__('Payment Name'))
                            ->required()
                            ->rules(['required', 'string', 'max:255']),
                        Forms\Components\Select::make('type')
                            ->searchable()
                            ->required()
                            ->rules(['required', new Enum(TypeEnum::class)])
                            ->options(TypeEnum::option())
                            ->default(TypeEnum::ewallet),
                        Forms\Components\TextInput::make('holder')
                            ->label(__('Account Holder'))
                            ->required()
                            ->rules(['required', 'string', 'max:255']),
                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->rules(['required', 'string', 'max:512']),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->columnSpanFull(),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('code')
                    ->colors(['primary'])
                    ->fontFamily('mono')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('holder')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->sortable()
                    ->fontFamily('mono')
                    ->copyable(),
                Tables\Columns\TextColumn::make('used')
                    ->searchable()
                    ->sortable()
                    ->fontFamily('mono'),
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
            ]);
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
            'index' => Pages\ListPlanPaymentMethods::route('/'),
            'create' => Pages\CreatePlanPaymentMethod::route('/create'),
            'edit' => Pages\EditPlanPaymentMethod::route('/{record}/edit'),
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
