<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KuisResource\Pages;
use App\Filament\Resources\KuisResource\RelationManagers;
use App\Models\Kuis;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KuisResource extends Resource
{
    protected static ?string $model = Kuis::class;
    protected static ?string $navigationLabel = 'Kuis';
    protected static ?string $navigationGroup = 'Manajemen Kuis';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('mata_pelajaran_id')
                ->label('Mata Pelajaran')
                ->relationship('mataPelajaran', 'nama')
                ->required(),

            Forms\Components\TextInput::make('judul')
                ->label('Judul Kuis')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(4)
                ->columnSpanFull(),
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('judul')
                ->label('Judul')
                ->searchable(),

            Tables\Columns\TextColumn::make('mataPelajaran.nama')
                ->label('Mata Pelajaran'),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d M Y'),
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
            'index' => Pages\ListKuis::route('/'),
            'create' => Pages\CreateKuis::route('/create'),
            'edit' => Pages\EditKuis::route('/{record}/edit'),
        ];
    }
}
