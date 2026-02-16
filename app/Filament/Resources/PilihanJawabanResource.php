<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PilihanJawabanResource\Pages;
use App\Filament\Resources\PilihanJawabanResource\RelationManagers;
use App\Models\PilihanJawaban;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PilihanJawabanResource extends Resource
{
    protected static ?string $model = PilihanJawaban::class;
    protected static ?string $navigationLabel = 'Pilihan Jawaban';
    protected static ?string $navigationGroup = 'Manajemen Kuis';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pertanyaan_id')
                     ->label('Pertanyaan')
                     ->relationship('pertanyaan', 'pertanyaan')
                     ->searchable()
                     ->required(),
                
                Forms\Components\TextInput::make('jawaban')
                     ->label('Jawaban')
                     ->required(),
                
                Forms\Components\Toggle::make('benar')
                     ->label('Jawaban Benar')
                     ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pertanyaan.pertanyaan')
                      ->label('Pertanyaan')
                      ->limit(40),
                
                Tables\Columns\TextColumn::make('jawaban'),
                      
                Tables\Columns\IconColumn::make('benar')
                       ->boolean()
                       ->label('Benar'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPilihanJawabans::route('/'),
            'create' => Pages\CreatePilihanJawaban::route('/create'),
            'edit' => Pages\EditPilihanJawaban::route('/{record}/edit'),
        ];
    }
}
