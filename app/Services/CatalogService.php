<?php

namespace App\Services;

use Faker\Factory;
use Illuminate\Support\Str;
use InvalidArgumentException;

class CatalogService
{
    private array $items = [];

    public function __construct()
    {
        $variant = config('catalog.variant');
        $profile = config("catalog.profiles.{$variant}");

        if (!is_array($profile) || !isset($profile['seed'])) {
            throw new InvalidArgumentException(
                "Не знайдено профіль для варіанта {$variant}."
            );
        }

        $faker = Factory::create('uk_UA');
        $faker->seed((int) $profile['seed']);

        $usedSlugs = [];

        // Генеруємо рівно 12 оголошень
        for ($i = 1; $i <= 12; $i++) {
            $title = $faker->randomElement($profile['titles']);
            $category = $faker->randomElement($profile['categories']);

            // Формуємо slug зі стабільних даних
            $baseSlug = Str::slug(
                $title . ' ' . $category . ' ' . $profile['operation']
            );

            $slug = $baseSlug;
            $suffix = 2;

            // Номер додаємо лише за наявності збігу
            while (in_array($slug, $usedSlugs, true)) {
                $slug = $baseSlug . '-' . $suffix;
                $suffix++;
            }

            $usedSlugs[] = $slug;

            // Генеруємо атрибути згідно з профілем
            $attributes = [];

            foreach ($profile['attributes'] as $name => $values) {
                $attributes[$name] = $faker->randomElement($values);
            }

            // Генеруємо дату з фіксованого діапазону
            $publishedAt = $faker
                ->dateTimeBetween(
                    '2024-01-01 00:00:00',
                    '2025-12-31 23:59:59'
                )
                ->format('Y-m-d H:i:s');

            $this->items[] = [
                'id' => $i,
                'slug' => $slug,
                'title' => $title,
                'category' => $category,
                'operation' => $profile['operation'],
                'price' => $faker->numberBetween(
                    $profile['price'][0],
                    $profile['price'][1]
                ),
                'currency' => $profile['currency'],
                'short_description' => $faker->sentence(8),
                'description' => $faker->paragraph(3),
                'image' => 'https://placehold.co/600x400?text='
                    . urlencode($title),
                'contact_name' => $faker->name(),
                'contact_phone' => $faker->phoneNumber(),
                'contact_email' => $faker->safeEmail(),
                'status' => 'published',
                'published_at' => $publishedAt,
                'attributes' => $attributes,
            ];
        }
    }

    public function featured(int $limit = 3): array
    {
        return array_slice(
            $this->items,
            0,
            max(0, $limit)
        );
    }

    public function all(): array
    {
        return $this->items;
    }

    public function findBySlug(string $slug): ?array
    {
        foreach ($this->items as $item) {
            if ($item['slug'] === $slug) {
                return $item;
            }
        }

        return null;
    }
}