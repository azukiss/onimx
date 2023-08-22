<?php

namespace App\Filament\Resources\Membership;

use App\Enum\PlanInvoice\StatusEnum;
use App\Filament\Resources\Membership\PlanInvoiceResource\Pages;
use App\Filament\Resources\Membership\PlanInvoiceResource\RelationManagers;
use App\Models\Membership\PlanInvoice;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlanInvoiceResource extends Resource
{
    protected static ?string $model = PlanInvoice::class;

    protected static ?string $navigationLabel = 'Invoices';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Membership';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                ->schema([
                    Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make('Proof of Payment')
                        ->schema([
                            Forms\Components\Grid::make(1)
                            ->relationship('paymentProof')
                            ->schema([
                                Forms\Components\FileUpload::make('upload')
                                ->multiple()
                                ->enableOpen()
                                ->enableDownload()
                                ->disabled()
                                ->dehydrated(),
                                Forms\Components\TextArea::make('other')
                                ->disabled()
                                ->dehydrated(),
                                Forms\COmponents\Toggle::make('is_valid')
                                ->label('Valid'),
                                Forms\COmponents\Toggle::make('is_checked')
                                ->label('Checked')
                                ->afterStateUpdated(function(callable $set, $state) {
                                    if($state == true) {
                                        $set('checked_at', Carbon::now()->toDateTimeString());
                                    } else {
                                        $set('checked_at', null);
                                    }
                                })
                                ->reactive(),
                                Forms\Components\DateTimePicker::make('checked_at')
                                ->disabled(),
                            ]),
                        ]),
                        Forms\Components\Card::make()
                        ->schema([
                            Forms\Components\KeyValue::make('customer')
                            ->label('Customer')
                            ->disableAddingRows()
                            ->disableDeletingRows()
                            ->disableEditingKeys()
                            ->disableEditingValues()
                            ->disabled(),
                            Forms\Components\KeyValue::make('item')
                            ->label('Plan')
                            ->disableAddingRows()
                            ->disableDeletingRows()
                            ->disableEditingKeys()
                            ->disableEditingValues()
                            ->disabled(),
                            Forms\Components\KeyValue::make('payment')
                            ->label('Bill To')
                            ->disableAddingRows()
                            ->disableDeletingRows()
                            ->disableEditingKeys()
                            ->disableEditingValues()
                            ->disabled(),
                        ]),
                    ])
                    ->columnSpan(2),
                    Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Card::make()
                        ->schema([
                            Forms\Components\Grid::make(1)
                            ->schema([
                                Forms\Components\TextInput::make('code')
                                ->disabled()
                                ->dehydrated(),
                                Forms\Components\Select::make('status')
                                ->options(StatusEnum::option()),
                                Forms\Components\DateTimePicker::make('paid_at')
                                ->label(__('Payment Date'))
                                ->disabled()
                                ->dehydrated(),
                                Forms\Components\DateTimePicker::make('created_at')
                                ->label(__('Create Date'))
                                ->disabled()
                                ->dehydrated(),
                                Forms\Components\DateTimePicker::make('updated_at')
                                ->label(__('Update Date'))
                                ->disabled()
                                ->dehydrated(),
                            ]),
                        ]),

                    ])
                    ->columnSpan(1),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('code')
                    ->searchable()
                    ->sortable()
                    ->colors(['primary'])
                    ->fontFamily('mono'),
                Tables\Columns\TextColumn::make('user.username'),
                Tables\Columns\TextColumn::make('plan.name'),
                Tables\Columns\TextColumn::make('payment.name'),
                Tables\Columns\BadgeColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->colors([
                        'primary' => static fn ($state): bool => $state == StatusEnum::Pending->value,
                        'secondary' => static fn ($state): bool => $state == StatusEnum::Cancelled->value,
                        'warning' => static fn ($state): bool => $state == StatusEnum::Partial->value,
                        'success' => static fn ($state): bool => $state == StatusEnum::Paid->value,
                        'danger' => static fn ($state): bool => $state == StatusEnum::Unpaid->value,
                    ]),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPlanInvoices::route('/'),
            'create' => Pages\CreatePlanInvoice::route('/create'),
            'view' => Pages\ViewPlanInvoice::route('/{record}'),
            'edit' => Pages\EditPlanInvoice::route('/{record}/edit'),
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
