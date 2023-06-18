<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\Tag;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationGroup = 'Manage Posts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Post Image')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->multiple()
                            ->minFiles(1)
                            ->maxFiles(5)
                            ->enableReordering()
                            ->required()
                            ->image()
                            ->rules(['required', 'image', 'mimes:png,jpg,jpeg'])
                            ->disk('public')
                            ->visibility('public')
                            ->directory('uploads/post')
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                return (string) str(Str::ulid().'.'.$file->extension());
                            })
                    ]),
                Forms\Components\Section::make('Post Data')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->rules(['required', 'min:3', 'max:100'])
                            ->required()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('title', Str::title($state));
                                $set('slug', Str::slug($state));
                            })
                            ->reactive()
                            ->hint('Auto generate by input title')
                            ->hintIcon('heroicon-o-information-circle'),
                        Forms\Components\TextInput::make('slug')
                            ->rules(['required', 'alpha-dash'])
                            ->required()
                            ->disabled(),
                        Forms\Components\TextInput::make('code')
                            ->required()
                            ->disabled()
                            ->unique(table: Post::class, ignoreRecord: true)
                            ->hint('Auto generate by select tag')
                            ->hintIcon('heroicon-o-information-circle'),
                        Forms\Components\MultiSelect::make('tag_id')
                            ->required()
                            ->relationship('tags', 'name')
                            ->afterStateUpdated(function ($state, callable $set, Page $livewire) {
                                if (!empty($state) && $livewire instanceof CreateRecord)
                                {
                                    $code = Tag::where('id', $state)->pluck('code')->first();
                                    $length = Str::length($code) + 4;
                                    $config = [
                                        'table' => 'posts',
                                        'field' => 'code',
                                        'length' => (int)$length,
                                        'prefix' => (string)$code,
                                        'reset_on_prefix_change' => true
                                    ];
                                    $set('code', IdGenerator::generate($config));
                                }
                                Elseif(empty($state) && $livewire instanceof CreateRecord)
                                {
                                    $set('code', null);
                                }
                            })
                            ->reactive(),
                        Forms\Components\Textarea::make('description')
                            ->nullable()
                            ->rows(3)
                            ->minLength(10)
                            ->maxLength(1000),
                        Forms\Components\Section::make('Information')
                            ->statePath('info')
                            ->schema([
                                Forms\Components\TextInput::make('pics')
                                    ->label('Total Pictures')
                                    ->numeric()
                                    ->suffix('.Pics'),
                                Forms\Components\TextInput::make('vids')
                                    ->label('Total Videos')
                                    ->numeric()
                                    ->suffix('.Vids'),
                                Forms\Components\TextInput::make('size')
                                    ->label('Total Size'),
                            ]),
                        Forms\Components\Repeater::make('Download Link')
                            ->minItems(1)
                            ->statePath('link')
                            ->schema([
                                Forms\Components\TextInput::make('link')
                                    ->required()
                                    ->rules(['required', 'url']),
                            ]),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
//                            ->hidden(fn (Page $livewire) => ($livewire instanceof CreateRecord))
                            ->afterStateHydrated(function (Forms\Components\Toggle $component, ?Post $record) {
                                if  (!empty($record->is_published) && $record->is_published == true)
                                {
                                    $component->state(true);
                                }
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 2,
                'lg' => 3,
                'xl' => 4,
            ])
            ->columns([
                Tables\Columns\ViewColumn::make('image')
                    ->view('filament.tables.columns.post.imagearray'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TagsColumn::make('tags.name')
                    ->label('Tags')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ForceDeleteAction::make()
                        ->before(function ($record) {
                            if (!empty(array_values($record->image)))
                            {
                                foreach ($record->image as $image)
                                {
                                    File::delete(public_path($image));
//                                    File::delete(public_path(str_replace('uploads/post/', 'uploads/post/thumb/', $image)));
                                }
                            }
                        }),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
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
