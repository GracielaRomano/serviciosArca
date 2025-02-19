<?php

namespace App\Filament\BackOffice\Resources;

use App\Filament\BackOffice\Resources\TenantResource\Pages;
use App\Filament\BackOffice\Resources\TenantResource\RelationManagers;
use App\Models\Tenant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TenantResource extends Resource
{
    protected static ?string $model = Tenant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Información de la Empresa')
                    ->columns(3)
                    ->schema([
                    // ...
                    Forms\Components\TextInput::make('cuit')
                    ->required(),
                    Forms\Components\TextInput::make('name')
                    ->required(),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required(),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->hiddenOn('edit')
                        ->required(),
                    ]),
                    Section::make('Información de la Dirección')
                    ->columns(3)
                    ->schema([
                    Forms\Components\TextInput::make('address')
                    ->required(),
                    Forms\Components\TextInput::make('postal_code')
                    ->required(),
                    Forms\Components\TextInput::make('phone')
                    ->required(),
                ]),
               
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cuit')
                ->searchable()
                ->sortable(),
               Tables\Columns\TextColumn::make('business_name')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                ->dateTime('d-m-Y')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                ->dateTime('d-m-Y')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }
}
