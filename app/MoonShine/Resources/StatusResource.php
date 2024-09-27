<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Status>
 */
class StatusResource extends ModelResource
{
    protected string $model = Status::class;

    protected string $title = 'Statuses';

    protected string $column = 'name';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Holat', 'name')->sortable(),
                HasMany::make("E'lonlar", 'ads', AdResource::class)->onlyLink(),
                Text::make('Yaratilgan Vaqt', 'created_at')->sortable(),
                Text::make('Yangilangan Vaqt', 'updated_at')->sortable(),
            ]),
        ];
    }

    /**
     * @param Status $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}