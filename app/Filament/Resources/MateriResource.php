<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriResource\Pages;
use App\Filament\Resources\MateriResource\RelationManagers;
use App\Models\Materi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;

class MateriResource extends Resource
{
    protected static ?string $model = Materi::class;
    protected static ?string $navigationLabel = 'Materi';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Select::make('mata_pelajaran_id')
                ->label('Mata Pelajaran')
                ->relationship('mataPelajaran', 'nama')
                ->required(),

            TextInput::make('judul')
                ->label('Judul Materi')
                ->required()
                ->maxLength(255),

            RichEditor::make('isi')
        ->label('Isi Materi')
        ->required()
        ->columnSpanFull()
        ->toolbarButtons([
            'bold',
            'italic',
            'underline',
            'strike',
            'bulletList',
            'orderedList',
            'h2',
            'h3',
            'blockquote',
            'link',
            'redo',
            'undo',
        ]),

            TextInput::make('urutan')
                ->numeric()
                ->label('Urutan')
                ->default(1),
        ]);
}
    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('judul')
                ->label('Judul')
                ->searchable(),

            TextColumn::make('mataPelajaran.nama')
                ->label('Mata Pelajaran'),

            TextColumn::make('urutan')
                ->sortable(),

            TextColumn::make('created_at')
                ->dateTime('d M Y')
                ->label('Dibuat'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMateris::route('/'),
            'create' => Pages\CreateMateri::route('/create'),
            'edit' => Pages\EditMateri::route('/{record}/edit'),
        ];
    }
}
