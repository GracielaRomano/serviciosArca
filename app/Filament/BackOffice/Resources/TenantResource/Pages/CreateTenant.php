<?php

namespace App\Filament\BackOffice\Resources\TenantResource\Pages;

use App\Filament\BackOffice\Resources\TenantResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;
}
