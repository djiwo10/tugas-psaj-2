<?php

namespace App\Filament\Resources\PertanyaanResource\Pages;

use App\Filament\Resources\PertanyaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditPertanyaan extends EditRecord
{
    protected static string $resource = PertanyaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeCreate(): void
{
    $this->validateJawabanBenar();
}

protected function beforeSave(): void
{
    $this->validateJawabanBenar();
}

protected function validateJawabanBenar(): void
{
    $benarCount = collect($this->data['pilihanJawaban'])
        ->where('benar', 1)
        ->count();

    if ($benarCount !== 1) {
        Notification::make()
            ->title('Validasi Gagal')
            ->body('Harus ada tepat 1 jawaban yang benar.')
            ->danger()
            ->send();

        $this->halt();
    }
}

}
