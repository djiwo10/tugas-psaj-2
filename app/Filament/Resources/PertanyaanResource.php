<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PertanyaanResource\Pages;
use App\Filament\Resources\PertanyaanResource\RelationManagers;
use App\Models\Pertanyaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Hidden;
use Filament\Notifications\Notification;



class PertanyaanResource extends Resource
{
    protected static ?string $model = Pertanyaan::class;
    protected static ?string $navigationLabel = 'Pertanyaan';
    protected static ?string $navigationGroup = 'Manajemen Kuis';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('kuis_id')
                ->label('Kuis')
                ->relationship('kuis', 'judul')
                ->required(),

            Forms\Components\Textarea::make('pertanyaan')
                ->label('Pertanyaan')
                ->required()
                ->columnSpanFull(),

            Repeater::make('pilihanJawaban')
                ->label('Pilihan Jawaban')
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make('jawaban')
                        ->label('Jawaban')
                        ->required(),

                    Forms\Components\Radio::make('benar')
                        ->label('Jawaban Benar')
                        ->options([
                            1 => 'Benar',
                            0 => 'Salah',
                        ])
                        ->default(0)
                        ->required(),
                ])
                ->minItems(4)
                ->maxItems(4)
                ->columnSpanFull()
                ->required(),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kuis.judul')
                    ->label('Kuis'),

                Tables\Columns\TextColumn::make('pertanyaan')
                     ->wrap(),
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
            'index' => Pages\ListPertanyaans::route('/'),
            'create' => Pages\CreatePertanyaan::route('/create'),
            'edit' => Pages\EditPertanyaan::route('/{record}/edit'),
        ];
    }
}
