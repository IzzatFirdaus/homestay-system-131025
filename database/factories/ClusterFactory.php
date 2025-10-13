<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cluster;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cluster>
 */
class ClusterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Cluster::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $negeriList = [
            'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan',
            'Pahang', 'Perak', 'Perlis', 'Pulau Pinang', 'Sabah',
            'Sarawak', 'Selangor', 'Terengganu', 'Kuala Lumpur', 'Labuan', 'Putrajaya',
        ];

        $clusterThemes = [
            'Eco-Tourism',
            'Cultural Heritage',
            'Adventure Tourism',
            'Agro Tourism',
            'Marine Tourism',
            'Highland Tourism',
            'Urban Tourism',
            'Religious Tourism',
        ];

        /** @var string $negeri */
        $negeri = $this->faker->randomElement($negeriList);
        /** @var string $theme */
        $theme = $this->faker->randomElement($clusterThemes);

        return [
            'nama' => 'Kluster '.$theme.' '.$negeri,
            'negeri' => $negeri,
            'keterangan' => $this->generateDescription($theme, $negeri),
        ];
    }

    /**
     * Generate appropriate description based on theme and location.
     */
    private function generateDescription(string $theme, string $negeri): string
    {
        $descriptions = [
            'Eco-Tourism' => [
                'Kluster homestay yang memfokuskan kepada pelancongan alam sekitar dan kelestarian.',
                'Menawarkan pengalaman pelancongan yang mesra alam dengan aktiviti seperti hiking dan bird watching.',
                'Homestay yang mempromosikan kesedaran alam sekitar dan aktiviti hijau.',
            ],
            'Cultural Heritage' => [
                'Kluster homestay yang memelihara dan mempromosikan warisan budaya tempatan.',
                'Menawarkan pengalaman budaya asli dengan aktiviti tradisional dan kesenian.',
                'Homestay yang memaparkan keunikan budaya dan tradisi masyarakat setempat.',
            ],
            'Adventure Tourism' => [
                'Kluster homestay untuk pencinta aktiviti lasak dan cabaran.',
                'Menawarkan aktiviti beradrenalina seperti white water rafting dan rock climbing.',
                'Homestay yang menyediakan pengalaman pelancongan yang mencabar dan mendebarkan.',
            ],
            'Agro Tourism' => [
                'Kluster homestay yang mempromosikan pelancongan pertanian dan perladangan.',
                'Menawarkan pengalaman langsung dalam aktiviti pertanian dan pemprosesan hasil.',
                'Homestay yang membolehkan pelawat mempelajari teknik pertanian tempatan.',
            ],
            'Marine Tourism' => [
                'Kluster homestay yang memfokuskan kepada aktiviti marin dan pantai.',
                'Menawarkan aktiviti seperti snorkeling, diving dan memancing.',
                'Homestay yang menyediakan akses kepada keindahan laut dan aktiviti air.',
            ],
        ];

        $themeDescriptions = $descriptions[$theme] ?? [
            'Kluster homestay yang menawarkan pengalaman pelancongan yang unik dan menarik.',
            'Homestay yang menyediakan perkhidmatan berkualiti untuk pelawat.',
        ];

        /** @var string $description */
        $description = $this->faker->randomElement($themeDescriptions);

        return $description.' Terletak di '.$negeri.'.';
    }

    /**
     * Create eco-tourism cluster.
     */
    public function ecoTourism(): static
    {
        return $this->state(function (array $attributes): array {
            /** @var string $defaultNegeri */
            $defaultNegeri = $this->faker->randomElement([
                'Pahang', 'Sabah', 'Sarawak', 'Perak', 'Kelantan',
            ]);
            /** @var string $negeri */
            $negeri = $attributes['negeri'] ?? $defaultNegeri;

            return [
                'nama' => 'Kluster Eco-Tourism '.$negeri,
                'negeri' => $negeri,
                'keterangan' => 'Kluster homestay yang memfokuskan kepada pelancongan alam sekitar dan kelestarian. Menawarkan pengalaman yang mesra alam dengan aktiviti seperti jungle trekking, bird watching, dan pemeliharaan alam. Terletak di '.$negeri.'.',
            ];
        });
    }

    /**
     * Create cultural heritage cluster.
     */
    public function culturalHeritage(): static
    {
        return $this->state(function (array $attributes): array {
            /** @var string $defaultNegeri */
            $defaultNegeri = $this->faker->randomElement([
                'Melaka', 'Negeri Sembilan', 'Johor', 'Kelantan', 'Terengganu',
            ]);
            /** @var string $negeri */
            $negeri = $attributes['negeri'] ?? $defaultNegeri;

            return [
                'nama' => 'Kluster Warisan Budaya '.$negeri,
                'negeri' => $negeri,
                'keterangan' => 'Kluster homestay yang memelihara dan mempromosikan warisan budaya tempatan. Menawarkan pengalaman budaya asli dengan aktiviti tradisional, kesenian tempatan, dan kuliner warisan. Terletak di '.$negeri.'.',
            ];
        });
    }

    /**
     * Create adventure tourism cluster.
     */
    public function adventureTourism(): static
    {
        return $this->state(function (array $attributes): array {
            /** @var string $defaultNegeri */
            $defaultNegeri = $this->faker->randomElement([
                'Pahang', 'Sabah', 'Perak', 'Pulau Pinang',
            ]);
            /** @var string $negeri */
            $negeri = $attributes['negeri'] ?? $defaultNegeri;

            return [
                'nama' => 'Kluster Adventure Tourism '.$negeri,
                'negeri' => $negeri,
                'keterangan' => 'Kluster homestay untuk pencinta aktiviti lasak dan cabaran. Menawarkan aktiviti beradrenalina seperti white water rafting, rock climbing, dan hiking gunung. Terletak di '.$negeri.'.',
            ];
        });
    }

    /**
     * Create marine tourism cluster.
     */
    public function marineTourism(): static
    {
        return $this->state(function (array $attributes): array {
            /** @var string $defaultNegeri */
            $defaultNegeri = $this->faker->randomElement([
                'Sabah', 'Sarawak', 'Terengganu', 'Pulau Pinang', 'Johor',
            ]);
            /** @var string $negeri */
            $negeri = $attributes['negeri'] ?? $defaultNegeri;

            return [
                'nama' => 'Kluster Marine Tourism '.$negeri,
                'negeri' => $negeri,
                'keterangan' => 'Kluster homestay yang memfokuskan kepada aktiviti marin dan pantai. Menawarkan aktiviti seperti snorkeling, diving, memancing, dan island hopping. Terletak di '.$negeri.'.',
            ];
        });
    }

    /**
     * Create cluster for specific negeri.
     */
    public function forNegeri(string $negeri): static
    {
        return $this->state(function (array $attributes) use ($negeri): array {
            $negeriStr = (string) $negeri;

            return [
                'negeri' => $negeriStr,
                'nama' => 'Kluster Homestay '.$negeriStr,
                'keterangan' => 'Kluster homestay yang menyediakan pengalaman pelancongan terbaik di '.$negeriStr.'. Menawarkan pelbagai aktiviti dan pengalaman yang unik kepada pelawat.',
            ];
        });
    }
}
