<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PerfilUnidadeResource\Pages;
use App\Models\PerfilUnidade;
use App\Models\Unidade;
use App\Models\Perfil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PerfilUnidadeResource extends Resource
{
    protected static ?string $model = PerfilUnidade::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';
    protected static ?string $navigationLabel = 'Limites por Unidade';
    protected static ?string $pluralModelLabel = 'Limites por Unidade';
    protected static ?string $modelLabel = 'Limite por Unidade';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('unidade_id')
                    ->label('Unidade')
                    ->relationship('unidade', 'nome')
                    ->required(),

                Select::make('perfil_id')
                    ->label('Perfil')
                    ->relationship('perfil', 'nome')
                    ->required()
                    ->unique(
                        table: 'perfil_unidades',
                        column: 'perfil_id',
                        modifyRuleUsing: fn ($rule, $get) => $rule->where('unidade_id', $get('unidade_id')),
                        ignoreRecord: true
                    )
                    ->validationMessages([
                        'unique' => 'Já existe um limite definido para esta unidade e perfil.',
                    ]),

                TextInput::make('limite_recomendado')
                    ->label('Limite Recomendado')
                    ->numeric()
                    ->minValue(0)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unidade.nome')
                    ->label('Unidade')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('unidade.sigla')
                    ->label('Sigla')
                    ->searchable()
                    ->sortable(),    

                TextColumn::make('perfil.nome')
                    ->label('Perfil')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('limite_recomendado')
                    ->label('Limite')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([])
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
            'index' => Pages\ListPerfilUnidades::route('/'),
            'create' => Pages\CreatePerfilUnidade::route('/create'),
            'edit' => Pages\EditPerfilUnidade::route('/{record}/edit'),
        ];
    }
}