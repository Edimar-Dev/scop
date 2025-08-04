<?php

namespace App\Filament\Admin\Resources\UnidadeResource\Pages;

use App\Filament\Admin\Resources\UnidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUnidade extends CreateRecord
{
    protected static string $resource = UnidadeResource::class;

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
