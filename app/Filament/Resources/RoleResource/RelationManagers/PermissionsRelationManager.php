<?php

namespace App\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class PermissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'permissions';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('name'),
                Tables\Columns\BadgeColumn::make('guard_name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
//                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    protected function canAssociate(): bool { return false; }

    protected function canAttach(): bool { return false; }

    protected function canCreate(): bool { return false; }

    protected function canDelete(Model $record): bool { return false; }

    protected function canDeleteAny(): bool { return false; }

    protected function canDetach(Model $record): bool { return false; }

    protected function canDetachAny(): bool { return false; }

    protected function canDissociate(Model $record): bool { return false; }

    protected function canDissociateAny(): bool { return false; }

    protected function canEdit(Model $record): bool { return false; }

    protected function canForceDelete(Model $record): bool { return false; }

    protected function canForceDeleteAny(): bool { return false; }

    protected function canReorder(): bool { return false; }

    protected function canReplicate(Model $record): bool { return false; }

    protected function canRestore(Model $record): bool { return false; }

    protected function canRestoreAny(): bool { return false; }
}
