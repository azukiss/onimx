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
                Forms\Components\Section::make('Images')
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
                            ->imagePreviewHeight('250')
                            ->disablePreview()
                    ]),
                Forms\Components\Section::make('Data')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\BelongsToSelect::make('author_id')
                                    ->label('Author')
                                    ->required()
                                    ->searchable()
                                    ->default(auth()->user()->id)
                                    ->relationship('author', 'username'),
                                Forms\Components\BelongsToManyMultiSelect::make('tag_id')
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
                                        elseif(empty($state) && $livewire instanceof CreateRecord)
                                        {
                                            $set('code', null);
                                        }
                                    })
                                    ->reactive(),
                                Forms\Components\TextInput::make('code')
                                    ->required()
                                    ->disabled()
                                    ->unique(table: Post::class, ignoreRecord: true)
                                    ->hint('Auto generate by select tag')
                                    ->hintIcon('heroicon-o-information-circle'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->rules(['required', 'min:3', 'max:100'])
                                    ->required()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('title', Str::title($state));
                                        $set('slug', Str::slug($state));
                                    })
                                    ->reactive(),
                                Forms\Components\TextInput::make('slug')
                                    ->rules(['required', 'alpha-dash'])
                                    ->required()
                                    ->hint('Auto generate by input title')
                                    ->hintIcon('heroicon-o-information-circle')
                                    ->disabled(),
                            ]),
                        Forms\Components\MarkdownEditor::make('description')
                            ->nullable()
                            ->minLength(10)
                            ->maxLength(1000)
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'edit',
                                'italic',
                                'link',
                                'orderedList',
                                'preview',
                                'strike',
                            ]),
                    ]),
                Forms\Components\Section::make('Information')
                    ->statePath('info')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('pics')
                                    ->label('Total Pictures')
                                    ->numeric()
                                    ->suffix('Pics'),
                                Forms\Components\TextInput::make('vids')
                                    ->label('Total Videos')
                                    ->numeric()
                                    ->suffix('Vids'),
                                Forms\Components\TextInput::make('size')
                                    ->label('Total Size'),
                            ])
                    ]),
                Forms\Components\Section::make('Download Links')
                    ->schema([
                        Forms\Components\Repeater::make('Download Link')
                            ->minItems(1)
                            ->maxItems(4)
                            ->statePath('link')
                            ->schema([
                                Forms\Components\TextInput::make('link')
                                    ->required()
                                    ->rules(['required', 'url'])
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $slink = new \AshAllenDesign\ShortURL\Classes\Builder();
                                        $shortURLObject = $slink->destinationUrl($state)->make();
                                        $shortURL = $shortURLObject->url_key;

                                        $set('url_key', $shortURL);
                                    })
                                    ->reactive(),
                                Forms\Components\TextInput::make('url_key')
                                    ->required()

                                    ->disabled(),
                            ]),
                    ]),
                Forms\Components\Section::make('Options')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
//                            ->hidden(fn (Page $livewire) => ($livewire instanceof CreateRecord))
                            ->afterStateHydrated(function (Forms\Components\Toggle $component, ?Post $record) {
                                if (auth()->user()->hasRole('admin'))
                                {
                                    $component->state(true);
                                }
                                elseif  (!empty($record->is_published) && $record->is_published == true)
                                {
                                    $component->state(true);
                                }
                            }),
                        Forms\Components\Toggle::make('is_nsfw')
                            ->label('NSFW')
                            ->afterStateHydrated(function (Forms\Components\Toggle $component, ?Post $record) {
                                if  (!empty($record->is_nsfw) && $record->is_nsfw == true)
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
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\ViewColumn::make('image')
                        ->view('filament.tables.columns.post.imagearray'),
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('title')
                            ->weight('bold')
                            ->limit(27)
                            ->searchable()
                            ->sortable(),
                        Tables\Columns\TextColumn::make('code')
                            ->size('sm')
                            ->fontFamily('mono')
                            ->searchable()
                            ->sortable(),
                    ]),
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('author.username')
                            ->size('sm'),
                        Tables\Columns\TextColumn::make('created_at')
                            ->since()
                            ->size('sm')
                            ->sortable(),
                    ]),
                    Tables\Columns\TagsColumn::make('tags.name')
                        ->label('Tags')
                        ->sortable(),
                ])->space(3),
            ])
            ->defaultSort('created_at', 'desc')
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
