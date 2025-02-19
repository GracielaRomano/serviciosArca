<?php
namespace App\Filament\Pages\Tenancy;

use App\Models\Tenant;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Filament\Panel;

class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Tenant';
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),
            
        ]);
    }

    protected function handleRegistration(array $data): Tenant
    {
        $tenant = Tenant::create($data);
        $tenant->members()->attach(auth()->user()->id);
        return $tenant;
    }
}
