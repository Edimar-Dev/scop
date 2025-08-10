<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ServidorResource\Pages;
use App\Models\Servidor;
use App\Models\Unidade;
use App\Models\Perfil;
use App\Rules\ValidCpf;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ServidorResource extends Resource
{
    protected static ?string $model = Servidor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Servidores';
    protected static ?string $pluralModelLabel = 'Servidores';
    protected static ?string $modelLabel = 'Servidor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')
                    ->label('Nome')
                    ->required()
                    ->maxLength(100),

                TextInput::make('cpf')
                    ->label('CPF')
                    ->required()
                    ->mask('999.999.999-99')
                    ->placeholder('000.000.000-00')
                    ->unique(ignoreRecord: true)
                    ->rules([new ValidCpf()])
                    ->maxLength(14),

                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(100),

                TextInput::make('matricula')
                    ->label('Matrícula')
                    ->maxLength(100)
                    ->unique(ignoreRecord: true),

                Select::make('unidade_id')
                    ->label('Unidade')
                    ->relationship('unidade', 'nome')
                    ->required(),

                Select::make('perfil_id')
                    ->label('Perfil')
                    ->relationship('perfil', 'nome')
                    ->required(),

                Textarea::make('observacoes')
                    ->label('Observações')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('cpf')
                    ->label('CPF')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('matricula')
                    ->label('Matrícula')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('unidade.sigla')
                    ->label('Unidade')
                    ->sortable(),

                TextColumn::make('perfil.nome')
                    ->label('Perfil')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('nome')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServidors::route('/'),
            'create' => Pages\CreateServidor::route('/create'),
            'edit' => Pages\EditServidor::route('/{record}/edit'),
        ];
    }
}